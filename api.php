<?php
header("Content-Type:application/json");

include_once('includes/db.php');

/*get subjects*/
if (isset($_GET['getSubjects']) && $_GET['getSubjects']!="") {
	
	$query ="SELECT subject_id,subject from mst_quiz_subjects where is_active=1";
	
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		$arrQuestionsData=[];
		while($row = mysqli_fetch_assoc($result)) {
		  $arrQuestionsData[]=$row;
		}
		response($arrQuestionsData, 200,"Ok");
		//mysqli_close($con);
	}
	else{
		response(NULL, 200,"No Record Found");
		}
}


/*Quit quiz attempt*/
elseif (isset($_POST['deleteAttempt']) && $_POST['deleteAttempt']!="") {
	
	$attempt_id=$_POST['attempt_id'];
	if(!empty($attempt_id)){
		$query ="delete from trn_quiz_attempts where attempt_id=$attempt_id";
		$result = mysqli_query($con,$query);
		response(['success'=>1], 200,"Ok");
	}
	else{
		response(['success'=>0], 200,"Unable to Perform the request!..");
		}
}



/*get last attempt*/
elseif (isset($_GET['getLastattempt']) && $_GET['getLastattempt']!="") {
	
	$query ="SELECT attempt_id,score,subject_id from trn_quiz_attempts where is_active=1 and user_email='".pack("H*",$_GET['getLastattempt'])."' order by attempt_id desc limit 1";
	
	//response($query, 200,"No Record Found");
	
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		$arrLastattemptData=[];
		while($row = mysqli_fetch_assoc($result)) {
		  $arrLastattemptData[]=$row;
		}
		response($arrLastattemptData, 200,"Ok");
		mysqli_close($con);
	}
	else{
		response(NULL, 200,"No Record Found");
		}
}



/*save the answers for an attempt*/
elseif (isset($_POST['save']) && $_POST['save']!="") {
	
	/*deleting the same attempt previous entry if there*/
	$attempt_id=$_POST['attempt_id'];
	$query="Delete FROM trn_quiz_attempt_answers WHERE attempt_id=$attempt_id and is_active=1";
	$result = mysqli_query($con,$query);


	$vString=trim($_POST['vString']);
	$query="INSERT into trn_quiz_attempt_answers (attempt_id,question_id,option_id) values $vString";
	$result = mysqli_query($con,$query);
	
	if($result)
			$insert_id = mysqli_insert_id($con);
	
	
	
	
	$query="SELECT question_id,option_id FROM trn_quiz_attempt_answers WHERE attempt_id=$attempt_id and is_active=1 order by answers_id asc";
	
	
	$result = mysqli_query($con,$query);
	
	
	if(mysqli_num_rows($result)>0){
		$arrAnswersData=[];
		while($row = mysqli_fetch_assoc($result)) {
		  $arrAnswersData[]=$row;
		}
	}
	
	$iScore=0;
	foreach($arrAnswersData as $data){

		$query="SELECT option_id FROM mst_quiz_question_options WHERE question_id=".$data['question_id']." and is_active=1 and is_correct=1 order by option_id asc";
		$result = mysqli_query($con,$query);
		
		$row = mysqli_fetch_array($result);
		
		
		
		/*get score*/
		
		if($row['option_id']==$data['option_id']){
					$iScore++;
		}
				
		
	}
	
	/*update the score in the database*/
	$query="Update trn_quiz_attempts set score=$iScore WHERE attempt_id=$attempt_id and is_active=1";
	$result = mysqli_query($con,$query);

		
	response($iScore, 200,"Ok");
	
	
	//send score
	/* if($iScore){
	  $arrData[]=['score'=>$iScore];
	  response($arrData, 200,"Ok");
	  mysqli_close($con);	
	}else{
		response(NULL, 200,"No Record Found");
		}*/
}


/*get questions along with options for a specific subject or get all the subjects*/
elseif (isset($_POST['attempt']) && $_POST['attempt']!="") {
	
	
	$subject_id = $_POST['subject_id'];
	if(!empty($_POST['attempt'])) {
		$query="SELECT question_id,question,level_id,subject_id FROM mst_quiz_questions WHERE subject_id=$subject_id and is_active=1 order by question_id,level_id asc";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			$arrQuestionsData=[];
			while($row = mysqli_fetch_assoc($result)) {
			  $arrQuestionsData[]=$row;
			}
		}
		
		$arrQuestionIds=[];
		$arrOptions=[];
		$arrQuestionsNoptionsData=[];
		foreach($arrQuestionsData as $data){
			$arrQuestionIds[]=$data['question_id'];
		}
		
		$icount=0;
		$user_name=$_POST['user_name'];
		$user_email=$_POST['user_email'];
		$subject=$_POST['subject_id'];
		
		$result = mysqli_query($con,
		"INSERT into trn_quiz_attempts (user_name,user_email,subject_id) values ('$user_name','$user_email',$subject_id)");

		if($result)
			$attempt_id = mysqli_insert_id($con);
		
		foreach($arrQuestionsData as $data){
			$query="SELECT voption,option_id from mst_quiz_question_options where question_id=".$arrQuestionIds[$icount]." order by option_id asc";
			
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
				$arrOptionsData=[];
				while($row = mysqli_fetch_assoc($result)) {
				  $arrOptionsData[]=$row;
				}
			}
			
			foreach($arrOptionsData as $option) {
				array_push($arrOptions,['option_id'=>$option['option_id'],'option'=>$option['voption']]);
			}
			
			/*insert into attempt table with user email*/
			/* $user_name=$_POST['name'];
			$user_email=$_POST['email'];
			$subject=$_POST['subject_id'];*/
			
		
			
		
			/*end changes*/
			
			/*shuffle randomly the optionsIds*/
			shuffle($arrOptions);
			array_push($arrQuestionsNoptionsData,['attempt_id'=>$attempt_id,'question'=>$data['question'],'question_id'=>$data['question_id'],'options'=>$arrOptions,'level_id'=>$data['level_id'],'subject_id'=>$data['subject_id']]);
			$arrOptions=[];
			$icount++;
		}
		
		//echo json_encode($arrQuestionsNoptionsData);
			
		response($arrQuestionsNoptionsData, 200,"Ok");
	}
	else{
		response(NULL, 200,"No Record Found");
		}
}


else{
	response(NULL, 400,"Invalid Request");
	}



//function response($subject_id,$amount,$response_code,$response_desc){
function response($arrData,$response_code,$response_desc){	
	$response['data'] = $arrData;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	$json_response = json_encode($response);
	echo $json_response;
}




?>
<?php
session_start();

require_once 'includes/config.php';
require_once 'includes/database.php';

function fetchData($response) {
	if(array_key_exists('status',$response) && $response['status']) {
		return $response['data'];
	}
	else {

		$vresponse=json_encode($response['data']);
		return '<script>alert('.$vresponse.');</script>';
		exit;
	}
}
 
/*initial connection of database*/ 
$db=new Database($SERVERNAME,$USERNAME,$PASSWORD,$DATABASE);
$response=$db->connect();
$conn=fetchData($response); 
 
 /*for pageid=1 show the dashboard*/
$page_id=1 ; //set to dashboard 
if(isset($_POST['page_id'])) {
		$page_id=$_POST['page_id'];
}
 
if($page_id==1) {
	
	$response=$db->querySelect($conn,'mst_quiz_subjects','subject_id,subject','is_active=1');
	$arrSubjectData=fetchData($response); 

	$response=$db->querySelect($conn,'trn_quiz_attempts','count(attempt_id) as attempt_count,score','is_active=1 and user_email="'.$_SESSION['email'].'"order by attempt_id desc limit 1');
	$arrLastattemptData=fetchData($response); 
}

/*for showing questions*/
elseif($page_id==2){
	
	$response=$db->querySelect($conn,'mst_quiz_questions q','question_id,question,level_id,subject_id','q.subject_id='.$_POST['subject_id'].' and q.is_active=1 order by q.question_id,q.level_id asc');
	$arrQuestionsData=fetchData($response); 
	
	
	$arrQuestionIds=[];
	$arrOptions=[];
	$arrQuestionsNoptionsData=[];
	foreach($arrQuestionsData as $data){
		$arrQuestionIds[]=$data['question_id'];
	}
	
	$icount=0;
	
	foreach($arrQuestionsData as $data){
		$response=$db->querySelect($conn,'mst_quiz_question_options','voption,option_id','question_id='.$arrQuestionIds[$icount].' order by option_id asc');
		$arrOptionsData=fetchData($response); 
		
		foreach($arrOptionsData as $option) {
			array_push($arrOptions,['option_id'=>$option['option_id'],'option'=>$option['voption']]);
		}
		
		/*insert into attempt table with user email*/
		$arrData=['user_name'=>$_SESSION['name'],'user_email'=>$_SESSION['email'],'subject_id'=>$_POST['subject_id']];
		$response=$db->queryInsert($conn,'trn_quiz_attempts',$arrData);
		$arrOptionsData=fetchData($response);
		/*end changes*/
		
		/*shuffle randomly the optionsIds*/
		shuffle($arrOptions);
		array_push($arrQuestionsNoptionsData,['attempt_id'=>1,'question'=>$data['question'],'question_id'=>$data['question_id'],'options'=>$arrOptions,'level_id'=>$data['level_id'],'subject_id'=>$data['subject_id']]);
		$arrOptions=[];
		$icount++;
	}
	
	echo json_encode($arrQuestionsNoptionsData);
}

elseif($page_id==2) {
	
	$response=$db->queryInsert($conn,'mst_quiz_questions q','question_id,question,level_id,subject_id','q.subject_id='.$_POST['subject_id'].' and q.is_active=1 order by q.question_id,q.level_id asc');
	$arrQuestionsData=fetchData($response); 
	
	
	
}

?>
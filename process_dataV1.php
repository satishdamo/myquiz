<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

session_start();

require_once 'includes/db.php';
require_once 'GetData.php';

function fetchData($response) {
	//print_r($response); exit();
	
	if(!empty($response) && array_key_exists('response_code',$response) && $response['response_code']==200) {
		return $response['data'];
	}
	else {

		if(empty($response))
			return 0;
			
		else {
			$vresponse=json_encode($response['response_desc']);
			return "<script>alert('$vresponse');</script>";
		}
	}
}
 
/*initial connection of database*/  
$getData=new GetData($_SESSION['name'],$_SESSION['email']); 
 
/*for pageid=1 show the dashboard*/
//set to dashboard 
$page_id=1 ; 
if(isset($_POST['page_id'])) {
		$page_id=$_POST['page_id'];
}
 
if($page_id==1) {
	

	$response=$getData->fetchData($page_id,1); // for getsubject made 1
	$arrSubjectData=fetchData($response);

	$response=$getData->fetchData($page_id,0,1); //for attempt made 1 and for getsubjects made 0
	$arrLastattemptData=fetchData($response);
	
}

/*for showing questions*/
elseif($page_id==2 || $page_id==3 ||$page_id==4){
	
	$response=$getData->fetchData($page_id); 
	$arrData=fetchData($response);
	
	//$arrQuestionsNoptionsData=fetchData($response);
	echo json_encode($arrData);
}

/* elseif($page_id==3) {
	$response=$getData->fetchData($page_id); 
	$arrQuizScoreData=fetchData($response);
	echo json_encode($arrQuizScoreData);
}

elseif($page_id==4) {
	$response=$getData->fetchData($page_id); 
	$arrDeleteAttemptData=fetchData($response);
	
	echo json_encode($arrDeleteAttemptData);
}*/


?>
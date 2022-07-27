<?php


/*dashboard page showing subjects*/
class GetData {

	public $name;
	public $email;

	public function __construct($name,$email) {
		
		$this->name=$name;
		$this->email=$email;
	}

	public function postCurl($url,$postRequest){
		
		
		$cURLConnection = curl_init($url);
		/* $headers = array(
		   "Accept: application/json",
		);
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);*/
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		return json_decode($response,true);
					
	}

	public function getCurl($url){
			$cURLConnection = curl_init($url);
			curl_setopt($cURLConnection,CURLOPT_RETURNTRANSFER,true);
			$response = curl_exec($cURLConnection);	
			return json_decode($response,true);
	}


	public function fetchData($page_id,$getSubjects=null,$getLastattempt=null) {

		if($page_id==1) {
			if ($getSubjects) {
				$url = "http://localhost/myquiz/api/getSubjects";
				//return $url;
				return $this->getCurl($url);		
			}
			
			elseif($getLastattempt){
				
				$url = "http://localhost/myquiz/api/getLastattempt/".bin2hex($this->email);
				//return $url;
				return $this->getCurl($url);
			}
		}

		/*start exam by choosing a subject*/
		elseif(isset($_POST['page_id']) && $_POST['page_id']==2){
			if (isset($_POST['attempt']) && $_POST['attempt']!="") {
				//$attempt = $_POST['attempt'];
				$url = "http://localhost/myquiz/api/attempt";
				
				$postRequest = array(
				'subject_id' => $_POST['subject_id'],
				'user_name' =>$this->name,
				'user_email' =>$this->email,
				'attempt'=>1
				);
				return $this->postCurl($url,$postRequest);
			}
		}
		/* insert the submitted answers to the database*/
		elseif(isset($_POST['page_id']) && $_POST['page_id']==3){
			
			
			if (isset($_POST['save']) && $_POST['save']!="") {
				//$save = $_POST['save'];
				$url = "http://localhost/myquiz/api/save";
				
				$arrAnswers=$_POST['arrData'];
				
				$vString="";
				foreach($arrAnswers as $data){
					$vString.='('.$data['attempt_id'].','.$data['question_id'].','.$data['option_id'].'),';
					
				}
				
				$vString=substr($vString,0,strlen($vString)-1);
				
				$postRequest = array(
				'vString'=>$vString,
				'attempt_id'=>$_POST['attempt_id'],
				'save'=>1
				);

				
				return $this->postCurl($url,$postRequest);
				
			}
		}
		
		
			/* Quit the Quiz attempt*/
		elseif(isset($_POST['page_id']) && $_POST['page_id']==4){
			
			
			if (isset($_POST['attempt_id']) && $_POST['attempt_id']!="") {
				//$save = $_POST['save'];
				$url = "http://localhost/myquiz/api/deleteAttempt";
				
				
				$postRequest = array(
				'attempt_id'=>$_POST['attempt_id'],
				'deleteAttempt'=>1
				);

				return $this->postCurl($url,$postRequest);
				
			}
		}
		

	}


}
    ?>
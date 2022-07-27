<?php

class Database {

	private $servername;
	private $username;
	private $password;
	private $database;

	public function __construct($servername,$username,$password,$database){
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;
		$this->database=$database;
	}

	public function connect() {
		try {
		  $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
		  // set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $response=['status'=>1,'data'=>$conn];
		  //echo "Connected successfully";
		} catch(PDOException $e) {
		  
		  $response=['status'=>0,'data'=>"Connection failed: " . $e->getMessage()];
		} finally {
			return $response;
		}
	}

	public function querySelect($conn,$table,$columns,$condition){
		
		try {
			$arrData=[];	
			$stmt = $conn->prepare("SELECT {$columns} FROM {$table} where {$condition}");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($data as $row) {	
					$arrData[]=$row;
			}
			return $response=['status'=>1,'data'=>$arrData];
		  
		} catch(PDOException $e) {
		  
			return $response=['status'=>0,'data'=>"Connection failed: " . $e->getMessage()];
		}
		
		
	}


}
?>
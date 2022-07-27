<?php
require_once 'config.php';

$con = mysqli_connect($SERVERNAME,$USERNAME,$PASSWORD,$DATABASE);
    if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}	
?>	
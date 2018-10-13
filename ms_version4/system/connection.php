<?php
	$ip = $_SERVER['REMOTE_ADDR'];
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
	define('__base_url','http://localhost/ms_version4/');
	// define('__base_url','http://localhost/msstore/');
	//$con=mysqli_connect("mssmartstore.com","mssmarts_dbuser","Z13d@K8AWl~A","mssmarts_db");
	$con=mysqli_connect("localhost","root","","db_mssmartstore");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

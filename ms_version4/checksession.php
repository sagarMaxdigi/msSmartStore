<?php
	ini_set('display_errors','on');
	error_reporting(E_ALL);
	
	session_start();
	
	if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']))
	{
		header("location:login.php?session=expired");		
	}
	else
	{
		$user_id=$_SESSION['user_id'];
		$user_name=$_SESSION['user_name'];
	}	
?>

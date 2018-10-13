<?php
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	session_start();
	
	if(!isset($_SESSION['admin_id']) || !isset($_SESSION['username']))
	{
		header("location:../login.php?session=expired");		
	}
	else
	{
		$admin_id=$_SESSION['admin_id'];
		$admin_username=$_SESSION['username'];
	}	
?>

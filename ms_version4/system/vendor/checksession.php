<?php
	ini_set('display_errors','on');
	error_reporting(E_ALL);

	session_start();
	
	if(!isset($_SESSION['store_id']) || !isset($_SESSION['store_name']))
	{
		header("location:../login.php?session=expired");		
	}
	else
	{
		$store_id=$_SESSION['store_id'];
		$storevendor_name=$_SESSION['store_name'];
	}	
?>

<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checkusersession.php");
	include_once("system/connection.php");
	include_once("system/functions.php");
	
	extract($_POST);
	
	$q="update members set member_password='$newpass' where member_id='$_member_id' and member_password='$oldpass'";

	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:my-account.php?update=true");
	}
	else
	{
		header("location:my-account.php?update=false");
	}
?>
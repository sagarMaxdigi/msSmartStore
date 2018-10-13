<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	
	extract($_GET);
	
	if($action=="reject")
		$q="update teachers set teacher_status='PENDING' where teacher_id=$teacher_id";
	else
		$q="update teachers set teacher_status='SHORTLIST' where teacher_id=$teacher_id";
	
	$res=mysqli_query($con,$q);
	
	if(mysqli_affected_rows($con)>0)
	{
		header("location:teachers.php?update=true");
	}
	else
	{
		header("location:teachers.php?update=false");
	}
?>
<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	
	extract($_GET);
	
	$q="delete from teachers where teacher_id=$id";
	
	$res=mysqli_query($con,$q);
	
	if(mysqli_affected_rows($con)>0)
	{
		header("location:teachers.php?delete=true");
	}
	else
	{
		header("location:teachers.php?delete=false");
	}
?>
<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from city where city_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:city_report.php");
	}
	else
	{
		echo mysqli_error();
	}
?>
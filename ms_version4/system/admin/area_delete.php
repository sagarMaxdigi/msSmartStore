<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from area where area_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:area.php");
	}
	else
	{
		echo mysqli_error();
	}
?>
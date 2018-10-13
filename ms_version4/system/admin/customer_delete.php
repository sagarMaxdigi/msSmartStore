<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from members where member_id=$member_id";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:customer.php");
	}
	else
	{
		header("location:customer.php");
	}
?>
<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from brand where brand_id=$brand_id";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:brand.php");
	}
	else
	{
		echo mysqli_error();
	}
?>
<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from product_mapping where mapping_product_id=$eid";
	
	$res=mysqli_query($con,$q);
	
	$q="delete from products where product_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:products.php");
	}
	else
	{
		echo mysqli_error();
	}
?>
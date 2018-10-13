<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	//print_r($_GET);
	//exit();
	$q="delete from product_mapping where mapping_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:store_product.php?store_id=$store_id");
	}
	else
	{
		echo mysqli_error();
	}
?>
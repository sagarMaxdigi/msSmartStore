<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$q="delete from customer_enquiry where customer_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:customer.php");
	}
	else
	{
		echo mysqli_error($con);
	}
?>
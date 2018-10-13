<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	include_once("system/connection.php");
	include_once("system/functions.php");
	
	extract($_POST);
	
	$q="select * from members where member_contact='$contact'";
	$res=mysqli_query($con,$q);
	
	if($row=mysqli_fetch_array($res))
	{
		header("location:register.php?register=false&contact=exist");
	}
	else
	{
		//member_email,member_address,member_city,member_pincode
		//,'$email','$address','$city','$pincode'
		$q="insert into members(member_fname,member_lname,member_contact)";
		$q.=" values('$firstname','$lastname','$contact')";
	
		$res=mysqli_query($con,$q);
	
		if(mysqli_affected_rows($con)>0)
		{
			header("location:login.php?register=true");
		}
		else
		{
			header("location:register.php?register=false");
		}
	}
?>
<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$q="update city set city_name='$city_name'
			 where city_id=$city_id";
			
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:city_report.php?updated=true&city_id=$city_id");
		}
		else
		{
			header("location:city_report.php?updated=true&city_id=$city_id");
		}
	}
	else
	{
		$q="insert into city(city_name) values('$city_name')";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:city_report.php?saved=true");
		}
		else
		{
			header("location:city_report.php?saved=false");
		}
}	
?>
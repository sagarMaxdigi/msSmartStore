<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$q="update brand set brand_name='$brand_name'
		where brand_id=$brand_id";
			
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:brand.php?updated=true&brand_id=$brand_id");
		}
		else
		{
			header("location:brand.php?updated=true&brand_id=$brand_id");
		}
	}
	else
	{
		$q="insert into brand(brand_name) values('$brand_name')";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:brand.php?saved=true");
		}
		else
		{
			echo mysqli_error($con);
			//header("location:super_category.php?saved=false");
		}
	}
?>
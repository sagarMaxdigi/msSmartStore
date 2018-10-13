<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$q="update categories set category_name='$category_name'
		,category_supercategory_id='$category_supercategory_id'
		where category_id=$category_id";
			
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:category.php?updated=true&category_id=$category_id");
		}
		else
		{
			header("location:category.php?updated=true&category_id=$category_id");
		}
	}
	else
	{
		$q="insert into categories(category_name,category_supercategory_id) values('$category_name','$category_supercategory_id')";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:category.php?saved=true");
		}
		else
		{

			header("location:category.php?saved=false");
		}
	}
?>
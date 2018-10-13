<?php
	ini_set('display_errors', 'On');
    error_reporting(E_ALL);
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);
	if(isset($update) && $update=="true")
	{
		$q="update subcategory set subcategory_name='$subcategory_name'
		,subcategory_category_id='$subcategory_category_id'
		where subcategory_id=$subcategory_id";
			
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:sub_category.php?updated=true&subcategory_id=$subcategory_id");
		}
		else
		{
			header("location:sub_category.php?updated=true&subcategory_id=$subcategory_id");
		}
	}
	else
	{
		$q="insert into subcategory(subcategory_name,subcategory_category_id)values('$subcategory_name','$subcategory_category_id')";
		$res=mysqli_query($con,$q);
		if(mysqli_affected_rows($con)>0)
		{
			header("location:sub_category.php?saved=true");
		}
		else
		{
			echo mysqli_error($con);
			//header("location:sub_category.php?saved=false");
		}
	}
?>
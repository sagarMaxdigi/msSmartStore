<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$q="update supercategories set supercategory_name='$supercategory_name'
		where supercategory_id=$supercategory_id";
			
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:super_category.php?updated=true&supercategory_id=$supercategory_id");
		}
		else
		{
			header("location:super_category.php?updated=true&supercategory_id=$supercategory_id");
		}
	}
	else
	{
		$q="insert into supercategories(supercategory_name) values('$supercategory_name')";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:super_category.php?saved=true");
		}
		else
		{
			echo mysqli_error($con);
			//header("location:super_category.php?saved=false");
		}
	}
?>
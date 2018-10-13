<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);

	$isSubQuery = 'select subcategory_category_id from subcategory where subcategory_category_id = '.$eid;
	
	$isSub=mysqli_query($con,$isSubQuery);

	if(mysqli_num_rows($isSub)>0)
	{
		header("location:sub_category.php?status=false");
	}
	else
	{
		$q="delete from subcategory where subcategory_id=$eid";
	
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:sub_category.php?status=true");
		}
		else
		{
			echo mysqli_error();
		}
	}

	
?>
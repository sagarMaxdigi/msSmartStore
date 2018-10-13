<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);

	$isSubQuery = 'select category_supercategory_id from categories where category_supercategory_id = '.$eid;

	$isSub=mysqli_query($con,$isSubQuery);

	if(mysqli_num_rows($isSub)>0)
	{
		header("location:super_category.php?status=false");
	}
	else
	{
		$q="delete from supercategories where supercategory_id=$eid";
	
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:super_category.php?status=true");
		}
		else
		{
			echo mysqli_error();
		}
	}


	
?>
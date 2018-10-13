<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);

	$isSubCatQ = 'select subcategory_category_id from subcategory where subcategory_category_id = '.$eid;



	$isSubCat = mysqli_query($con,$isSubCatQ);

	if(mysqli_num_rows($isSubCat)>0)
	{
		header("location:category.php?status=false");
	}
	else
	{
		$q="delete from categories where category_id=$eid";
	
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:category.php?status=true");
		}
		else
		{
			echo mysqli_error();
		}	
	}


	
?>
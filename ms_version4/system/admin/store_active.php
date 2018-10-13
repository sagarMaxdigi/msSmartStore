<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	 
	

	if(isset($_GET['special']) && ($_GET['special']==1 || $_GET['special']==0))
	{
		$q="update store set store_status=$special where store_id=$store_id";
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:store_report.php");
		}
		else
		{
			header("location:store_report.php");
		}
	}
	else
	{
		echo "back";
		print_r($_GET); 
	}
	
	
	
?>
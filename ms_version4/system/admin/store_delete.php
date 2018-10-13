<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	if(isset($stro_ids) && $stro_ids != '')
	{
		$chkQry1 = "select mapping_product_id from product_mapping where mapping_product_id in (".$stro_ids.")";
		$chkRes1=mysqli_query($con,$chkQry1);

		$chkQry2 = "select wishlist_product_id from member_wishlist where wishlist_product_id in (".$stro_ids.")";
		$chkRes2=mysqli_query($con,$chkQry2);

		if(mysqli_num_rows($chkRes1)>0)
		{
			header("location:store_report.php?alert=You cannot delete this product.Please delete product from store then try.");
			die;
		}
		else if(mysqli_num_rows($chkRes2)>0)
		{
			header("location:store_report.php?alert=You cannot delete this product.Product is in wishlist.");
			die;
		}
		else
		{

			$qs="delete from store where store_id in (".$stro_ids.")";
	
			$ress=mysqli_query($con,$qs);

			$qe="delete from customer_enquiry where customer_store_id in (".$stro_ids.")";
		
			$rese=mysqli_query($con,$qe);

			$qr="delete from store_rating where store_id in (".$stro_ids.")";
		
			$resr=mysqli_query($con,$qr);

			if(mysqli_affected_rows($con)>0)
			{
				header("location:store_report.php");
				die;
			}
			else
			{
				echo mysqli_error();

			}
		}


		
	}
	else
	{
		if(isset($eid) && $eid != '')
		{
			$q="delete from store where store_id=$eid";
	
			$res=mysqli_query($con,$q);

			if(mysqli_affected_rows($con)>0)
			{
				header("location:store_report.php");
				die;
			}
			else
			{
				echo mysqli_error();
			}
		}
	}
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>
<?php
	include_once("../connection.php");
	include_once("../functions.php");
	if(isset($_GET))	
	{
		extract($_GET);



		if(isset($prodt_ids) && $prodt_ids != '')
		{
			$chkQry1 = "select mapping_product_id from product_mapping where mapping_product_id in (".$prodt_ids.")";
			$chkRes1=mysqli_query($con,$chkQry1);

			$chkQry2 = "select wishlist_product_id from member_wishlist where wishlist_product_id in (".$prodt_ids.")";
			$chkRes2=mysqli_query($con,$chkQry2);

			if(mysqli_num_rows($chkRes1)>0)
			{
				header("location:products.php?alert=You cannot delete this product.Please delete product from store then try.");
				die;
			}
			else if(mysqli_num_rows($chkRes2)>0)
			{
				header("location:products.php?alert=You cannot delete this product.Product is in wishlist.");
				die;
			}
			else
			{
				
				$q="delete from product_mapping where mapping_product_id in (".$prodt_ids.")";
		
				$res=mysqli_query($con,$q);

				$q="delete from products where product_id in (".$prodt_ids.")";
				
				$res=mysqli_query($con,$q);

				if(mysqli_affected_rows($con)>0)
				{
					header("location:products.php");
					die;
				}
				else
				{
					echo mysqli_error();
				}
			}

			
		}
		else if(isset($store_prodt_ids) && $store_prodt_ids!='')
		{
			/*$chkQry3 = "select mapping_product_id from product_mapping where mapping_product_id in (".$store_prodt_ids.")";
			$chkRes3=mysqli_query($con,$chkQry3);*/

			$chkQry4 = "select wishlist_product_id from member_wishlist where wishlist_product_id in (".$store_prodt_ids.")";
			$chkRes4=mysqli_query($con,$chkQry4);

			/*if(mysqli_num_rows($chkRes3)>0)
			{
				header("location:products.php?alert=You cannot delete this product.Please delete product from store then try.");
				die;
			}
			else */
			if(mysqli_num_rows($chkRes4)>0)
			{
				//header("location:store_product.php?store_id=&alert=You cannot delete this product.Product is in wishlist.");
				header("location:store_product.php?sub_category=".$sub_category.'&store_id='.$store_id.'&alert=You cannot delete this product.Product is in wishlist.');
				die;
			}
			else
			{
				$q="delete from product_mapping where mapping_product_id in (".$store_prodt_ids.")";
			
				$res=mysqli_query($con,$q);			
				

				if(mysqli_affected_rows($con)>0)
				{
					header("location:store_product.php?sub_category=".$sub_category.'&store_id='.$store_id);
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
				$q="delete from product_mapping where mapping_product_id=$eid";
		
				$res=mysqli_query($con,$q);

				$q="delete from products where product_id=$eid";
				
				$res=mysqli_query($con,$q);

				if(mysqli_affected_rows($con)>0)
				{
					header("location:products.php");
				}
				else
				{
					echo mysqli_error();
				}
			}
			
		}
		
	}
	
		header("location:".$_SERVER['HTTP_REFERER']);
	
?>
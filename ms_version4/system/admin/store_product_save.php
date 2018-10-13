<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	/*print_r($_POST);
	exit();*/
		if($product_mrp>=$mapping_product_offerprice)
		{
			$q="insert into product_mapping(mapping_store_id,mapping_product_id,mapping_subcategory_id,mapping_product_offerprice) values('$mapping_store_id','$mapping_product_id','$sub_category','$mapping_product_offerprice')";
			$res=mysqli_query($con,$q);	
			if(mysqli_affected_rows($con)>0)
			{
				header("location:store_add_products.php?saved=true&store_id=$mapping_store_id");
			}
			else
			{
				echo mysqli_error($con);
			}
		}
		else
		{
			header("location:store_add_products.php?saved=false&store_id=$mapping_store_id&product_id=$mapping_product_id&sub_category=$sub_category");
			
		}


		
	
?>
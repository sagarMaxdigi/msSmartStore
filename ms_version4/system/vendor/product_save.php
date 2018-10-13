<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	 $size = implode(",", $product_size);
	 $color = implode(",", $product_color);
	
	if(isset($update) && $update=="true")
	{
		$q = "update product_mapping set mapping_product_offerprice='$product_mrp'
		where mapping_product_id=$product_id";

		$res=mysqli_query($con,$q);

		$q="update products set product_name='$product_name'
			,product_category='$product_category'
			,product_size='$size'
			,product_color='$color'
			,product_desc='$product_desc'
			,product_highlights='$product_highlights'
			 where product_id=$product_id";
			
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			header("location:products.php?updated=true&product_id=$product_id");
		}
		else
		{
			header("location:products.php?updated=true&product_id=$product_id");
		}
	}
	else
	{

		$q="insert into products(product_name,product_category,product_size,product_color,product_mrp,product_desc,product_highlights,status) values('$product_name','$product_category','$size','$color','$product_price','$product_desc','$product_highlights','INACTIVE')";
		
		$res=mysqli_query($con,$q);

		$id = mysqli_insert_id($con);  

		$q="insert into product_mapping(mapping_store_id,mapping_product_id,mapping_product_offerprice)values('$store_id','$id','$product_mrp')";
		
		$res=mysqli_query($con,$q);

		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:products.php?saved=true");
		}
		else
		{

			header("location:products.php?saved=false");
		}
	}
?>
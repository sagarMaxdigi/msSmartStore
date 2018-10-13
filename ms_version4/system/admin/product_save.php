<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	extract($_GET);
	
	 $size = implode(",", $product_size);
	 $color = implode(",", $product_color);
	

	if(isset($pri_val) && $pri_val != "")
	{
		//$q="update products set product_priority=$pri_val where product_id=$product_id";
		$q = "UPDATE `products` SET `product_priority`=".$pri_val.", `is_new` = 'TRUE', `product_last_date` = NOW() WHERE `product_id` = ".$product_id;

		//$q="UPDATE `products` SET `product_priority`= ".$pri_val.", `is_new` = 'TRUE', `product_last_date` = NOW() WHERE `product_id` = ".$product_id;

		$res=mysqli_query($con,$q);		

		if(mysqli_affected_rows($con)>0)
		{
			$response = ["load_link"=>"products.php?updated=true&product_id=$product_id"];
		}
		else
		{
			$response = ["load_link"=>"products.php?updated=true&product_id=$product_id"];
		}

		echo json_encode($response);
	}
	else if(isset($update) && $update=="true")
	{
		$product_desc=trim($product_desc);
		$product_highlights=trim($product_highlights);

		$product_desc=nl2br($product_desc);
		$product_highlights=nl2br($product_highlights);
		
		$q="update products set product_name='$product_name'
			,product_code='$product_code'
			,product_category='$product_category'
			,product_size='$size'
			,product_color='$color'
			,product_desc='$product_desc'
			,product_highlights='$product_highlights'
			,same_products='$same_products'
			,similar_products='$similar_products'
			,product_brand='$product_brand'
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
	else if(isset($_GET['special']) && ($_GET['special']==="true" || $_GET['special']==="false"))
	{
		$q="update products set product_special='$special' where product_id=$product_id";
		
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
		$chkQuery = "select product_code from products where product_code = '$product_code'";
		$chkRes = mysqli_query($con,$chkQuery);
		if(mysqli_num_rows($chkRes)>0)
		{
			header("location:product_add.php?saved=false");
			die;
		}
		else
		{
			$q="insert into products(product_name,product_code,product_category,product_size,product_color, product_mrp,product_desc,product_highlights,same_products,similar_products,product_last_date,product_brand,status) values('$product_name','$product_code','$product_category','$size','$color','$product_price','$product_desc','$product_highlights','$same_products','$similar_products',NOW(),'$product_brand','ACTIVE')";

			$res=mysqli_query($con,$q);

			if(mysqli_affected_rows($con)>0)
			{
				// header("location:products.php?saved=true");
				$product_id = $con->insert_id;
				header("location:product_edit.php?product_id=$product_id");
				die;
			}
			else
			{
				echo mysqli_error($con);
				//header("location:products.php?saved=false");
			}

		}

		
		
		
		
		
	}
?>
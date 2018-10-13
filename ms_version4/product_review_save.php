<?php
	include_once("checkusersession.php");
	include_once("system/connection.php");
	include_once("system/functions.php");

	extract($_POST);
	
	if(isset($store_id) && $store_id != '')
	{
		$qry = "select member_id,store_id from store_rating where member_id = ".$_member_id." and store_id = ".$store_id;
		$isAvble = mysqli_query($con,$qry);
		
		if(mysqli_num_rows($isAvble)>0)
		{
			$q="update store_rating set rating_star = ".$rating." where member_id = ".$_member_id." and store_id = ".$store_id;
			$msg = 'update';
		}
		else
		{
			$q="insert into store_rating(member_id, store_id, rating_star) values('$_member_id','$store_id','$rating')";
			$msg = 'insert';
		}

		
		
	}
	else
	{
		$qry = "select review_member_id,review_product_id from product_review where review_member_id = ".$_member_id." and review_product_id = ".$product_id;
		$isAvble = mysqli_query($con,$qry);
		if(mysqli_num_rows($isAvble)>0)
		{
			$q="update product_review set review_rating = ".$rating." where review_member_id = ".$_member_id." and review_product_id = ".$product_id;
			$msg = 'update';
		}
		else
		{
			$q="insert into product_review(review_member_id,review_product_id,review_text,review_rating) values('$_member_id','$product_id','$review_text','$rating')";	
			$msg = 'insert';
		}

		
	}
	
		$res=mysqli_query($con,$q);
	
		if($res)
		{
			echo json_encode(['flag'=>1,'msg'=>$msg]);
		}
		else
		{
			echo json_encode(['flag'=>0,'msg'=>$msg]);
		}
	
?>
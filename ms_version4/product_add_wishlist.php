<?php
	include_once("checkusersession.php");
	include_once("system/connection.php");
	include_once("system/functions.php");

	extract($_POST);
	
	$isQry="select * from member_wishlist where wishlist_member_id=$_member_id and wishlist_product_id=$product_id and wishlist_store_id=$store_id";
	$res=mysqli_query($con,$isQry);
	if(mysqli_num_rows($res)>0)
	{
		$delQry="delete from member_wishlist where wishlist_member_id=$_member_id and wishlist_product_id=$product_id and wishlist_store_id=$store_id";
		$res=mysqli_query($con,$delQry);
		if(mysqli_affected_rows($con)>0)
		{
			$delQry="DELETE FROM notification WHERE n_ref_id NOT IN (SELECT wishlist_id FROM member_wishlist)";
			$_res=mysqli_query($con,$delQry);
			
			echo json_encode(['flag'=>2,'msg'=>'Unfavourite']);
		}
		else
		{
			echo json_encode(['flag'=>0,'msg'=>"<p class='text-danger'>Not remove (Unknown error)</p>"]);
		}
		
	}
	else
	{
		$q="insert into member_wishlist(wishlist_member_id,wishlist_store_id,wishlist_product_id,wishlist_size,wishlist_color,images,wishlist_date) ";
		$q.=" values('$_member_id','$store_id','$product_id','$size','$color','$images',NOW())";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{	
			$lastL_id = mysqli_insert_id($con);
			$notQry = "insert into notification(n_ref_id,n_type,n_msg,n_status,n_date) values($lastL_id,'wishlist','Wishlist add by <b>".$_SESSION['member_fname']." ".$_SESSION['member_lname']."</b>',0,NOW())";
			$res=mysqli_query($con,$notQry);

			echo json_encode(['flag'=>1,'msg'=>'Favourite']);
		}
		else
		{
			echo json_encode(['flag'=>0,'msg'=>"<p class='text-danger'>Not added (Unknown error)</p>"]);
		}
	}
	
?>
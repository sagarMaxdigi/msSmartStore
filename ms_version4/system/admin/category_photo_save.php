<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);
	if($_POST["submit"]=="Update Image")
	{
		$type = $_FILES['category_thumb']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['category_thumb']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../images/categorythumb/";
			$target_dir = $target_dir . $name.".$ext";
			if (move_uploaded_file($_FILES["category_thumb"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
			if($res==1)
			{
				$file_name =  $name.'.'.$ext;
				$q = "update categories set category_thumb='$file_name' where category_id=$category_id";
				$res = mysqli_query($con,$q);
				header("location:category_photo.php?update=true&category_id=$category_id");
			}
			else
			{
				echo mysql_error();
				//header("location:product_image.php?update=false&category_id=$category_id");
			}
		}
		else
				header("location:category_photo.php?image=error&category_id=$category_id");
	}
	/*else if($_POST["submit"]=="Remove Image")
	{
		$product=getProduct($category_id);
		unlink("../images/products/".$product["category_thumb"]);
		$q = "update products set category_thumb='' where category_id=$category_id";
		$res = mysql_query($q);
		header("location:category_thumb.php?update=true&category_id=$category_id");
	}*/
	else
				header("location:category_photo.php?update=false&category_id=$category_id");

?>
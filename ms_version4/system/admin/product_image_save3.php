<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);
	if($_POST["submit"]=="Update Image")
	{
		$type = $_FILES['product_image1']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['product_image1']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../../product_images/";
			$target_dir = $target_dir . $name.".$ext";
			if (move_uploaded_file($_FILES["product_image1"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
			if($res==1)
			{
				$file_name =  $name.'.'.$ext;
				$q = "update products set product_img4='$file_name' where product_id=$product_id";
				$res = mysqli_query($con,$q);
				header("location:product_image.php?update=true&product_id=$product_id");
			}
			else
			{
				echo mysql_error();
				//header("location:product_image.php?update=false&product_id=$product_id");
			}
		}
		else
			header("location:product_image.php?image=error&product_id=$product_id");
	}
	/*else if($_POST["submit"]=="Remove Image")
	{
		$product=getProduct($product_id);
		unlink("../images/products/".$product["product_image1"]);
		$q = "update products set product_image1='' where product_id=$product_id";
		$res = mysql_query($q);
		header("location:product_image1.php?update=true&product_id=$product_id");
	}*/
	else
		header("location:product_image.php?update=false&product_id=$product_id");

?>
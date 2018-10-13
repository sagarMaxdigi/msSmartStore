<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);
	if($_POST["submit"]=="Update Image")
	{
		$type = $_FILES['store_banner']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['store_banner']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../../images/store/storebanner/";
			$target_dir = $target_dir . $name.".$ext";
			if (move_uploaded_file($_FILES["store_banner"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
			if($res==1)
			{
				$file_name =  $name.'.'.$ext;
				$q = "update store set store_banner='$file_name' where store_id=$store_id";
				$res = mysqli_query($con,$q);
				header("location:store_media.php?update=true&store_id=$store_id");
			}
			else
			{
				echo mysql_error();
				//header("location:product_image.php?update=false&product_id=$product_id");
			}
		}
		else
			echo mysql_error();
			//header("location:store_media.php?image=error&store_id=$store_id");
	}
	/*else if($_POST["submit"]=="Remove Image")
	{
		$product=getProduct($product_id);
		unlink("../images/products/".$product["store_banner"]);
		$q = "update products set store_banner='' where product_id=$product_id";
		$res = mysql_query($q);
		header("location:store_banner.php?update=true&product_id=$product_id");
	}*/
	else
		header("location:store_media.php?update=false&store_id=$store_id");

?>
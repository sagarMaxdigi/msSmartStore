<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);
	if($_POST["submit"]=="Update Image")
	{
		$type = $_FILES['subcategory_banner']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['subcategory_banner']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../../images/subcategory/";
			$target_dir = $target_dir . $name.".$ext";
			if (move_uploaded_file($_FILES["subcategory_banner"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
			if($res==1)
			{
				$file_name =  $name.'.'.$ext;
				$q = "update subcategory set subcategory_banner='$file_name' where subcategory_id=$subcategory_id";
				$res = mysqli_query($con,$q);
				header("location:sub_category_banner.php?update=true&subcategory_id=$subcategory_id");
			}
			else
			{
				echo mysql_error();
				//header("location:category_image.php?update=false&subcategory_id=$subcategory_id");
			}
		}
		else
			header("location:sub_category_banner.php?image=error&subcategory_id=$subcategory_id");
	}
	/*else if($_POST["submit"]=="Remove Image")
	{
		$product=getProduct($subcategory_id);
		unlink("../images/products/".$product["subcategory_banner"]);
		$q = "update products set subcategory_banner='' where subcategory_id=$subcategory_id";
		$res = mysql_query($q);
		header("location:subcategory_banner.php?update=true&subcategory_id=$subcategory_id");
	}*/
	else
		header("location:sub_category_banner.php?update=false&subcategory_id=$subcategory_id");

?>
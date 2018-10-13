<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$type = $_FILES['superbanner_image']['type'];
		
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['superbanner_image']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../../images/supperbanner/";
			$target_dir = $target_dir . $name.".$ext";
			
			if (move_uploaded_file($_FILES["superbanner_image"]["tmp_name"], $target_dir))

		$file_name =  $name.'.'.$ext;

		$q="update superbanner set superbanner_name='$superbanner_name', supercategory_id='$supercategory_id', superbanner_image='$file_name'
		where superbanner_id=2";
			
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:super_banner.php?updated=true&superbanner_id=$superbanner_id");
		}
		else
		{
			header("location:super_banner.php?updated=true&superbanner_id=$superbanner_id");
		}
	}
	else
		header("location:super_banner.php?updated=false&superbanner_id=$superbanner_id");
	}
	else if(isset($_GET["superbanner_status"]) && $_GET["superbanner_status"]!="")
	{
		extract($_GET);
		
		$q = "update superbanner set superbanner_status='$superbanner_status' where superbanner_id=2";
		$res = mysqli_query($con,$q);
	
		header("location:super_banner.php?update=true");
	}
?>
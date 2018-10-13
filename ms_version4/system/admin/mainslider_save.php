<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	
	
	if(isset($_POST["submit"]) && $_POST["submit"]=="Update Image")
	{
		extract($_POST);

		$type = $_FILES['mainslider_image']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		{
			$path = $_FILES['mainslider_image']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "../../images/mainsliders/";
			
			$file_name =  $name.".$ext";
			
			$target_dir = $target_dir . $file_name;
			
			if (move_uploaded_file($_FILES["mainslider_image"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
				
			if($res==1)
			{
				$q = "insert into mainsliders (mainslider_image)values('$file_name')";
				$res = mysqli_query($con,$q);
				header("location:main_slider.php?inserted=true");
			}
			else
			{
				header("location:main_slider.php?inserted=false");
			}
		}
		else
				header("location:main_slider.php?image=error");
	}
	else if(isset($_GET["mainslider_status"]) && $_GET["mainslider_status"]!="")
	{
		extract($_GET);
		
		$q = "update mainsliders set mainslider_status='$mainslider_status' where mainslider_id=$mainslider_id";
		$res = mysqli_query($con,$q);
	
		header("location:main_slider.php?update=true");
	}
	else
		header("location:main_slider.php?update=false");

?>
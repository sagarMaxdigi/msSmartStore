<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
        $type = $_FILES['store_logo']['type'];
		if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
        {
            $path = $_FILES['store_logo']['name'];
			$path=strtolower($path);		
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name=randomImageName();
			$target_dir = "logo/";
			$target_dir = $target_dir . $name.".$ext";
			if (move_uploaded_file($_FILES["store_logo"]["tmp_name"], $target_dir))
				$res=1;
			else
				$res=0;
        if($res==1)
			{
				$file_name =  $name.'.'.$ext;
		        $q="update store set store_logo ='$file_name' where store_id = '$store_id'";
		
		$res=mysqli_query($con,$q);
		
		if(mysqli_affected_rows($con)>0)
		{
			header("location:store_edit.php?saved=true");
		}
		else
		{
			header("location:store_edit.php?saved=false");
		}
			}
        else
			{
				echo mysql_error();
				//header("location:product_image.php?update=false&product_id=$product_id");
			}
        
	}
?>
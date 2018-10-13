<?php
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	extract($_POST);

	if($_POST["submit"]=="Save")
	{
		//start upload multiple images
	    	$targetDir = "../../product_images/";
		    $allowTypes = array('jpg','png','jpeg','gif');
		    
		    $images_arr = array();
		    foreach($_FILES['product_image']['name'] as $key=>$val){
		        $image_name = $_FILES['product_image']['name'][$key];
		        $tmp_name   = $_FILES['product_image']['tmp_name'][$key];
		        $size       = $_FILES['product_image']['size'][$key];
		        $type       = $_FILES['product_image']['type'][$key];
		        $error      = $_FILES['product_image']['error'][$key];
		        
		        // File upload path
		        // $product_code.str_replace(" ", "", basename($_FILES['product_image']['name'][$key]));
		        $fileName = $product_code.str_replace(" ", "", basename($_FILES['product_image']['name'][$key]));
		        $targetFilePath = $targetDir . $fileName;
		        
		        // Check whether file type is valid
		        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		        if(in_array($fileType, $allowTypes)){    
		            // Store images on the server
		            if(move_uploaded_file($_FILES['product_image']['tmp_name'][$key],$targetFilePath)){
		                $images_arr[] = $fileName;
		            }
		        }
		    }
		    //end upload multiple images
		    $images='';
		     if(!empty($images_arr)){
				$images = implode(',', $images_arr);
		     
		


			$product_size = implode(',', $product_size);
			$q="insert into product_color(product_id,color,size,image) values('$product_id','$product_color','$product_size','$images')";

			$res=mysqli_query($con,$q);

			if(mysqli_affected_rows($con)>0)
			{
				header("location:product_image.php?product_id=$product_id&update=true");
				die;
			}
			else
			{
				echo mysqli_error($con);
				//header("location:products.php?saved=false");
			}

		}else{
			header("location:product_image.php?product_id=$product_id&update=false");
				die;
		}
		// $type = $_FILES['product_image']['type'];
		// if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/pjpeg" || $type=="image/gif" || $type=="image/x-png" || $type=="image/bmp" ||  $type=="image/png")
		// {
		// 	$path = $_FILES['product_image']['name'];
		// 	$path=strtolower($path);		
		// 	$ext = pathinfo($path, PATHINFO_EXTENSION);
		// 	$name=randomImageName();
		// 	$target_dir = "../../product_images/";
		// 	$target_dir = $target_dir . $name.".$ext";
		// 	if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_dir))
		// 		$res=1;
		// 	else
		// 		$res=0;
		// 	if($res==1)
		// 	{
		// 		$file_name =  $name.'.'.$ext;
		// 		$q = "update products set product_img1='$file_name' where product_id=$product_id";
		// 		$res = mysqli_query($con,$q);
		// 		header("location:product_image.php?update=true&product_id=$product_id");
		// 	}
		// 	else
		// 	{
		// 		echo mysql_error();
		// 		//header("location:product_image.php?update=false&product_id=$product_id");
		// 	}
		// }
		// else
		// 	header("location:product_image.php?image=error&product_id=$product_id");
	}elseif($_POST["submit"]=="delete"){
		echo 'delete';
	}
	else
		header("location:product_image.php?update=false&product_id=$product_id");

?>
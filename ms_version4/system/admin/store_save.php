<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	//print_r($_POST);
	//exit();

		//banner image upload
				$target_dir = "../../images/store/storebanner/";
				$target_file = $target_dir . basename($_FILES["store_banner"]["name"]);
				$store_banner = basename( $_FILES["store_banner"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    // echo "Sorry, your file was not uploaded.";
				    header("location:store_report.php?saved=false");
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["store_banner"]["tmp_name"], $target_file)) {
				        // echo "The file ". basename( $_FILES["store_banner"]["name"]). " has been uploaded.";
				        header("location:store_report.php?saved=true");
				    } else {
				        header("location:store_report.php?saved=false");
				    }
				}
			//banner image upload


	$store_name 		= addslashes($store_name);
	$store_code 		= addslashes($store_code);
	$store_address1 	= addslashes($store_address1);
	$store_address2 	= addslashes($store_address2);
	$store_address3 	= addslashes($store_address3);
	$store_description 	= addslashes($store_description);
	$store_location_url = addslashes($store_location_url);
	if(isset($update) && $update=="true")
	{
    	$q="update store set store_name='$store_name'
    		,store_code='$store_code'
			,store_email='$store_email'
			,store_contact1='$store_contact1'
			,store_contact2='$store_contact2'
			,store_address1='$store_address1'
			,store_address2='$store_address2'
			,store_address3='$store_address3'
			,store_city='$store_city'
			,store_area='$store_area'
			,store_description='$store_description'
            ,store_contact_person='$store_contact_person'
            ,store_eshtablish_year='$store_eshtablish_year'
            ,store_opening_hours='$store_opening_hours'
            ,store_serving_pincode='$store_serving_pincode'
            ,store_location_url='$store_location_url'
            ,store_banner='$store_banner'
            where store_id=$store_id";
			
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			//echo mysqli_error($con);
			header("location:store_report.php?updated=true&store_id=$store_id");
		}
		else
		{
			//echo mysqli_error($con);
			header("location:store_report.php?updated=true&store_id=$store_id");
		}

			}
       
	else
	{

			//banner image upload
				$target_dir = "../../images/store/storebanner/";
				$target_file = $target_dir . basename($_FILES["store_banner"]["name"]);
				$store_banner = basename( $_FILES["store_banner"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    // echo "Sorry, your file was not uploaded.";
				    header("location:store_report.php?saved=false");
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["store_banner"]["tmp_name"], $target_file)) {
				        // echo "The file ". basename( $_FILES["store_banner"]["name"]). " has been uploaded.";
				        header("location:store_report.php?saved=true");
				    } else {
				        header("location:store_report.php?saved=false");
				    }
				}
			//banner image upload
					if($uploadOk==1){
						$q="insert into store(store_name,store_code,store_email,store_contact1,store_contact2,store_address1,store_address2,store_address3,store_city,store_landmark,store_description,store_contact_person,store_eshtablish_year,store_opening_hours,store_serving_pincode,store_weekoff,store_password,store_location_url,store_banner) values('$store_name','$store_code','$store_email','$store_contact1','$store_contact2','$store_address1','$store_address2','$store_address3','$store_city','$store_landmark','$store_description','$store_contact_person','$store_eshtablish_year','$store_opening_hours','$store_serving_pincode','$store_weekoff','$store_password','$store_location_url','$store_banner')";
		
							$res=mysqli_query($con,$q);
							
							if(mysqli_affected_rows($con)>0)
							{
								header("location:store_report.php?saved=true");
							}
							else
							{
								header("location:store_report.php?saved=false");
							}
					}

		        
	}
        
	
?>
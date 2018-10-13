<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_POST);
	
	if(isset($update) && $update=="true")
	{
		$q="update superbanner set superbanner_name='$superbanner_name'
		where superbanner_id=$superbanner_id";
			
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
	else if(isset($_GET["superbanner_status"]) && $_GET["superbanner_status"]!="")
	{
		extract($_GET);
		
		$q = "update superbanner set superbanner_status='$superbanner_status' where superbanner_id=$superbanner_id";
		$res = mysqli_query($con,$q);
	
		header("location:super_banner.php?update=true");
	}
	else
	{
		$type1 = $_FILES['superbanner_image1']['type'];
		$type2 = $_FILES['superbanner_image2']['type'];
		$type3 = $_FILES['superbanner_image3']['type'];

		if($type1=="image/jpeg" || $type1=="image/jpg" || $type1=="image/pjpeg" || $type1=="image/gif" || $type1=="image/x-png" || $type1=="image/bmp" ||  $type1=="image/png" && $type2=="image/jpeg" || $type2=="image/jpg" || $type2=="image/pjpeg" || $type2=="image/gif" || $type2=="image/x-png" || $type2=="image/bmp" ||  $type2=="image/png" && $type3=="image/jpeg" || $type3=="image/jpg" || $type3=="image/pjpeg" || $type3=="image/gif" || $type3=="image/x-png" || $type3=="image/bmp" ||  $type3=="image/png" )
		{
			$path1 = $_FILES['superbanner_image1']['name'];
			$path1=strtolower($path1);		
			$ext1 = pathinfo($path1, PATHINFO_EXTENSION);
			$name1=randomImageName();
			$target_dir1 = "../../images/supperbanner/";
			
			$file_name1 =  $name1.".$ext1";
			
			$target_dir1 = $target_dir1 . $file_name1;
			
			/*if (move_uploaded_file($_FILES["superbanner_image1"]["tmp_name"], $target_dir1))

				$res1=1;
			else
				$res1=0;*/

			$path2 = $_FILES['superbanner_image2']['name'];
			$path2 =strtolower($path2);		
			$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
			$name2 =randomImageName();
			$target_dir2 = "../../images/mainsliders/";
			
			$file_name2 =  $name2.".$ext2";
			
			$target_dir2 = $target_dir2 . $file_name2;
			
			/*if (move_uploaded_file($_FILES["superbanner_image2"]["tmp_name"], $target_dir2))

				$res2=1;
			else
				$res2=0;*/

			$path3 = $_FILES['superbanner_image3']['name'];
			$path3 =strtolower($path3);		
			$ext3 = pathinfo($path3, PATHINFO_EXTENSION);
			$name3 =randomImageName();
			$target_dir3 = "../../images/mainsliders/";
			
			$file_name3 =  $name3.".$ext3";
			
			$target_dir3 = $target_dir3 . $file_name3;
			
			if (move_uploaded_file($_FILES["superbanner_image1"]["tmp_name"], $target_dir1 && move_uploaded_file($_FILES["superbanner_image2"]["tmp_name"], $target_dir2 && move_uploaded_file($_FILES["superbanner_image3"]["tmp_name"], $target_dir3))

				$res=1;
			else
				$res=0;
			
			if($res==1)
			{
				//echo "1"; die;
				$q="insert into superbanner(superbanner_name,superbanner_image1,superbanner_image2,superbanner_image3,supercategory_id) values('$superbanner_name','$file_name1',$file_name2,$file_name3,'$supercategory_id','')";
		
				$res=mysqli_query($con,$q);

				if(mysqli_affected_rows($con)>0)
				{
					header("location:super_banner.php?saved=true");
				}
		
			}
			else
			{
				//echo "0"; die;
				header("location:super_banner.php?saved=false");
			}

		}
		
		
		/*else
		{
			header("location:super_banner.php?image=error");
			
		}*/
	}
?>
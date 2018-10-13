<?php
	include_once("../connection.php");
	include_once("../functions.php");
	
	extract($_GET);
	
	$slider = getMainSlider($eid);
	$slider_path = $slider['mainslider_path'];

	$slider_path = str_replace("http://surbhishree.com/jainsanyuj/system/", "../", $slider_path);
	//echo $slider_path;
	$res = unlink($slider_path);

	$q="delete from mainsliders where mainslider_id=$eid";
	
	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:main_slider.php");
	}
	else
	{
		echo mysqli_error();
	}
?>
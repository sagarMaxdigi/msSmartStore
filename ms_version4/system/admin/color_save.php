<?php
include_once("../connection.php");
include_once("../functions.php");

extract($_POST);
if(isset($update) && $update=="true")
{
	$q="update colors set color_name='$color_name'
	,color_code='$color_code'
	where color_id=$color_id";


	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:color.php?updated=true&color_id=$color_id");
	}
	else
	{
		header("location:color.php?updated=true&color_id=$color_id");
	}
}
else
{
	$q="insert into colors(color_name,color_code) values('$color_name','$color_code')";

	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:color.php?saved=true");
	}
	else
	{
		header("location:color.php?saved=false");
	}
}
?>
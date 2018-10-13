<?php
include_once("../connection.php");
include_once("../functions.php");

extract($_POST);
if(isset($update) && $update=="true")
{
	$q="update area set area_name='$area_name'
	,area_city_id=$area_city_id
	,area_pincode='$area_pincode'
	where area_id=$area_id";


	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:area.php?updated=true&area_id=$area_id");
	}
	else
	{
		header("location:area.php?updated=true&area_id=$area_id");
	}
}
else
{
	$q="insert into area(area_name,area_city_id,area_pincode) values('$area_name',$area_city_id,'$area_pincode')";

	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:area.php?saved=true");
	}
	else
	{
		header("location:area.php?saved=false");
	}
}
?>
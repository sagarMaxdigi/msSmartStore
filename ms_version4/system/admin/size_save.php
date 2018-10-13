<?php
include_once("../connection.php");
include_once("../functions.php");

extract($_POST);
if(isset($update) && $update=="true")
{
	$q="update size set size_name='$size_name'
	where size_id=$size_id";


	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:size.php?updated=true&size_id=$size_id");
	}
	else
	{
		header("location:size.php?updated=true&size_id=$size_id");
	}
}
else
{
	$q="insert into size(size_name) values('$size_name')";

	$res=mysqli_query($con,$q);

	if(mysqli_affected_rows($con)>0)
	{
		header("location:size.php?saved=true");
	}
	else
	{
		header("location:size.php?saved=false");
	}
}
?>
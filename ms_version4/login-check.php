<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	include_once("system/connection.php");
	include_once("system/functions.php");
	
	extract($_POST);
	
	
	$q="select * from members where member_contact='$contact' && member_password='$password'";
	$res=mysqli_query($con,$q);
	
	if($row=mysqli_fetch_array($res))
	{
		if($row['member_contact']==$contact && $row['member_password']==$password)
		{
			session_start();
			$_SESSION['recent_products']=array();
			
			$_SESSION['member_id']=$row['member_id'];
			$_SESSION['member_fname']=$row['member_fname'];
			$_SESSION['member_lname']=$row['member_lname'];
			// echo $_GET['http_refer'];
			/*
			[http_refer] => http://localhost/msstore/product.php?pid=1
    [prdct_name] => product 1 
    [colorID] => 1
			*/
			if(isset($_GET['prdct_name']) && isset($_GET['colorID']))
			{
				header('Location: ' . $_GET['http_refer'].'&prdct_name='.$_GET['prdct_name'].'&colorID='.$_GET['colorID']);//Atish 15th Aug, 2018
			}
			else
			{
				header('Location: ' . $_GET['http_refer']);//Atish 15th Aug, 2018
			}
			
			die();
		}
		else
		{
			header("location:login.php?login=false");
			die();
		}
	}
	else
	{
		header("location:login.php?login=false");
		die();
	}
?>
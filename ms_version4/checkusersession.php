<?php
	session_start();
	
	if(!isset($_SESSION['recent_products']))
	{
		$_SESSION['recent_products']=array();
	}
	
	if(isset($_force_session) && $_force_session=="true")
	{
		if(!isset($_SESSION['member_id']) || $_SESSION['member_id']=="")
		{
			header("location:login.php");
			die();
		}
	}

	if(isset($_force_myaccount) && $_force_myaccount=="true")
	{
		if(isset($_SESSION['member_id']) && $_SESSION['member_id']!="")
		{
			header("location:my-account.php");
			die();
		}
	}
	
	if(isset($_SESSION['member_id']) && $_SESSION['member_id']!="")
	{
		$_member_id=$_SESSION['member_id'];
		$_member_fname=$_SESSION['member_fname'];
		$_member_lname=$_SESSION['member_lname'];
	}
?>
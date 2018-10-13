<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	include_once("connection.php");
	
	extract($_POST);
	
	if(isset($submit) && $submit!="")
	{
		if($username == 'admin'){
		$q="select * from admin where username='$username' and password='$password'";
		$res=mysqli_query($con,$q);
		
		if($row=mysqli_fetch_assoc($res))
		{			
			if($username==$row['username'] && $password==$row['password'])
			{
				session_start();
				$_SESSION['admin_id']=$row['admin_id'];
				$_SESSION['username']=$row['username'];
				
				header("location:admin/index.php");
			}
			else
			{
				header("location:login.php?login1=failed");
			}			
		}
		else
		{
			//echo mysqli_error();
			header("location:login.php?login2=failed");
		}
	}
	else
	{
		$q="select * from store where store_email='$username' and store_password='$password'";
		
		$res=mysqli_query($con,$q);

		if($row=mysqli_fetch_assoc($res))
		{			
			if($username==$row['store_email'] && $password==$row['store_password'])
			{
				session_start();
				$_SESSION['store_id']=$row['store_id'];
				$_SESSION['store_name']=$row['store_name'];
				header("location:vendor/index.php");
			}
			else
			{
				echo mysqli_error();	
				//header("location:login.php?login1=failed");
			}			
		}
		else
		{
			echo mysqli_error($con);
			//header("location:login.php?login2=failed");
		}
	}			
}	
else
{
	header("location:login.php?login3=failed");
}			
?>
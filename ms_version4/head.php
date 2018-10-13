<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	include_once("checkusersession.php");
	include_once("system/connection.php");
	include_once("system/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome to MS Smart Store</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style type="text/css">

		.or h2 {
		width: 100%;
		text-align: center;
		border-bottom: 1px solid #000;
		line-height: 0.1em;
		margin: 10px 0 35px;
		}

		.or h2 span {
		background:#fff;
		padding:0 10px;
		}
	</style>
</head>
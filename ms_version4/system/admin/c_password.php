<?php 
include_once("../connection.php");
include_once("../functions.php");

extract($_POST);
$q = "update admin set password='$new_password'
      where username='$username' and password='$old_password'";
      $res = mysqli_query($con,$q);
      if($row = mysqli_affected_rows($con)>0)
      {
      		session_start();
			$_SESSION['password']=$row['password'];

        header("location:profile.php?updated=true");
      }else
      {
        //echo mysqli_error($con);
        header("location:profile.php?updated=false");
      }

?>
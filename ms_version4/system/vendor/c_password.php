<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  include_once("checksession.php");
  include_once("../connection.php");
  include_once("../functions.php");

extract($_POST);
$q = "update store set store_password='$new_password'
      where store_id='$store_id' and store_password='$previous_password'";
      $res = mysqli_query($con,$q);
      if($row = mysqli_affected_rows($con)>0)
      {
        header("location:change_password.php?updated=true");
      }else
      {
        //echo mysqli_error($con);
        header("location:change_password.php?updated=false");
      }

?>
<?php
include_once("system/connection.php");
	include_once("system/functions.php");
		define("REDIRECT_URL", "https://mssmartstore.com/google-callback.php");

		/* * ***** Google related activities start ** */
		define("CLIENT_ID", "653109088908-pfvmjr7r7bb55rca4b23a1qgkmrfk0ul.apps.googleusercontent.com");
		define("CLIENT_SECRET", "2ZoxOAjrm7HniG8jbJ6adVpP");

		/* permission */
		define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
				'https://www.googleapis.com/auth/userinfo.profile' );
		

		/* logout both from google and your site **/
		define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode("https://mssmartstore.com/logout.php"));

		require('google/http.php');
		require('google/oauth_client.php');
		

		$client = new oauth_client_class;

		// set the offline access only if you need to call an API
		// when the user is not present and the token may expire
		$client->offline = FALSE;

		$client->debug = false;
		$client->debug_http = true;
		$client->redirect_uri = REDIRECT_URL;

		$client->client_id = CLIENT_ID;
		$application_line = __LINE__;
		$client->client_secret = CLIENT_SECRET;

		if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
		 die("set client ID and Client secret correctly");

		// API permission
		$client->scope = SCOPE;
		if (($success = $client->Initialize())) {
		  if (($success = $client->Process())) {
		    if (strlen($client->authorization_error)) {
		      $client->error = $client->authorization_error;
		      $success = false;
		    } elseif (strlen($client->access_token)) {
		      $success = $client->CallAPI(
		              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
		    }  
		  }
		  $success = $client->Finalize($success);
		}
		if ($client->exit)
		  exit;
	
		if ($success) {
		  // Now check if user exist with same email ID


		  $sql = "SELECT COUNT(*) AS count from members where member_email = '".$user->email."'";
		  try {
		  	$result = array();
		  	$qry = mysqli_query($con,$sql);
		  	while($res = mysqli_fetch_assoc($qry)){
		  		$result = $res;
		  	}
		    //$result = $this->db->query($sql)->result();

		    if ($result['count'] > 0) {
		      // User Exist 

               $qry= "SELECT member_id,social_id from members where social_id = '".$user->id."'";
               $res = mysqli_query($con,$qry);
               if($row=mysqli_fetch_array($res))
				{
					session_start();
					
					$_SESSION['member_id']		=$row['member_id'];
					$_SESSION['member_email']	=$user->email;
					$_SESSION['member_fname']	=$user->given_name;
					$_SESSION['member_lname']	=$user->family_name;
					
					header('Location: ' . $_SESSION['last_refer']);//Atish 15th Aug, 2018
					die;
					
				}



		    } else {
		    	
		      	$q="insert into members(social_id,member_fname,member_lname,member_gender,member_email) values(".$user->id.",'".$user->given_name."','".$user->family_name."','".$user->gender."','".$user->email."')";

					$res=mysqli_query($con,$q);  
		     	if(mysqli_affected_rows($con)>0)
				{
					session_start();
					
					$_SESSION['member_id']=mysqli_insert_id($con);
					$_SESSION['member_fname']=$user->given_name;
					$_SESSION['member_lname']=$user->family_name;
			
					header('Location: ' . $_SESSION['last_refer']);//Atish 15th Aug, 2018
					die;
				}
		    }
		  } catch (Exception $ex) {
		    $_SESSION["e_msg"] = $ex->getMessage();
		  }

		} else {
		  $_SESSION["e_msg"] = $client->error;
		}
		//echo 'Last page : '.$_SERVER['HTTP_REFERER'];
				
?>
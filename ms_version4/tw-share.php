<?php
		  include_once('tmhOAuth.php');
     	  include_once('tmhUtilities.php');
     	  $img = $_POST['img'];

       
       

          $tmhOAuth = new tmhOAuth(array(
          'consumer_key' => '5V0VkATdebMI6aHREABAldtKv',
          'consumer_secret' => 'N15ny6fTHLoN9wVxwloJIY4tER3qQyNA2B94sQSxnddp1hpKWu', 
          'curl_ssl_verifypeer' => false
          ));
          $tmhOAuth->request('POST', $tmhOAuth->url('oauth/request_token', ''));
          $response = $tmhOAuth->extract_params($tmhOAuth->response["response"]);

          $temp_token = $response['oauth_token']; 
          $temp_secret = $response['oauth_token_secret']; 
          $time = $_SERVER['REQUEST_TIME'];
          setcookie("Temp_Token", $temp_token, $time + 3600 * 30, '/');
          setcookie("Temp_Secret", $temp_secret, $time + 3600 * 30, '/');
          setcookie("Tweet_Txt", "https://mssmartstore.com/ is the online shoping website.", $time + 3600 * 30, '/');
          setcookie("Img_Url", "https://mssmartstore.com/".$img, $time + 3600 * 30, '/');

          $url = $tmhOAuth->url("oauth/authorize", "") . '?oauth_token=' . $temp_token;
        
          //header('Location: '.$url);
          //redirect("https://www.w3schools.com");
         
          echo json_encode($url);     
?>
<?php
    include_once('tmhOAuth.php');
    include_once('tmhUtilities.php');
    
    $token = $_COOKIE['Temp_Token'];
          $secret = $_COOKIE['Temp_Secret'];
          $img = $_COOKIE['Img_Url'];
          $txt = $_COOKIE['Tweet_Txt'];
          $tmhOAuth = new tmhOAuth(array(
          'consumer_key' => '5V0VkATdebMI6aHREABAldtKv',
          'consumer_secret' => 'N15ny6fTHLoN9wVxwloJIY4tER3qQyNA2B94sQSxnddp1hpKWu',
          'user_token' => $token,
          'user_secret' => $secret, 
          'curl_ssl_verifypeer' => false
          ));
          $tmhOAuth->request("POST", $tmhOAuth->url("oauth/access_token", ""), array(
            'oauth_verifier' => $_GET["oauth_verifier"] 
          )); 
          $response = $tmhOAuth->extract_params($tmhOAuth->response["response"]);
          $tmhOAuth->config["user_token"] = $response['oauth_token']; 
          $tmhOAuth->config["user_secret"] = $response['oauth_token_secret'];
          $code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',

           array(
           'media[]' => file_get_contents($img),
           'status' => $txt
           ),
           true, // use auth
           true // multipart
           );

          if ($code == 200){
          echo "<h1>Your image tweet has been sent successfully <a href='#' onclick='window.close()'> Back</a></h1>";
          }else{
          tmhUtilities::pr($tmhOAuth->response['response']);
          echo "<br/><a href='#' onclick='window.close()'> Back</a>";
         }



?>
<?php	
	$_force_myaccount="true";
	include_once("head.php");
	include_once("Facebook/autoload.php");
	$_SESSION['last_refer'] = $_SERVER['HTTP_REFERER'];
?>
<body>
	<?php
        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");
	?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Login</li>
			</ul>
		</div>     
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">     
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">



				<form action="login-check.php?http_refer=<?=$_SERVER['HTTP_REFERER']?>" method="post"  class="clearfix">
					<div class="col-md-offset-4 col-md-4 ">                    
						<div class="billing-details">
							
                            <?php
							if(isset($_GET['register']) && $_GET['register']=="true")
							{
							?>
                            <div style="padding:5px; background-color:#090; color:#FFF">
                            Your account is created successfully! Password is sent to your mobile number.
                            </div>
                            <?php
							}
							?>
                            
                            <?php
							if(isset($_GET['login']) && $_GET['login']=="false")
							{
							?>
                            <div style="padding:5px; background-color:#FB4011; color:#FFF">
                            Invalid login details.
                            </div>
                            <?php
							}
							?>
                            <br>
                            <p><strong>Not registered yet? <a href="register.php" class="text-danger">Register Now</a></strong></p>
                            
							<div class="section-title">
								<h3 class="title">Login Here</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="contact" required placeholder="Mobile">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="password" required placeholder="Password">
							</div>
						</div>
						<div class="text-center">
						<input type="submit" class="primary-btn" value="Login Now"> 
						</div>
						
						
						<br><br>
						<div class="or text-center">
							<h2><span>OR</span></h2>
						
						<a class="btn btn-default" href="google-callback.php">  <i class="fa fa-google-plus"></i> Login with Google</a>
						
							<?php
								$fb = new Facebook\Facebook([
								  'app_id' => '329411374300021',
								  'app_secret' => '56c7c98657b7946c14799b2be6d3def9',
								  'default_graph_version' => 'v3.1',
								]);
								 
								$helper = $fb->getRedirectLoginHelper();
								 
								$permissions = ['email']; 
								$loginUrl = $helper->getLoginUrl('https://mssmartstore.com/fb-callback.php', $permissions);
								 
								echo '<a class="btn btn-social btn-default btn-facebook" target="_blank" href="' . htmlspecialchars($loginUrl) . '"> <i class="fa fa-facebook"></i>&nbsp;Log in with Facebook</a>';
							?>
						</div>							
					</div>
					
				</form>








				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php
	include_once("footer.php");
	include_once("js.php");
?>

</body>

</html>

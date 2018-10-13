<?php
	$_force_myaccount="true";

	include_once("head.php");
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
				<li class="active">Create Account</li>
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
				<form action="save-register.php" method="post"  class="clearfix">
					<div class="col-md-6">                    
						<div class="billing-details">
							
                            <?php
							if(isset($_GET['contact']) && $_GET['contact']=="exist")
							{
							?>
                            <div style="padding:5px; background-color:#FB4011; color:#FFF">
                            This mobile number is already registered, Please go to Login
                            </div>
                            <?php
							}
							?>
                            <br>                            
                            <p><strong>Already a registered? <a href="login.php" class="text-danger">Login Here</a></strong></p>
                            
							<div class="section-title">
								<h3 class="title">Create New Account</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="firstname" required placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="lastname" required placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="contact" required placeholder="Mobile Number">
							</div>
							<?php /*?><div class="form-group">
								<input class="input" type="email" name="email" required placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" required placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" required placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" required placeholder="PIN Code">
							</div><?php */?>
						</div>
					</div>

					<div class="col-md-12">
                        <input type="submit" class="primary-btn" value="Create Account">
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

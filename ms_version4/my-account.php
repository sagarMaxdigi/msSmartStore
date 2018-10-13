<?php
	$_force_session="true";

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
				<li><a href="index.php">Home</a></li>
				<li class="active">My Account</li>
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
					<div class="col-md-12">
                    	<a href="my-profile-edit.php" class="primary-btn">Edit Profile</a>
                    	<a href="change-password.php" class="primary-btn">Change Password</a>
                    	<a href="my-wishlist.php" class="primary-btn">My Wishlist</a>                        
                        <div class="clearfix"></div>
                        <hr>
					</div>
					<div class="col-md-6">                    
						<div class="billing-details">

                            <?php
							if(isset($_GET['update']) && $_GET['update']=="true")
							{
							?>
                            <div style="padding:5px; background-color:#090; color:#FFF">
                            Changes saved successfully!
                            </div>
                            <?php
							}
							?>

                            <?php
							if(isset($_GET['update']) && $_GET['update']=="false")
							{
							?>
                            <div style="padding:5px; background-color:#FB4011; color:#FFF">
                            Changes failed!
                            </div>
                            <?php
							}
							?>

                        	<?php
							$member=getMember($_member_id);
							?>
							<div class="section-title">
								<h3 class="title">My Profile</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="firstname" value="<?php echo $member['member_fname'] ?>" readonly placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="lastname" value="<?php echo $member['member_lname'] ?>" readonly placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="tel" readonly value="<?php echo $member['member_contact'] ?>" placeholder="Mobile Number">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" value="<?php echo $member['member_email'] ?>" readonly placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" value="<?php echo $member['member_address'] ?>" readonly placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" value="<?php echo $member['member_city'] ?>" readonly placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" value="<?php echo $member['member_pincode'] ?>" readonly placeholder="PIN Code">
							</div>
						</div>
					</div>
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

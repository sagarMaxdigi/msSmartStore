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
				<li><a href="my-account.php">My Account</a></li>
				<li class="active">Edit Profile</li>
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
				<form action="update-profile.php" method="post"  class="clearfix">
					<div class="col-md-6">                    
						<div class="billing-details">
                        	<?php
							$member=getMember($_member_id);
							?>
							
							<div class="section-title">
								<h3 class="title">Edit Profile</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="firstname" value="<?php echo $member['member_fname'] ?>" required placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="lastname" value="<?php echo $member['member_lname'] ?>" required placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="tel" readonly value="<?php echo $member['member_contact'] ?>" placeholder="Mobile Number">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" value="<?php echo $member['member_email'] ?>" required placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" value="<?php echo $member['member_address'] ?>" required placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" value="<?php echo $member['member_city'] ?>" required placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" value="<?php echo $member['member_pincode'] ?>" required placeholder="PIN Code">
							</div>
						</div>
					</div>

					<div class="col-md-12">
                        <input type="submit" class="primary-btn" value="Update Profile">
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

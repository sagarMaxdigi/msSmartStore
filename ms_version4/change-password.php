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
				<li class="active">Change Password</li>
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
				<form action="update-password.php" method="post"  class="clearfix">
					<div class="col-md-6">                    
						<div class="billing-details">

							<div class="section-title">
								<h3 class="title">Edit Profile</h3>
							</div>
							<div class="form-group">
								<input class="input" type="password" name="oldpass" required placeholder="Old Password">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="newpass" required placeholder="New Password">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="cnewpass" required placeholder="Confirm New Password">
							</div>
						</div>
					</div>

					<div class="col-md-12">
                        <input type="submit" class="primary-btn" value="Update Password">
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

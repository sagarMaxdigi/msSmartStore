	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            			<img src="./img/logo.jpg" alt="mssmart logo">
		          			</a>
						</div>
						<!-- /footer logo -->

						<p></p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a id="share-fb" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a id="tweet" href="#"><i class="fa fa-twitter"></i></a></li>
							<!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="my-account.php">My Account</a></li>
							<li><a href="my-wishlist.php">My Wishlist</a></li>
                            <?php
							if(!isset($_member_id))
							{
							?>                            
							<li><a href="login.php">Login</a></li>
                            <?php
							}
							?>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p></p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">

						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Website developed by <a href="http://bytessystem.com/" target="_blank">Bytes System</a>
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

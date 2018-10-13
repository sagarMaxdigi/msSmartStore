	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav <?php echo $show_on_click; ?>">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
                    	<?php
							$filter=array("status"=>"ACTIVE");
							$supercats=getAllSuperCategories($filter);
							
							foreach($supercats as $supercat)
							{
						?>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo $supercat['supercategory_name'] ?> <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
                                	<?php
										$filter=array("status"=>"ACTIVE","supercategory_id"=>$supercat['supercategory_id']);
										$categories=getAllCategories($filter);
										
										foreach($categories as $category)
										{
									?>
									<div class="col-md-4">
										<ul class="list-links">
											<li><h3 class="list-links-title"><?php echo $category['category_name'] ?></h3></li>
                                                <?php
													$filter=array("status"=>"ACTIVE","category_id"=>$category['category_id']);
													$subcategories=getAllSubCategories($filter);
													foreach($subcategories as $key => $subcategory)
													{
												?>
                                                		<a href="products.php?sbcat=<?php echo $subcategory['subcategory_id'] ?>" class="subcatbannerHover" value="<?php echo $subcategory['subcategory_banner'];?>" title="<?php echo $subcategory['subcategory_name'];?>" ><li><?php echo $subcategory['subcategory_name'] ?></li></a>
                                            	<?php
													}
												?>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
                                    <?php
										}
									?>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1 catBannerSec" href="#">
											<img src="./images/category/<?=$category['category_banner']?>" alt="" class="cateboryBannerImg">
											
											<div class="banner-caption text-center">
												<h2 class="white-color catBannerCaption"><?php echo $category['category_name']?></h2>
												<!-- <h3 class="white-color font-weak">HOT DEAL</h3> -->
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
                        <?php
							}
						?>
						<li><a href="<?=__base_url?>index.php">Todays Special</a></li>
						<li><a href="<?=__base_url?>index.php">View By Brands</a></li>
						<li><a href="<?=__base_url?>index.php">View By Offers</a></li>
						<li><a href="<?=__base_url?>location.php">Near by Stores</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?=__base_url?>index.php">Home</a></li>
						<li><a href="<?=__base_url?>my-account.php">My Account</a></li>
						<li><a href="<?=__base_url?>location.php">Visit Store</a></li>
						<?php /*?><li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="./img/banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner06.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Women’s</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner07.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Men’s</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner08.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Accessories</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="./img/banner09.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Bags</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
											<li><a href="#">Women’s Clothing</a></li>
											<li><a href="#">Men’s Clothing</a></li>
											<li><a href="#">Phones & Accessories</a></li>
											<li><a href="#">Jewelry & Watches</a></li>
											<li><a href="#">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Sales</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li><?php */?>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->


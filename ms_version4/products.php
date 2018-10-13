<?php
	//include_once("checksession.php");
	include_once("head.php");
?>

<body>
	<?php
        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");
        $subcategory=getSubCategory($_GET['sbcat']);
    ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?=__base_url?>">Home</a></li>
				
				<li><a href="#"><?=$subcategory['subcategory_name']?></a></li>
				
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
				<!-- ASIDE -->
				<?php /*?><div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Shop by:</h3>
						<ul class="filter-list">
							<li><span class="text-uppercase">color:</span></li>
							<li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
							<li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
							<li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
							<li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Size:</span></li>
							<li><a href="#">X</a></li>
							<li><a href="#">XL</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Price:</span></li>
							<li><a href="#">MIN: $20.00</a></li>
							<li><a href="#">MAX: $120.00</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Gender:</span></li>
							<li><a href="#">Men</a></li>
						</ul>

						<button class="primary-btn">Clear All</button>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Price</h3>
						<div id="price-slider"></div>
					</div>
					<!-- aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Color:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">S</a></li>
							<li class="active"><a href="#">XL</a></li>
							<li><a href="#">SL</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Brand</h3>
						<ul class="list-links">
							<li><a href="#">Nike</a></li>
							<li><a href="#">Adidas</a></li>
							<li><a href="#">Polo</a></li>
							<li><a href="#">Lacost</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Gender</h3>
						<ul class="list-links">
							<li class="active"><a href="#">Men</a></li>
							<li><a href="#">Women</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top Rated Product</h3>
						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->

						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE --><?php */?>

				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<?php /*?><div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div><?php */?>
							<div class="sort-filter">
                                <form action="products.php" method="get">
                                <input type="hidden" name="sbcat" value="<?php echo $_GET['sbcat'] ?>">
								<span class="text-uppercase">Sort By:</span>
								<select class="input" name="sort">
                                    <option value="">Position</option>
                                    <option value="priceminmax">Price - Min to Max</option>
                                    <option value="pricemaxmin">Price - Max to Min</option>
                                    <?php /*?><option value="ratingminmax">Rating - Min to Max</option>
                                    <option value="ratingmaxmin">Rating - Max to Min</option><?php */?>
                                </select>
								<input type="submit" class="main-btn icon-btn" value="GO">
                                </form>
							</div>
						</div>
						<?php /*?><div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
                                </select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div><?php */?>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<?php
								extract($_GET);
								
                                $filter=array();

								if(isset($spcat) && $spcat!="")
									$filter['super_category']=$spcat;

								if(isset($cat) && $cat!="")
									$filter['category_id']=$cat;

								if(isset($sbcat) && $sbcat!="")
									$filter['subcategory_id']=$sbcat;
																		
								if(isset($sort) && $sort!="")
									$filter['sort']=$sort;
								
                                $products=getAllProducts($filter);
                                // echo '<pre>';
                                // print_r($products);
                                if($products){
                                for($i=0;$i<count($products);$i++)
                            	{	
                //                     $product=$products[$i];
                //                     $_product_id=$product['product_id'];

                //                     $singleproduct=getProduct($_product_id);
                                    

                //                     if($singleproduct){
								        // foreach ($singleproduct as $key => $value) {
								    		?>
								    		<div class="col-md-3 col-sm-6 col-xs-6">
									    		<div class="product product-single">

									    			<div class="row">
									    				<div class="product-label">
									    					<?php
									    					if($products[$i]['is_new']=="TRUE")
									    					{
									    						?>
									    						<span>New</span>
									    						<?php
									    					}
									    					?>
									    					<?php
									    					if($products[$i]['product_discount']>0)
									    					{
									    						?>
									    						<span class="sale"><?php echo $products[$i]['product_discount']; ?>% off</span>
									    						<?php
									    					}
									    					?>
									    				</div>

									    			</div>
									    			<a href="product.php?pid=<?php echo $products[$i]['product_id']; ?>&prdct_name=<?=$products[$i]['product_name']?>&colorID=<?=$products[$i]['colorID'];?>">    
									    				<div class="product-thumb">
									    					<?php if($products[$i]['image']){
									    						$image = explode(',', $products[$i]['image']);
									    						?>
									    						<img src="<?php echo __base_url.'product_images/'.$image[0];?>" height="300" alt="">
									    						<?php
									    					}else{
									    						?>
									    						<img src="<?php echo __base_url.'img/logo.jpg';?>" height="300" alt="">
									    						<?php
									    					}?>

									    				</div>
									    			</a>
									    			<div class="product-body">
									    				<a href="product.php?pid=<?php echo $products[$i]['product_id'] ?>">        
									    					<h3 class="product-price">&#8377; <?php echo $products[$i]['product_minimum_price'] ?>/- <del class="product-old-price">&#8377; <?php echo $products[$i]['product_mrp'] ?>/-</del></h3>

									    					<h2 class="product-name"><?php echo $products[$i]['product_name'].' in '.$products[$i]['color']; ?></h2>
									    					<!-- </a> -->
									    					<?php
									    					if(isset($_member_id) && $_member_id!="")
									    					{
									    						if(isMemberFavrite($_member_id,$products[$i]['product_id']))
									    						{
									    							?>
									    							<div class="product-btns">
									    								<button class="main-btn main-btn-active icon-btn" title="This is available in your wishlist"><i class="fa fa-heart"></i></button>
									    							</div>
									    							<?php
									    						}
									    						else
									    						{
									    							?>
									    							<div class="product-btns">
									    								<button class="main-btn icon-btn heartbutton"><i class="fa fa-heart"></i></button>
									    							</div>
									    							<?php
									    						}
									    					}
									    					else
									    					{
									    						?>
									    						<div class="product-btns">
									    							<a class="main-btn icon-btn" href="login.php"><i class="fa fa-heart"></i></a>
									    						</div>
									    						<?php
									    					}
									    					?>
									    				</a>
									    			</div>    
									    		</div>
									    	</div>
								    		<?php
								    //     }
							    	// }
                            ?>
                            <?php
                                }
                             }
                            ?>	
                               
                                
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

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
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
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
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
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
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>

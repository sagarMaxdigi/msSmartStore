<?php
	global $images;
	include_once("head.php");
?>
<body>
	<?php
        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");
		
		extract($_GET);

		$product=getProduct($pid);
		
		foreach ($product as $k => $val) {
			if($val['colorID']==$_GET['colorID']){
				$colorArrID = $k;
			}
		}
		if(!isset($_SESSION['recent_products']))
		{
			$_SESSION['recent_products']=array($colorID);
		}
		else{
				if(!in_array($colorID, $_SESSION['recent_products'])){
					$_SESSION['recent_products'][]=$colorID;	
				}
			}
		// }
			

			


		if(isset($_member_id) && $_member_id != '')
		{
			$_wish_data = isMemberFavrite($_member_id,$product[$colorArrID]['product_id']);
		}

		$filter=array("product_id"=>$product[$colorArrID]['product_id']);
		$reviews=getAllProductReviews($filter);


		
		//$reviews=getAllProductReviews();
		
		$subcategory=getSubCategory($product[$colorArrID]['product_category']);
	 
	?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?=__base_url?>">Home</a></li>
				<li><a href="<?=__base_url?>products.php?sbcat=<?=$subcategory['subcategory_id']?>"><?=$subcategory['subcategory_name']?></a></li>
				<li class="active"><?php echo $product[$colorArrID]['product_name'].' in '.$product[$colorArrID]['color'] ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
                        	
                        		<?php if($product[$colorArrID]['image']){
                        			$images = $product[$colorArrID]['image'];
						            $image = explode(',', $product[$colorArrID]['image']);
						            foreach ($image as $key => $value) {
						         ?>
						         <div class="product-view">
								<img src="<?php echo __base_url.'product_images/'.$value;?>" alt="">
							</div>
						         
						         <?php
							            }
							        }
						            ?>
							        
						         								
							
						</div>
						<div id="product-view">
                        	<?php if($product[$colorArrID]['image']){
						            $image = explode(',', $product[$colorArrID]['image']);
						           
						            foreach ($image as $key => $value) {
						         ?>
						         <div class="product-view">
						         <img src="<?php echo __base_url.'product_images/'.$value;?>" alt="">
						     </div>
						         <?php
							            }
							        }
						            ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<!-- <div class="col-md-6"> -->
								<div class="product-label">

									<?php
	                                if($product[$colorArrID]['is_new']=="TRUE")
	                                {
	                                ?>
	                                <span>New</span>
	                                <?php
	                                }
	                                ?>
	                                <?php
	                                if($product[$colorArrID]['product_discount']>0)
	                                {
	                                ?>
	                                <span class="sale"><?php echo $product[$colorArrID]['product_discount'] ?>% off</span>
	                                <?php
	                                }
	                                ?>
								</div>

								<h2 class="product-name"><?php echo $product[$colorArrID]['product_name'].' in '.$product[$colorArrID]['color'] ?></h2>
								<h3 class="product-price">&#8377; <?php echo $product[$colorArrID]['product_minimum_price'] ?>/- <del class="product-old-price">&#8377; <?php echo $product[$colorArrID]['product_mrp'] ?>/-</del></h3>
								<?php
								$tle_rating = 0;
								if(count($reviews)>0)
								{
									foreach($reviews as $review)
									{
										$tle_rating = $tle_rating+$review['review_rating'];
									}
									$avg = round($tle_rating/count($reviews),1);
									$lim = round($avg, 0, PHP_ROUND_HALF_DOWN);
								}
								else
								{
									$avg=$lim=0;
								}
									
								?>		
									
										<div class="row">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="product-rating">
													<?php
														for ($i=0; $i < 5; $i++) { 
															if($lim > $i)
															{
																$star = 'fa-star';
															}
															else
															{
																$star = 'fa-star-o empty';
															}
													?>
															<i class="fa <?=$star?>"></i>
													<?php
														}
													?>
													
												</div>
												<?=$avg?>
												<p>
													<a class="text-info"><?php echo '(&nbsp;'.count($reviews); ?> Customer Rating&nbsp;)</a>
												</p>


												<p><strong>Product Code:</strong> <?php echo $product[$colorArrID]['product_code'] ?></p> 

												<p><strong>Brand:</strong> <?php 
												if($product[$colorArrID]['product_brand']>0)
												{
													$brand=getBrand($product[$colorArrID]['product_brand']);
													echo $brand['brand_name'];
												}
												else
													echo "Standard";
												?></p>

											<!-- <div class="col-md-6 col-xs-12 col-sm-12">
												sdlfks l;sdfk sfskfs;lfksfskf
											</div> -->
											<p><strong>Highlights:</strong><br/><?php echo $product[$colorArrID]['product_highlights'] ?></p>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="row">
		                                    	<?php
												if(count($reviews)>0)
												{
												?>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<!-- <div class="product-reviews">
		                                            	<?php
														foreach($reviews as $review)
														{
															$member=getMember($review['review_member_id']);
														?>
														
		                                                <?php
														}
														?>												
													</div> -->
												</div>
		                                        <?php
												}
												else
												{											
												?>
		                                        <div class="col-md-12 col-sm-12 col-xs-12">
		                                        	<p class="text-danger"> No Rating Received For This Product</p><br>
		                                        </div>
		                                        <?php
												}
												?>
		                                        <?php
												if(isset($_member_id) && $_member_id!="")
												{
												?>
												<div class="col-md-6" id="review_form">
		                                        	<div class="review-form">
													
													                       	
		                                            <input type="hidden" id="product_id" name="product_id" value="<?php echo $product[$colorArrID]['product_id'] ?>">
		                                            
		                                            <div class="form-group">
		                                                <div class="input-rating">
		                                                    <strong class="text-uppercase">Your Rating: </strong>
		                                                    <div class="stars">
		                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
		                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
		                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
		                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
		                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <button id="savereview" class="primary-btn btn btn-sm">Submit</button>
		                                            </div>
												</div>
		                                        <?php
												}
												else
												{
												?>
		                                        <div class="col-md-12 col-sm-12 col-xs-12">
		                                        	<a href="login.php">Click here for Rating</a>
		                                        </div>
		                                        <?php
												}
												?>
											</div>
											</div>
										</div>
									
									
								
									
								
															
								                          
								
							<div class="product-options">
								<ul class="color-option size-option">
									<li><span class="text-uppercase">Color:</span></li>
									
                                    <?php
									foreach($product as $color)
									{

										if($color['color']=="")
											continue;

									?>

									<li><a id="color" href="product.php?pid=<?php echo $color['product_id'] ?>&prdct_name=<?=$color['product_name']?>&colorID=<?=$color['colorID'];?>" class="<?php if($wish_data['wishlist_color'] == $color['color']){ echo 'main-btn-active'; } ?>" style="background-color:<?php echo $color['color'] ?>; border-color: black;"></a></li>
                                    <?php
									}
									?>
								</ul>
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
                                    <?php 
                                    	if(isset($_member_id) && $_member_id!="")
                                		{
                                    		$wish_data = isMemberFavrite($_member_id,$product[$colorArrID]['product_id']);
											$sizes=explode(",",$product[$colorArrID]['size']);
											foreach($sizes as $size)
											{
												if($size=="")
													continue;
									?>
												<li><a id="size" class="<?php if($wish_data['wishlist_size'] == $size){ echo 'main-btn-active'; } ?>" size_n="<?php echo $size ?>"><?php echo $size ?></a></li>
                                    <?php
											}
										}
										else
										{
											$sizes=explode(",",$product[$colorArrID]['size']);
											foreach($sizes as $size)
											{
												if($size=="")
													continue;
									?>
												<li><a id="size" class="<?php if($wish_data['wishlist_size'] == $size){ echo 'main-btn-active'; } ?>" size_n="<?php echo $size ?>"><?php echo $size ?></a></li>
                                    <?php
											}	
										}
									?>
								</ul>
								
								
								<ul class="color-option size-option">
   									<span class="text-uppercase">Store:&nbsp;</span>
									<select id="wishlist_store" class="form" name="wishlist_store">
                                    	
                                    <?php
										$filter = array("product_id" => $product[$colorArrID]['product_id']);
										$storelist = getProductMapping($filter);
										if(!empty($storelist))
										{
									?>
											<option value="">Select Store</option>
									<?php
											foreach($storelist as $storemap)
					                    	{
					          				 if(isset($_wish_data))
					          				 {

					          				  if($_wish_data['wishlist_store_id']==$store['store_id'])
					          				  {
					          				  	$selected ='selected';
					          				  }
					          				  else
					          				  {
					          				  	$selected = 'notone';
					          				  }
					          				 }
					          				 else
					          				 {
					          				 	$selected = 'nowtwo';
					          				 }


												$_store_id=$storemap['mapping_store_id'];
												$store=getStore($_store_id);
												
									?>
                                    			<option <?=$selected?> value="<?=$store['store_id'] ?>"><?=$selected?>&nbsp;(<?=$store['city_name']?>)</option><!-- <option <?=$selected?> value="<?=$store['store_id'] ?>"><?=$store['store_name']?>&nbsp;(<?=$store['city_name']?>)</option> -->
                                    <?php 
                                    			
                                			}
                                		}
                                		else
                                		{
                                	?>	
                                				<option value="">Store Not Available</option>
                                	<?php
                                		}
                                	?>
                                </select>
                               	</ul>
							</div>

							<div class="product-btns">
								<div class="pull-right">
								<button class="primary-btn"><i class="fa fa-question"></i> How to buy</button>
                                </div>
							</div>
                            <div class="clearfix"></div>

							<div class="product-btns">
								<div class="pull-left">
                                <?php
                                if(isset($_member_id) && $_member_id!="")
                                {
                                    if($wish_data = isMemberFavrite($_member_id,$product[$colorArrID]['product_id']))
                                    {
                                    ?>
                                <div class="product-btns">
                                    <button class="main-btn main-btn-active icon-btn heartbutton" product_id="<?php echo $product[$colorArrID]['product_id'] ?>" title="This is available in your wishlist"><i class="fa fa-heart"></i></button>
                                </div>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <div class="product-btns">
                                    <button title="Add to Wishlist" class="main-btn icon-btn heartbutton" product_id="<?php echo $product[$colorArrID]['product_id'] ?>"><i class="fa fa-heart"></i></button>
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
                                </div>
                                <div class="pull-left">&nbsp;
                                </div>

                                
								<div class="pull-left">
									
									<!-- <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button> -->
									<!-- social widget -->
									<div class="col-md-12 col-sm-6 col-xs-12">
										
											<ul class="footer-social">
												<li><a title="Share on Facebook" id="share-fb" target="_blank" class="main-btn icon-btn" href="#"><i class="fa fa-facebook"></i></a></li>

												<li><a title="Share on Twitter" id="tweet" class="main-btn icon-btn" href="#"><i class="fa fa-twitter"></i></a></li>
												
											</ul>
											<!-- /footer social -->
										
									</div>
									<!-- /social widget -->

								</div>
								<div class="clearfix"></div>
								<div class="pull-left">
									<div id="favMsg">
				                    </div>
								</div>
							</div>
						</div>
					</div>
					
					
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Available at Stores</h2>
					</div>
				</div>
				<!-- section title -->

                <?php
					$filter = array("product_id" => $product[$colorArrID]['product_id']);
					$storelist = getProductMapping($filter);
					
					if(!empty($storelist))
					{


					//$store=getStore($sid);

					$StoreFilter=array("store_id"=>$storelist[0]['mapping_store_id']);
					$StoreReviews=getAllStoreReviews($StoreFilter);
					//$query['zip'];

                    foreach($storelist as $storemap)
                    {
          
						$_store_id=$storemap['mapping_store_id'];
                ?>
                <div class="col-md-4 col-sm-6 col-xs-6">                
                <?php
					//print_r($store);    
					//echo $store['store_name'];
					include("singlestore.php");
                ?>                
                </div>                
                <?php
                    }
                   }
                   else
                   {
                ?>
                		<p class="text-danger">Not available in store</p>
                <?php
                   }
                ?>

            </div>
            <!-- row -->
        </div>
	    <!-- container -->
	</div>
	<!-- section -->

	<?php
	global $color;
    $color = $product[$colorArrID]['color'];
 	if($product[0]['color']!="")
	{
    ?>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Similar Products</h2>
					</div>
				</div>
				<!-- section title -->

               <?php 
               foreach ($product as $k => $value) {
               	if($value['colorID']!=$_GET['colorID']){


               	?>

                <div class="col-md-3 col-sm-6 col-xs-6">                
               <!-- =======================              -->
               <div class="product product-single">
    <div class="product-top">
        <div class="product-label">
            <?php
            if($value['is_new']=="TRUE")
            {
            ?>
            <span>New</span>
            <?php
            }
            ?>
            <?php
            if($value['product_discount']>0)
            {
            ?>
            <span class="sale"><?php echo $value['product_discount'] ?>% off</span>
            <?php
            }
            ?>
        </div>
        <?php /*?><ul class="product-countdown">
            <li><span>00 H</span></li>
            <li><span>00 M</span></li>
            <li><span>00 S</span></li>
        </ul>
        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button><?php */
        ?>
    </div>
    <a href="product.php?pid=<?php echo $value['product_id'] ?>&prdct_name=<?=$value['product_name']?>&colorID=<?=$value['colorID'];?>">    
    <div class="product-thumb">
        <?php if($value['image']){
            $image = explode(',', $value['image']);
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
        <a href="product.php?pid=<?php echo $value['product_id'] ?>">        
        <h3 class="product-price">&#8377; <?php echo $value['product_minimum_price'] ?>/- <del class="product-old-price">&#8377; <?php echo $value['product_mrp'] ?>/-</del></h3>
      
        <h2 class="product-name"><?php echo $value['product_name'].' in '.$value['color']; ?></h2>
        <!-- </a> -->
        <?php
        if(isset($_member_id) && $_member_id!="")
        {
            if(isMemberFavrite($_member_id,$value['product_id']))
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
               <!-- =======================              -->
                </div>                
               <?php
               }
           }
               ?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <?php
	}
	?>
    
    
    <?php
	if(count($_SESSION['recent_products'])>0)
	{
    ?>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Recently Viewed</h2>
					</div>
				</div>
				<!-- section title -->

                

                <?php
                // echo 'session : ';
                // print_r($_SESSION['recent_products']);

                    $filter=array("pids"=>$_SESSION['recent_products']);
                    
                    $products=getAllProducts($filter);
                    // echo 'recent : <pre>';
                    // print_r($products);
                    if($products){


                    // shuffle($products);
                    for($i=0;$i<count($products) && $i<12;$i++)
                    {
                        $product=$products[$i];
                        $_product_id=$product['product_id'];
                ?>
                		<div class="col-md-3 col-sm-6 col-xs-6">
                			
                			<!-- --------single produce start -->
                			<div class="product product-single">
							    <div class="row">
							        <div class="product-label">
							            <?php
							            if($product['is_new']=="TRUE")
							            {
							            ?>
							            <span>New</span>
							            <?php
							            }
							            ?>
							            <?php
							            if($product['product_discount']>0)
							            {
							            ?>
							            <span class="sale"><?php echo $product['product_discount']; ?>% off</span>
							            <?php
							            }
							            ?>
							        </div>
							        
							    </div>
							    <a href="product.php?pid=<?php echo $product['product_id'] ?>&prdct_name=<?=$product['product_name']?>&colorID=<?=$product['colorID'];?>">    
							    <div class="product-thumb">
							        <?php if($product['image']){
							            $image = explode(',', $product['image']);
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
							        <a href="product.php?pid=<?php echo $product['product_id'] ?>">        
							        <h3 class="product-price">&#8377; <?php echo $product['product_minimum_price'] ?>/- <del class="product-old-price">&#8377; <?php echo $product['product_mrp'] ?>/-</del></h3>
							        
							        <h2 class="product-name"><?php echo $product['product_name'].' in '.$product['color']; ?></h2>
							        <!-- </a> -->
							        <?php
							        if(isset($_member_id) && $_member_id!="")
							        {
							            if(isMemberFavrite($_member_id,$product['product_id']))
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
                			<!-- --------single produce end -->

                			
                		</div>
                <?php
                    }
                   }
                ?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <?php

	}
	

	if(isset($_wish_data['wishlist_size']) && $_wish_data['wishlist_size'] != '')
	{
		$size =$_wish_data['wishlist_size'];
		$color=$_wish_data['wishlist_color'];
		$store=$_wish_data['wishlist_store_id'];	
		
	}
	else
	{
		$size ="";
		$store ="";
		//$color=$product[$colorArrID]['color'];	
		
	}

	include_once("footer.php");
	include_once("js.php");
?>
<script type="text/javascript">

	
	
		var size ="<?=$size?>";
		var color="<?=$color?>";	
		var images="<?=$images?>";	
		var store ="<?=$store?>";
		console.log(' size:'+size+', color:'+color,'Images:'+images+', store:'+store);
	


	var img = "<?=$product['product_img1']?>";

	$('#tweet').click(function() {
      try 
      {
        
        $.ajax({
          url: '<?=__base_url?>tw-share.php',
          type: 'post',
          data: {img:img,types:'shareTw'},
          success: function(res)
          {
            //var obj = JSON.parse(res)
            
            //console.log(obj.msg);
            var link = res.replace(/['"]+/g, '');
            console.log(link);
            window.open(link, '_blank');
            
           
          }

        });
      }
      catch(e)
      {
        console.log('catch1 : '+e);
      }

    });


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '329411374300021',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.1'
    });
      
    FB.AppEvents.logPageView();   
      
  };


  
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

       $('#share-fb').click(function () {
        
        try {
              console.log('https://mssmartstore.com/'+img);
              FB.ui({
                  method: 'share_open_graph',
                  action_type: 'og.shares',
                  action_properties: JSON.stringify({
                      object : {
                         'og:url': 'https://mssmartstore.com/',
                         'og:title': "MS Smart Store is an Online Shopping website, Saree, Panjabi dress, Shirts, T-Shirts, Jeans, Kid wear, Man wear, Woman Wear.",
                         'og:description': "MS Smart Store is an Online Shopping website, Saree, Panjabi dress &amp; Shirts, T-Shirts, Jeans, Kid wear, Man wear, Woman Wear. All brands, Low prices, Offer on festivals.",
                         'og:og:image:width': '2560',
                         'og:image:height': '2560',
                         'og:image': 'https://mssmartstore.com/'+img
                      }
                  })
              });
            
         

   
        } catch (e) {
            console.log('catch1 : '+e);
        }
    });



</script>
</body>
</html>

<?php
	include_once("head.php");
	include_once("system/connection.php");
?>
<body>
	<?php
        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");
		
		extract($_GET);
		if(isset($ref_id) && isset($prdt))
		{
		/*Array
		(
		    [sid] => 3
		    [ref_id] => 20
		    [prdt] => 258
		)*/
			$isQry = "select * from customer_enquiry where member_id=$ref_id and customer_product_id=$prdt and customer_store_id=$sid";
			$fireQry = mysqli_query($con,$isQry);

			if(mysqli_num_rows($fireQry)>0)
			{
					
			}
			else
			{
				$customer_name = $_SESSION['member_fname'].' '.$_SESSION['member_lname'];
				$q = "insert into customer_enquiry(`member_id`,`customer_name`,`customer_email`,`customer_contact`,`customer_product_id`,`customer_store_id`,`customer_ondate`) values(".$ref_id.",'".$customer_name."','".$_SESSION['member_email']."','',".$prdt.",".$sid.",NOW())";
				mysqli_query($con,$q);
			}

			

		}
		$store=getStore($sid);
		$filter=array("store_id"=>$store['store_id']);
		$reviews=getAllStoreReviews($filter);
	?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active"><?php echo $store['store_name'] ?></li>
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
				<div class="store store-details clearfix">
					<div class="col-md-12">
                    	<img src="store_images/nzqskjs8.jpg" width="100%">
                        
                        <hr>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="store-body">
							<h2 class="store-name"><?php echo $store['store_name'] ?></h2>
							<?php
								$tle_rating = 0;
								if(count($reviews)>0)
								{
									foreach($reviews as $review)
									{
										$tle_rating = $tle_rating+$review;
									}
									$avg = round($tle_rating/count($reviews),1);
									$lim = round($avg, 0, PHP_ROUND_HALF_DOWN);
								}
								else
								{
									$avg=$lim=0;
								}
									
							?>	
							<div>
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
									echo '&nbsp;'.$avg;
									?>
								</div>

								<p>
									<a class="text-info"><?php echo '(&nbsp;'.count($reviews); ?> Customer Rating&nbsp;)</a>
								</p>
							</div>

                            <div class="store-contact">
                                <?php 
                                if($store['store_contact1']!="")
                                {
                                    echo $store['store_contact1'];
                                    
                                    if($store['store_contact2']!="")
                                        echo " / ";
                                }
                                
                                if($store['store_contact2']!="")
                                {
                                    echo $store['store_contact2'];
                                }
                                ?>
                            </div>
                            
                            <div class="store-address">
                                <?php 
                                if($store['store_address1']!="")
                                    echo $store['store_address1'].",";
                    
                                if($store['store_address2']!="")
                                    echo $store['store_address2'].",";
                    
                                if($store['store_address3']!="")
                                    echo $store['store_address3'].",";

								$city = getCity($store['store_city']);
	
                                echo "<br>".$city['city_name'];
                                ?>
                            </div>
                            
                            <div class="store-map-button">
                            <a href="<?php echo $store['store_location_url']  ?>" target="_blank"><strong>View Map</strong></a>
                            </div>

						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12" id="store_review_form">
                    	<div class="review-form">
						
						                       	
                        <input type="hidden" id="store_id" name="store_id" value="<?php echo $store['store_id'] ?>">
                        
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
                        <button id="StoreSaveReview" class="primary-btn btn btn-sm">Submit</button>
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
						<h2 class="title">Store Products</h2>
					</div>
				</div>
				<div class="col-md-12">
                <?php
					extract($_GET);
				?>
                    <div class="sort-filter">
                        <form action="store.php" method="get">
                        <input type="hidden" name="sid" value="<?php echo $sid ?>">
                        <span class="text-uppercase">Filter By</span>
                        <?php /*?><select class="input" name="supercat">
                            <option value="">All</option>                            
                        	<?php
							$supercats=getAllSuperCategories();
							
							foreach($supercats as $supercat)
							{
							?>
                            	<optgroup label="<?php echo $supercat['supercategory_name'] ?>">
                            <?php
								$filter=array("supercategory_id"=>$supercat['supercategory_id']);
								$categories=getAllCategories($filter);
								
								foreach($categories as $category)
								{
							?>
                            	<option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                            <?php
								}
							?>
                            	</optgroup>
                            <?php
							}
							?>
                        </select><?php */?>
                        <select class="input" name="subcat_id">
                            <option value="">All</option>                            
                        	<?php
							$subcats=getAllSubCategories();
							
							foreach($subcats as $subcat)
							{
							?>
                            	<option value="<?php echo $subcat['subcategory_id'] ?>"><?php echo $subcat['subcategory_name'] ?></option>
                            <?php
							}
							?>
                        </select>
                        <input type="submit" class="main-btn icon-btn" value="GO">
                        </form>
                    </div>
                    <hr>
				</div>
				<!-- section title -->

                <?php
                    $filter=array("store_id"=>$_GET['sid']);
					
					if(isset($subcat_id) && $subcat_id!="")
					{
						$filter['subcategory_id']=$subcat_id;
					}
                    //$products=getProductMapping($filter);
					$products=getAllProducts($filter);
					//shuffle($products);
					
					//echo count($products);
					if($products)
					{

                    	for($i=0;$i<count($products) && $i<24;$i++)
                    	{
                        	$product=$products[$i];
                        	$_product_id=$product['product_id'];
                ?>
                			<div class="col-md-3 col-sm-6 col-xs-6">                
                <?php
								include("singleproduct.php");
                ?>                
                			</div>                
                <?php
                    	}
                    }
                    else
                    {
                ?>
                		<p><h2 class="text-danger text-uppercase" >Not found</h2></p>
                <?php
                    }
                ?>

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

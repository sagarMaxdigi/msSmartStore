<?php
	//include_once("checksession.php");
	include_once("head.php");
?>
<body>
	<?php
        include_once("top-header.php");
		$show_on_click="";
        include_once("navigation.php");
    ?>
	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					
					<?php
					$mainSlider=mainSlider();
	                foreach($mainSlider as $val){
                	?>
                		<div class="banner banner-1 main-slider">
							<img src="<?=__base_url?>images/mainSliders/<?php echo $val['mainslider_image']?>" alt="">
						</div>
                	<?php
	                }
					?>
					
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->
				
				<!-- Product Slick -->
				<!-- <div class="col-md-9 col-sm-6 col-xs-6"> -->
				<div class="col-md-12 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
                        <?php
							$filter=array("special"=>"true");
							$products=getAllProductsShow($filter);
							// echo '<pre>';
							// print_r($products);
							for($i=0;$i<count($products);$i++)
							{
								$product=$products[$i];
								$_product_id=$product['product_id'];
									include("singleproduct.php");
								// $i++;
								
								if($i>8)
									break;								
							}
						?>
							
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Best offers</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Slick -->
				<div class="col-md-12 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick ">
                        <?php

							for(;$i<count($products);$i++)
							{
								$product=$products[$i];
								$_product_id=$product['product_id'];
								include("singleproduct.php");
								$i++;
							}
						?>
							
						</div>
					</div>
				</div>
				<!-- /Product Slick -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<?php
                $filter=array("status"=>"ACTIVE");
                $banner=getAllBanner($filter);
                
                foreach($banner as $row_banner);
                //  print_r($row_banner); die;
                
            ?>
			            <!-- row -->
            <?php
                            $filter=array("status"=>"ACTIVE");
                            $banner=getAllBanner($filter);
                            
                            //foreach($banner as $row_banner);
                            //  print_r($row_banner); die;
                            
                        ?>
            <div class="row">
            <?php $superbanner3=getSupperBanner1($filter); 
            if($superbanner3){?>

                <!-- banner -->
                <div class="col-md-4 adv-banner">
                <?php
                    $filter=array("status"=>"ACTIVE","category_id"=>$category['category_id']);
                    $subcategories=getAllSubCategories_banner1($filter);
                    
                    foreach($subcategories as $subcategory)
                    {
                ?>
                <a href="products.php?sbcat=<?php echo $subcategory['subcategory_id'] ?>">
                    <div class="banner banner-1">
                        <img src="./images/supperbanner/<?php echo $superbanner3['superbanner_image'];?>" alt="">
                       <!--  <div class="banner-caption text-center">
                            <h1 class="primary-color"><?=$superbanner3['superbanner_name']?></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div> -->
                    </div>
                    </a>
                    <?php } ?>
                </div>
            <?php }?>
                <!-- /banner -->

                <?php $superbanner2=getSupperBanner2($filter); 
                if($superbanner2){ ?>
                <!-- banner -->
                <div class="col-md-4 adv-banner col-sm-4">
                <?php
                    $filter=array("status"=>"ACTIVE","category_id"=>$category['category_id']);
                    $subcategories=getAllSubCategories_banner2($filter);
                    
                    foreach($subcategories as $subcategory)
                    {
                ?>
                    <a class="banner banner-1" href="products.php?sbcat=<?php echo $subcategory['subcategory_id'] ?>">
                        <img src="./images/supperbanner/<?php echo $superbanner2['superbanner_image'];?>" alt="">
                       
                    </a>
                    <?php } ?>
                </div>
            <?php }?>
                <!-- /banner -->

                <?php $superbanner3=getSupperBanner3($filter); 
                if($superbanner3){?>
                <!-- banner -->
                <div class="col-md-4 adv-banner col-sm-4">
                <?php
                    $filter=array("status"=>"ACTIVE","category_id"=>$category['category_id']);
                    $subcategories=getAllSubCategories_banner3($filter);
                    foreach($subcategories as $subcategory)
                    {
              	  ?>
                    <a class="banner banner-1" href="products.php?sbcat=<?php echo $subcategory['subcategory_id'] ?>">
                        <img src="./images/supperbanner/<?php echo $superbanner3['superbanner_image'];?>" alt="">
                        
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <!-- /banner -->
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
				<div class="col-md-12 col-xs-12 col-sm-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<div class="col-md-12 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">

                <?php
                    $filter=array("is_new"=>"TRUE");
                    $products=getAllProductsShow($filter);
                    // echo ' llllllllllll <pre>';
                    // print_r($products);
					shuffle($products);
					
                    for($i=0;$i<count($products) && $i<16;$i++)
                    {
                        $product=$products[$i];
                        $_product_id=$product['product_id'];
                    ?>
                	
               			          
                <?php
						//include("singleproduct.php");
                ?>                
                	<!-- start latest product div -->
                	<?php 
                		$singleproduct=getProduct($_product_id);
                		if($singleproduct){
					        foreach ($singleproduct as $key => $value) {
					        	?>
					        	<div class="col-md-3 col-sm-3 col-xs-3">                
					        		<!-- Product Single -->
					        		<div class="product product-single">
    
    <div class="row">
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
            <span class="sale"><?php echo $value['product_discount']; ?>% off</span>
            <?php
            }
            ?>
        </div>
        
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
					        		<!-- /Product Single -->
					        	</div>  
					        	<?php	
					        }
					    }
                	?>
                	
                	<!-- end latest product div -->
                	               
                <?php
						
                    }
                ?>
			            </div>
			        </div>
			    </div>
			</div>
			<!-- /row -->

			

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
                   	$filter=array("pids"=>$_SESSION['recent_products']);
					
                    $products=getAllProductsShow($filter);
					
					shuffle($products);
					
                    for($i=0;$i<count($products) && $i<12;$i++)
                    {
                        $product=$products[$i];
                        $_product_id=$product['product_id'];

                        $singleproduct=getProduct($_product_id);
                         if($singleproduct){
				        foreach ($singleproduct as $key => $value) {
				        	?>
				        		<div class="col-md-3 col-sm-6 col-xs-6">
				        			<div class="product product-single">
    
    <div class="row">
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
            <span class="sale"><?php echo $value['product_discount']; ?>% off</span>
            <?php
            }
            ?>
        </div>
        
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
				        		</div>
				        	<?php
							}
						}
                ?>
                	               
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
<!-- <script src="js/category.js"></script> -->
</body>

</html>
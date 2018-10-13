<?php
	$singleproduct=getProduct($_product_id);

?>
<!-- Product Single -->
<div class="product product-single">
    <div class="product-top">
        <div class="product-label">
        	
            <?php
			if($singleproduct['product_discount']>0)
			{
			?>
            <span class="sale"><?php echo $singleproduct['product_discount'] ?>% off</span>
            <?php
			}
			?>
        </div>
        <?php /*?><ul class="product-countdown">
            <li><span>00 H</span></li>
            <li><span>00 M</span></li>
            <li><span>00 S</span></li>
        </ul>
        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button><?php */?>
    </div>
    
    <div class="product-thumb">
        <img src="../../<?php echo $singleproduct['product_img1'] ?>" height="300" alt="">
    </div>
    
    <div class="product-body">
	           
        <h3 class="product-price">&#8377; <?php echo $singleproduct['product_minimum_price'] ?>/- <del class="product-old-price">&#8377; <?php echo $singleproduct['product_mrp'] ?>/-</del></h3>
        <?php /*?><div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div><?php */?>
        <h2 class="product-name"><?php echo $singleproduct['product_name'] ?></h2>
        
    
    </div>    
</div>
<!-- /Product Single -->
<?php
	unset($_product_id);
?>
<?php
    $singleproduct=getProduct($_product_id);

    // echo 'llllllllllll <pre>';
    // print_r($singleproduct);
    // die;
    if($singleproduct){
        foreach ($singleproduct as $key => $value) {

            ?>

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

            <?php
        }
    }
?>

<?php
    unset($_product_id);
?>
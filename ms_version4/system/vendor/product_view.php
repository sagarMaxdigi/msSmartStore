<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Product";
?>

<!DOCTYPE html>
<html>
  <?php
	  include("header.php");
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php
			include("navbar.php");
		?>
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
			include("vlinks.php");
		?>
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Products
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
          </ol>
        </section>
        <!-- Main content -->
<?php
extract($_GET);
if(isset($product_id))
{
$products=getProduct($product_id);
$mapping=getMapping($product_id);
//print_r($products);
$category = getSubCategory($products['product_category']);   
//$color = getColor($products['product_color']);
//$size  = getSize($products['product_size']);   
//extract($product);
}
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="products.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Product Name</label>
                            	<input type="text" readonly value="<?php echo $products['product_name'] ?>" class="form-control" placeholder="Product Name" name="product_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Category</label>
                               <input type="text" readonly value="<?php echo $category['subcategory_name'] ?>" class="form-control" placeholder="Category Name" name="product_name">
                            </div>   
                            </div>  
                            <div class="clearfix"></div>
                            <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Size</label>
                                <input type="text" readonly value="<?php echo ucfirst($products['product_size']) ?>" class="form-control" placeholder="Size" >
                            </div>                            
                            <div class="form-group col-sm-6">
                                <label>Color</label>
                                <input type="text" readonly value="<?php echo $products['product_color'] ?>" class="form-control" placeholder="Product Color" name="product_color">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Sale Price</label>
                                <input type="text" readonly value="<?php echo $products['product_mrp'] ?>" class="form-control" placeholder="Product Price" name="product_price">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Price</label>
                                <input type="text" readonly value="<?php echo $mapping['mapping_product_offerprice'] ?>" class="form-control" placeholder="Product Price" name="product_price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Description</label>
                                <textarea type="text"  readonly class="form-control" placeholder="Description" name="product_desc"><?php echo $products['product_desc'] ?>
                                    </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Highlights</label>
                                <textarea type="text" readonly class="form-control" placeholder="Highlights" name="product_highlights"><?php echo $products['product_highlights'] ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <?php if(isset($products['product_img1']) && $products['product_img1'] != '' ) ?>
                            <div class="col-sm-2">
                                <img src="../product_images/<?php echo $products['product_img1'] ?>" width="100px">
                            </div>
                            <?php if(isset($products['product_img2']) && $products['product_img2'] != '') ?>
                            <div class="col-sm-2">
                                
                                <img src="../product_images/<?php echo $products['product_img2'] ?>" width="100px">
                            </div>
                            <?php if(isset($products['product_img3']) && $products['product_img3'] != '') ?>
                            <div class="col-sm-2">
                                
                                <img src="../product_images/<?php echo $products['product_img3'] ?>" width="100px">
                            </div>
                            <?php if(isset($products['product_img4']) && $products['product_img4'] != '') ?>
                            <div class="col-sm-2">
                                
                                <img src="../product_images/<?php echo $products['product_img4'] ?>" width="100px">
                            </div>
                            <?php if(isset($products['product_img5']) && $products['product_img5'] != '') ?>
                            <div class="col-sm-2">
                                
                                <img src="../product_images/<?php echo $products['product_img5'] ?>" width="100px">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
				</div>
			</div>
		</section>
        
      </div><!-- /.content-wrapper -->

	<?php
		include_once("footer.php");
	?>

    </div><!-- ./wrapper -->
	
    <?php

	include("js.php");

	?>
    
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example2').DataTable({
			responsive: true
        });
    });
    </script>

  </body>

</html>


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


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="products.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="product_save.php" method="post">
                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Product Name</label>
                            	<input type="text" class="form-control" placeholder="Product Name" name="product_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Category </label>
                                <select  name="product_category" class="form-control" required>
                                    <?php 
                                    $categories = getAllSubCategories();
                                    foreach ($categories as $category) {
                                        extract($category);
                                     ?>
                                <option value="<?php echo $subcategory_id ?>"><?php echo $subcategory_name ?></option>
                                <?php } ?>
                                </select>
                            </div> 
                            </div>  
                            <div class="clearfix"></div>
                            <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Size <span class="star"> * </span></label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Size" name="product_size[]" required>
                                    <?php 
                                    $sizes = getAllSizes();
                                    foreach ($sizes as $size) {
                                        extract($size);
                                     ?>
                                <option value="<?php echo $size_name ?>"><?php echo $size_name ?></option>
                                <?php } ?>
                                </select>
                            </div>                            
                            <div class="form-group col-sm-6">
                                <label>Color <span class="star"> * </span></label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Color" name="product_color[]" required>
                                    <?php 
                                    $colors = getAllColors();
                                    foreach ($colors as $color) {
                                        extract($color);
                                     ?>
                                <option value="<?php echo $color_name ?>"><?php echo $color_name ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Sale Price</label>
                                <input type="text" class="form-control" placeholder="Sale Price" name="product_mrp">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>MRP </label>
                                <input type="text" class="form-control" placeholder="Product MRP" name="product_price">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Description</label>
                                <textarea type="text" class="form-control" placeholder="Description" name="product_desc"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Highlights</label>
                                <textarea type="text" class="form-control" placeholder="Highlights" name="product_highlights"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Save Product">
                            </div>
                        </div>
                            </form>
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
 <script src="../plugins/select2/select2.full.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example2').DataTable({
            responsive: true
        });
    });
    </script>
    <script>
      $(function () {
        $(".select2").select2();
      });
    </script>
  </body>

</html>


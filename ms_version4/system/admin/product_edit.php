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
$prod_array = array();
foreach ($products as $key => $value) {
    $prod_array=$value;
}

$sizess = explode(",", $prod_array['product_size']);
$colorss = explode(",", $prod_array['product_color']);

}
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="products.php" class="btn btn-primary">Back</a>
                        
                         <a href="product_image.php?product_id=<?php echo $prod_array['product_id']?>" class="btn btn-info pull-right">Upload Images</a>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form id="saveProduct" action="product_save.php" method="post">
                        <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                        <input name="update" type="hidden" value="true">
                        <div class="row">
                        	<div class="form-group col-md-6">
                                <label>Product Name</label>
                            	<input type="text" value="<?php echo $prod_array['product_name'] ?>" class="form-control" placeholder="Product Name" name="product_name" id="product_name">
                                <span class="err"></span>
                            </div>
                        	<div class="form-group col-md-6">
                                <label>Product Code</label>
                            	<input type="text" value="<?php echo $prod_array['product_code'] ?>" class="form-control" placeholder="Product Code" name="product_code">
                            </div>
                               
                        </div>  
                        <div class="clearfix"></div>
                        <div class="row">    
                           
                        </div>
                        <div class="row">    
                            <div class="form-group col-md-3">
                                <label>Price</label>
                                <input type="text" value="<?php echo $prod_array['product_mrp'] ?>" class="form-control" placeholder="Product Price" name="product_mrp">
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label>Same Product</label>
                                <input type="text" class="form-control" placeholder="Same Product" name="same_prod_array" value="<?php echo $prod_array['same_prod_array'] ?>"> 
                            </div>
                            <div class="form-group col-md-3">
                                <label>Similar Product</label>
                                <input type="text" class="form-control" placeholder="Similar Product" name="similar_prod_array" value="<?php echo $prod_array['similar_prod_array'] ?>">
                            </div> -->
                            <div class="form-group col-md-3">
                                <label>Brand</label>
                                <?php
                                    $_brand = getBrand($prod_array['product_brand']);
                                ?>
                                <select data-placeholder="Select Brand" class="form-control" name="product_brand">

                                    
                                    <?php 

                                        $brands = getAllBrands();
                                        foreach ($brands as $brand) {
                                            extract($brand);

                                            if($_brand['brand_name'] == $brand_name)
                                            {
                                                $selected = 'selected';
                                            }
                                            else
                                            {
                                                $selected = '';
                                            }
                                            

                                    ?>

                                    <option <?php echo $selected; ?> value="<?php echo $brand_id ?>"><?php echo $brand_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Category</label>
                                <?php
                                    $_brand = getBrand($prod_array['product_brand']);
                                ?>
                                <select data-placeholder="Select Category"  name="product_category" class="form-control" required>

                                    <?php 
                                    $categories = getAllSubCategories();
                                    foreach ($categories as $category) {
                                        extract($category);
                                        $maincategory =getCategory($subcategory_category_id);
                                     ?>
                                <option <?php echo($subcategory_id == $prod_array['product_category'])?"selected":"";?> value="<?php echo $subcategory_id ?>"><?php echo $maincategory['category_name'] ?> - <?php echo $subcategory_name ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Description</label>
                                <textarea type="text"  class="form-control" placeholder="Description" name="product_desc"><?php echo strip_tags($prod_array['product_desc']) ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Highlights</label>
                                <textarea type="text" class="form-control" placeholder="Highlights" name="product_highlights"><?php echo strip_tags($prod_array['product_highlights']) ?></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group col-md-6">
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

        $("#saveProduct").submit(function(e){
            $(".err").html('');
            var product = $('#product_name').val();
            var product_id = '<?php echo $_GET['product_id']?>';

            var flag='0';
             $.ajax({
                type: 'post',
                url: "../functions.php?xAction=isexistProduct&product="+product+"&product_id="+product_id,
                async:false,
                success: function (data) {
                    alert(data);
                   if(data>=1){
                        $(".err").append( "This product name is already exist" );
                         flag='1';
                   }
                }
            });

            if(flag==='1')
                return false;
            else
                return true;
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

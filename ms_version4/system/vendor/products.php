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
            <li class="active">Products Details</li>
          </ol>
        </section>
        <!-- Main content -->
<?php 
  extract($_GET);
?>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="product_add.php" class="btn btn-success">Add Products</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                            <div class="col-md-6">
                              <?php 
                                  if(isset($saved) && $saved == "false")
                                  {
                              ?>
                                <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Error.
                                </div>
                                <?php 
                                }
                                else if(isset($saved) && $saved == "true"){
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Product Added Succesfully. To Active Your Product Contact To administrator.
                                </div>
                                <?php 
                                  }else{}
                                ?>
                              
                            </div>
                            
                          </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Sale Price</th>
                                    <th>MRP</th>
                                    <th>Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 
                            $filter = array("store_id" =>$_SESSION['store_id']);
                            $allproducts = getProductMapping($filter);
                            //print_r($allproducts);
                            foreach ($allproducts as $product) {
                                $products = getProduct($product['mapping_product_id']);
                                //print_r($products);
                                extract($products);
                                $category = getSubCategory($product_category);
                                //$color = getColor($product_color);
                                //$size  = getSize($product_size);   
                                //print_r($category);
                            ?>
                            
                                <tr>
                                    <td><a href="product_view.php?product_id=<?php echo $product_id?>" class="btn btn-xs btn-info"><?php echo $product_id;  ?></a></td>
                                    <td><?php echo $product_name;  ?></td>
                                    <td><?php echo $category['subcategory_name'];  ?></td>
                                    <td><?php echo $product_size;  ?></td>
                                    <td><?php echo $product_color;  ?></td>
                                    <td><?php echo $product['mapping_product_offerprice'];  ?></td>
                                    <td><?php echo $product_mrp;  ?></td>
                                    <td>
                                    <a href="product_edit.php?product_id=<?php echo $product_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="product_image.php?product_id=<?php echo $product_id?>" class="btn btn-xs btn-default">Upload Images</a>
                                   <a href="javascript:void(0)" onClick="deleteentry(<?php echo $product_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                </tr>                                
                            
                            <?php } ?>
                            </tbody>
                        </table>
                      
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
    <script>
    function deleteentry(product_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="product_delete.php?eid="+product_id;
        }
    }
</script>

  </body>

</html>


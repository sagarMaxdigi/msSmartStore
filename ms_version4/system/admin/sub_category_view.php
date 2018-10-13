<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Sub Category";
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
            Sub Category
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sub Category</li>
          </ol>
        </section>
        <!-- Main content -->
<?php
extract($_GET);
if(isset($subcategory_id))
{
$subcategory=getSubCategory($subcategory_id);
//print_r($panchangs);
}
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="sub_category.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Sub Category Name</label>
                                <input type="text" value="<?php echo $subcategory['subcategory_name'] ?>" class="form-control" placeholder="Sub Category Name" name="subcategory_name" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Category</label>
                                  <?php 
                                    $category = getCategory($subcategory['subcategory_category_id']);
                                  ?>
                                  <input value="<?php echo $category['category_name'] ?>" class="form-control" readonly>
                              
                                
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


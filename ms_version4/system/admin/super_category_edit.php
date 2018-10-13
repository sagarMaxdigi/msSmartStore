<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Super Category";
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
            Super Category
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Super Category</li>
          </ol>
        </section>
        <!-- Main content -->
<?php 
  extract($_GET);
  if(isset($supercategory_id))
  {
    $supercategory = getSuperCategory($supercategory_id);
    extract($supercategory);
  }
    
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="super_category.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="super_category_save.php" method="post">
                        <input name="supercategory_id" type="hidden" value="<?php echo $supercategory_id ?>">
                        <input name="update" type="hidden" value="true">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Super Category Name</label>
                                <input type="text" value="<?php echo $supercategory_name ?>" class="form-control" placeholder="Super Category Name" name="supercategory_name">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Update">
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
    <script>
    $(document).ready(function() {
        $('#example2').DataTable({
			responsive: true
        });
    });
    </script>

  </body>

</html>


<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Area";
?>
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
            City Area
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">City Area</li>
          </ol>
        </section>
        <!-- Main content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="area.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="area_save.php" method="post">
                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Area Name <span class="star"> * </span></label>
                            	<input type="text" class="form-control" placeholder="Area Name" name="area_name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>City <span class="star"> * </span></label>
                                <select name="area_city_id" class="form-control" required>
                                <?php 
                                    $cities = getAllCities();
                                    foreach ($cities as $city) {
                                    extract($city);
                                ?>
                                    <option value="<?php echo $city_id ?>"><?php echo $city_name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                              <label>Pincode <span class="star"> * </span></label>
                              <input type="text" class="form-control" placeholder="Pincode" name="area_pincode" required>
                            </div>                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Add Area">
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


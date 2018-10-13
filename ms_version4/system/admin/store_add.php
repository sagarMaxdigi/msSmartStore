<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Store";
?>

<link href="../plugins/timepicker/bootstrap-timepicker.css" rel="stylesheet"/>
<link href="../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
<!DOCTYPE html>
<html>
  <?php
	  include("header.php");
  ?>
  <?php
        function random_password( $length = 6 ) 
        {
            $chars = "0123456789";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
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
            Store
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store</li>
          </ol>
        </section>
        <!-- Main content -->

<?php $password = random_password(6); ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="store_report.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="store_save.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="store_password" value="<?php echo $password ?>">
                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Store Name</label>
                                <input type="text" class="form-control" placeholder="Store Name" name="store_name" required>
                            </div><div class="form-group col-sm-6">
                                <label>Store Code</label>
                            	<input type="text" class="form-control" placeholder="Store Code" name="store_code" required>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Store Email" name="store_email" required>
                            </div>   
                        	<div class="form-group col-sm-6">
                                <label>Contact 1</label>
                            	<input type="text" class="form-control" placeholder="Contact 1" name="store_contact1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Contact 2</label>
                                <input type="text" class="form-control" placeholder="Contact 2" name="store_contact2">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" placeholder="Address Line 1" name="store_address1" required>
                            </div>
                        </div>
                        <div class="row">    
                            
                            <div class="form-group col-sm-6">
                                <label>City</label>
                                <select name="store_city" class="form-control" required>
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
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" placeholder="Address Line 2" name="store_address2" >
                            </div>
                            
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-sm-6">
                                <label>Landmark</label>
                                <input type="text" class="form-control" placeholder="Landmark" name="store_landmark" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Address Line 3</label>
                                <input type="text" class="form-control" placeholder="Address Line 3" name="store_address3" >
                            </div>
                            
                        </div>
                        <div class="row">    
                            
                            <div class="form-group col-sm-6">
                                <label>Store Description</label>
                                <textarea type="text" class="form-control" placeholder="Store Description" name="store_description"></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Contact Person</label>
                                <input type="text" class="form-control" placeholder="Contact Person" name="store_contact_person" >
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-sm-6">
                                <label>Establishment Year</label>
                                <input type="text" class="form-control" placeholder="Establishment Year" name="store_eshtablish_year" >
                            </div>
                            <div class="col-sm-6">
                                <label>Opening Hours</label>
                                <input type="text" class="form-control" placeholder="Opening Hours" name="store_opening_hours" >
                            </div>
                        </div>
                        <div class="row">
                            
                            
                            
                            <div class="col-sm-6">
                                <label>Week Off Day</label>
                                <select name="store_weekoff" class="form-control">
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Serving Pincode</label>
                                <textarea class="form-control" name="store_serving_pincode" rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <label>Location URL</label>
                                <input class="form-control" name="store_location_url" required>
                            </div>

                             <div class="col-sm-6">
                                <label>Store Banner</label>
                                <input type="file" class="form-control" placeholder="Image" name="store_banner" required>
                            </div>
                            
                        </div><br>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="submit" class="btn btn-success" value="Save store">
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


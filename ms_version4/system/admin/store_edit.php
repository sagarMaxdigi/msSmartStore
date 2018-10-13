<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Teacher Applications";
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
            store
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">store</li>
          </ol>
        </section>
        <!-- Main content -->
<?php
extract($_GET);

if(isset($store_id))
{
$bs=getStore_admin($store_id);
 //$weekdays = explode(",",$bs['store_week_days']) ;
//extract($store);
}
?>

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
                        <input name="store_id" type="hidden" value="<?php echo $store_id ?>">
                        <input name="update" type="hidden" value="true">
                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Store Name</label>
                            	<input type="text" value="<?php echo $bs['store_name']; ?>" class="form-control" placeholder="Store Name" name="store_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email" value="<?php echo $bs['store_email']; ?>" class="form-control" placeholder="Store Email" name="store_email">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">    
                        	<div class="form-group col-sm-6">
                                <label>Contact 1</label>
                            	<input type="text" value="<?php echo $bs['store_contact1']; ?>" class="form-control" placeholder="Contact 1" name="store_contact1">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Contact 2</label>
                                <input type="text" value="<?php echo $bs['store_contact2']; ?>" class="form-control" placeholder="Contact 2" name="store_contact2">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Address</label>
                                <input type="text" value="<?php echo $bs['store_address1']; ?>" class="form-control" placeholder="Address" name="store_address1">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Address</label>
                                <input type="text" value="<?php echo $bs['store_address2']; ?>" class="form-control" placeholder="Address" name="store_address2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Address</label>
                                <input type="text" value="<?php echo $bs['store_address3']; ?>" class="form-control" placeholder="Address" name="store_address3">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>City</label>
                                <select name="store_city"  class="form-control">
                                <?php 
                                    $cities = getAllCities();
                                    foreach ($cities as $city) {
                                    extract($city);
                                ?>
                                    <option <?php echo($bs['store_city'] == $city_id)?"selected":"";?> value="<?php echo $city_id ?>"><?php echo $city_name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="form-group col-sm-6">
                                <label>Area</label>
                                <input type="text" value="<?php echo $bs['store_area']; ?>" class="form-control" placeholder="Area" name="store_area">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Description</label>
                                <textarea type="text" class="form-control" placeholder="Description" name="store_description"><?php echo $bs['store_description']; ?></textarea>
                            </div>
                        </div>
                            <div class="row">

                            <div class="form-group col-sm-6">
                                <label>Contact Person</label>
                                <input type="text" class="form-control" placeholder="Contact Person" value="<?php echo $bs['store_contact_person']; ?>" name="store_contact_person">
                            </div>
                            <div class="col-sm-6">
                                <label>Week Off Day</label>
                                <input type="text" name="store_weekoff" value="<?php echo $bs['store_weekoff'] ?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Establishment Year</label>
                                <input type="text" class="form-control" placeholder="Establishment Year" value="<?php echo $bs['store_eshtablish_year']; ?>" name="store_eshtablish_year">
                            </div>
                            <div class="col-sm-6">
                                <label>Opening Hours</label>
                                <input type="text" class="form-control" placeholder="Opening Hours" value="<?php echo $bs['store_opening_hours']; ?>" name="store_opening_hours">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Serving Pincode</label>
                                <textarea class="form-control" name="store_serving_pincode" required><?php echo $bs['store_serving_pincode']; ?></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Location URL</label>
                                <textarea type="text" class="form-control" placeholder="Location URL" name="store_location_url"><?php echo $bs['store_location_url']; ?></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Store Banner</label>
                                <input type="file" class="form-control" placeholder="Image" name="store_banner" required>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo __base_url.'images/store/storebanner/'.$bs['store_banner']; ?>" height="150" width="350">
                            </div>
                        </div>
                       <br>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Update Store">
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


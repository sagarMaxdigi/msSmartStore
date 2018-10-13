<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Store";
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
            Store
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store</li>
          </ol>
        </section>
        <!-- Main content -->
<?php
extract($_GET);
if(isset($store_id))
{
$bs=getStore($store_id);
 //$weekdays = explode(",",$bs['store_week_days']) ;
    $from_time = substr($bs['store_opening_hours'],0,1);
    $to_time   = substr($bs['store_opening_hours'],1,2);

    //print_r($bs);
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
                        <div class="row">
                        	<div class="form-group col-sm-6">
                                <label>Store Name</label>
                            	<input type="text" readonly value="<?php echo $bs['store_name']; ?>" class="form-control" placeholder="store Name" name="store_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input type="email" readonly value="<?php echo $bs['store_email']; ?>" class="form-control" placeholder="store Email" name="store_email">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">    
                        	<div class="form-group col-sm-6">
                                <label>Contact</label>
                            	<input type="text" readonly value="<?php echo $bs['store_contact1'] ." / ". $bs['store_contact2']; ?>" class="form-control" placeholder="Contact 1" name="store_contact1">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Address</label>
                                <input type="text" readonly value="<?php echo $bs['store_address1'] ." ".$bs['store_address2']." ".$bs['store_address3']; ?>" class="form-control" placeholder="Address" name="store_address">
                            </div>
                        </div>
                        <div class="row">    
                            
                            <div class="form-group col-sm-6">
                                <label>City</label>
                                <select name="store_city" readonly  class="form-control">
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
                                <label>Landmark</label>
                                <input type="text" readonly value="<?php echo $bs['store_landmark']; ?>" class="form-control" placeholder="Landmark" name="store_landmark">
                            </div>
                        </div>
                        <div class="row">    
                            
                            <div class="form-group col-sm-6">
                                <label>Store Description</label>
                                <textarea type="text" readonly class="form-control" placeholder="Store Description" name="store_description"><?php echo $bs['store_description']; ?></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Serving Pincode</label>
                                <textarea class="form-control"  name="store_serving_pincode" readonly><?php echo $bs['store_serving_pincode'] ?></textarea >
                            </div>
                        </div>
                            <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Contact Person</label>
                                <input type="text" readonly class="form-control" placeholder="Contact Person" value="<?php echo $bs['store_contact_person']; ?>" name="store_contact_person">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Week Off</label>
                                <input type="text" readonly value="<?php echo $bs['store_weekoff'] ?>" class="form-control" placeholder="Password" name="store_weekoff">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Establishment Year</label>
                                <input type="text" readonly class="form-control" placeholder="Establishment Year" value="<?php echo $bs['store_eshtablish_year']; ?>" name="store_eshtablish_year">
                            </div>
                            <div class="col-sm-6">
                                <label>Opening Hours</label>
                                    <input type="text" readonly class="form-control" placeholder="Opening Hours" value="<?php echo $bs['store_opening_hours'] ?>" name="store_opening_hours">
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Password</label>
                                <input type="text" readonly value="<?php echo $bs['store_password'] ?>" class="form-control" placeholder="Password" name="store_password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Logo</label><br>
                                <img src="logo/<?php echo $bs['store_logo'] ?>" width="200px">
                            </div>
                        </div>
                        <div class="clearfix"></div>
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


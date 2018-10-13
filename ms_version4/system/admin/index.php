<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Home";
?>
<!DOCTYPE html>
<html>
  <?php
	  include("header.php");
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php
			include_once("navbar.php");
		?>
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
			include_once("vlinks.php");
		?>
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
<?php
  $stores=getAllStores();  
?>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo count($stores);?></h3>
                  <p>
                  Store
                  </p>
                </div>
                <div class="icon">
                  <i class="ion ion-location"></i>
                </div>
                <a href="store_report.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">

<?php
  $products=getAllProducts();  
?>              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo count($products); ?></h3>
                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-bookmark"></i>
                </div>
                <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">

<?php
  $customers=getAllCustomer();  
?>              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo count($customers); ?></h3>
                  <p>Customers Enquiry</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-bookmark"></i>
                </div>
                <a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div><!-- /.row -->
          <!-- Main row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<?php
		include_once("footer.php");
	?>
    </div><!-- ./wrapper -->
    <?php
	include_once("js.php");
	?>
  </body>
</html>
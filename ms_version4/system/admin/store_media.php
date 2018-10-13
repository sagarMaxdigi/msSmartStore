<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Store";
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
$store=getStore($store_id);
//print_r($store);
//extract($product);
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
                        <form action="store_logo_save.php" method="post" method="get" enctype="multipart/form-data">
                        <input name="store_id" type="hidden" value="<?php echo $store['store_id'] ?>">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group col-md-6">
                              <label>Logo</label>
                              <input type="file" class="form-control" placeholder="Image" name="store_logo">                            
                            <div class="form-group col-md-6"><br>
                              <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                            </div>
                          </div>
                          <div class="form-group col-md-3">
                            <img height="10%" width="50%" src="../images/store/storelogo/<?php echo $store['store_logo']?>" >
                          </div>
                        </form>

                        
                        
                        </div><!-- /.box-body -->
                        <div class="box-body">
                        <form action="store_banner_save.php" method="post" method="get" enctype="multipart/form-data">
                        <input name="store_id" type="hidden" value="<?php echo $store['store_id'] ?>">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group col-md-6">
                              <label>Banner</label>
                              <input type="file" class="form-control" placeholder="Image" name="store_banner">                            
                            <div class="form-group col-md-6"><br>
                              <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                            </div>
                          </div>
                          <div class="form-group col-md-3">
                            <img height="10%" width="50%" src="../images/store/storebanner/<?php echo $store['store_banner']?>" >
                          </div>

                        </form>

                        
                        
                        </div><!-- /.box-body -->
                        <div class="box-body">
                        <form action="store_intro_save.php" method="post" method="get" enctype="multipart/form-data">
                        <input name="store_id" type="hidden" value="<?php echo $store['store_id'] ?>">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group col-md-6">
                              <label>Intro Video</label>
                              <input type="file" class="form-control" placeholder="Image" name="store_intro_video">                            
                            <div class="form-group col-md-6"><br>
                              <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                            </div>
                          </div>
                          <div class="form-group col-md-3">
                            <img height="10%" width="50%" src="../images/store/storeintro/<?php echo $store['store_intro_video']?>" >
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


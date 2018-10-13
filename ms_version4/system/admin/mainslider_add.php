<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Main Slider";

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
            Main Slider
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Main Slider</li>
          </ol>
        </section>
        <!-- Main content -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="main_slider.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="mainslider_save.php" method="post" enctype="multipart/form-data">
                          <div class="form-group col-md-6">
                            <label>Image (SIZE 1200 W * 675 H)</label>
                            <input type="file" class="form-control" placeholder="Image" name="mainslider_image">
                          </div>
                          <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
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


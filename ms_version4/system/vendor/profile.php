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
            Profile 
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>
        <!-- Main content -->
<?php 
  $username = $_SESSION['username'];
  $admin = getAdmin($username);
  extract($admin);

?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-3">
                              <label>User Name</label>
                            </div>
                            <div class="col-md-3">
                              <label><?php echo $_SESSION['username'] ?></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <label>Password</label>
                            </div>
                            <div class="col-md-3">
                              <label><?php echo $password; ?></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <a href="change_password.php?username=<?php echo $_SESSION['username']; ?>" class="btn btn-success">Change Password</a>
                            </div>

                          </div>
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


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
    extract($_GET);

?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                    
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <?php 
                                  if(isset($updated) && $updated == "false")
                                  {
                              ?>
                                <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Error.
                                </div>
                                <?php 
                                }
                                else if(isset($updated) && $updated == "true"){
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Password Updated Succesfully
                                </div>
                                <?php 
                                  }else{}
                                ?>
                              
                            </div>
                            
                          </div>
                          <div class="row">
                            <form action="c_password.php" method="post">
                              <input name="username" type="hidden" value="<?php echo $_SESSION['username'] ?>">
                            <div class="col-md-3">
                              <label>Old Password</label>
                              <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <label>New Password</label>
                              <input type="password" class="form-control" placeholder="New Password" name="new_password">
                            </div>
                          </div><br>
                          <div class="row">
                            <div class="col-md-3">
                              <input type="submit" class="btn btn-success" value="Update Password">
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


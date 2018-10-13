<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once("checksession.php");
include_once("../connection.php");
include_once("../functions.php");
$title="Category";
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
          Category
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Category</li>
        </ol>
      </section>
      <!-- Main content -->
      <?php
      extract($_GET);
      if(isset($category_id))
      {
        $category=getCategory($category_id);
//print_r($category);
//extract($product);
      }
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="box-header with-border">
                  <a href="category.php" class="btn btn-primary">Back</a>
                </div><!-- /.box-header -->
              </div>
            </div>
            <div class="box">
              <div class="box-body">
                <form role="form" action="category_image_save.php" method="post" enctype="multipart/form-data">
                  <input name="category_id" type="hidden" value="<?php echo $category_id ?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                          <label>Image</label>
                          <input type="file" class="form-control" name="category_banner">
                        </div>
                        <div class="form-group col-md-12">
                          <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                        </div>
                      </div>
                    </form>
                    <div class="form-group col-md-3">
                        <img height="10%" width="50%" src="../../images/category/<?php echo $category['category_banner']?>">
                    </div>
                  </div>
                </div>  
                <div class="clearfix"></div>
                <!-- /.box-body -->
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


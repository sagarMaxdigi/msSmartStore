<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once("checksession.php");
include_once("../connection.php");
include_once("../functions.php");
$title="Product";
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
          Products
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Products</li>
        </ol>
      </section>
      <!-- Main content -->
      <?php
      extract($_GET);
      if(isset($product_id))
      {
        $products=getProduct($product_id);
//print_r($bs);
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
                  <a href="products.php" class="btn btn-primary">Back</a>
                </div><!-- /.box-header -->

                <div class="row">
                  <div class="col-md-6">
                    <h3>Product Name</h3>
                    <h3><?php echo $products['product_name'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="box-body">
                <form role="form" action="product_image_save.php" method="post" enctype="multipart/form-data">
                  <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group col-md-6">

                        <div class="form-group col-md-12">
                          <label>Image</label>
                          <input type="file" class="form-control" placeholder="Product Name" name="product_image1">
                        </div>
                        <div class="form-group col-md-12">
                          <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                        </div>
                      </div>

                    </form>

                    <div class="form-group col-md-3">
                      <img height="10%" width="50%" src="../product_images/<?php echo $products['product_img1']?>" >
                    </div>
                  </div>
                </div>  
                <div class="clearfix"></div>
                <!-- /.box-body -->
              </div><!-- /.box -->

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <form role="form" action="product_image_save1.php" method="post" enctype="multipart/form-data">
                      <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group col-md-6">

                            <div class="form-group col-md-12">
                              <label>Image</label>
                              <input type="file" class="form-control" placeholder="Product Name" name="product_image1">
                            </div>
                            <div class="form-group col-md-12">
                              <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                            </div>
                          </div>

                        </form>

                        <div class="form-group col-md-3">
                          <img height="10%" width="50%" src="../product_images/<?php echo $products['product_img2']?>" >
                        </div>
                      </div>
                    </div>  
                    <div class="clearfix"></div>
                    <!-- /.box-body -->
                  </div><!-- /.box -->

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <form role="form" action="product_image_save2.php" method="post" enctype="multipart/form-data">
                          <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group col-md-6">

                                <div class="form-group col-md-12">
                                  <label>Image</label>
                                  <input type="file" class="form-control" placeholder="Product Name" name="product_image1">
                                </div>
                                <div class="form-group col-md-12">
                                  <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                                </div>
                              </div>

                            </form>

                            <div class="form-group col-md-3">
                              <img height="10%" width="50%" src="../product_images/<?php echo $products['product_img3']?>" >
                            </div>
                          </div>
                        </div>  
                        <div class="clearfix"></div>
                        <!-- /.box-body -->
                      </div><!-- /.box -->

                    </div>
                    <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <form role="form" action="product_image_save3.php" method="post" enctype="multipart/form-data">
                          <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group col-md-6">
                                
                                <div class="form-group col-md-12">
                                  <label>Image</label>
                                  <input type="file" class="form-control" placeholder="Product Name" name="product_image1">
                                </div>
                                <div class="form-group col-md-12">
                                  <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                                </div>
                              </div>

                            </form>

                            <div class="form-group col-md-3">
                              <img height="10%" width="50%" src="../product_images/<?php echo $products['product_img4']?>" >
                            </div>
                          </div>
                        </div>  
                        <div class="clearfix"></div>
                        <!-- /.box-body -->
                      </div><!-- /.box -->
                      
                    </div>
                    <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <form role="form" action="product_image_save4.php" method="post" enctype="multipart/form-data">
                          <input name="product_id" type="hidden" value="<?php echo $product_id ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group col-md-6">
                                
                                <div class="form-group col-md-12">
                                  <label>Image</label>
                                  <input type="file" class="form-control" placeholder="Product Name" name="product_image1">
                                </div>
                                <div class="form-group col-md-12">
                                  <input type="submit" class="btn btn-primary" name="submit" value="Update Image">
                                </div>
                              </div>

                            </form>

                            <div class="form-group col-md-3">
                              <img height="10%" width="50%" src="../product_images/<?php echo $products['product_img5']?>" >
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


<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Super Banner";
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
            Super Category
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url?>system/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Super Category</li>
          </ol>
        </section>
        <!-- Main content -->

<?php
extract($_GET);
if(isset($superbanner_id))
{
$superbanner4=getSupperBanner4($superbanner_id);
 //$weekdays = explode(",",$bs['store_week_days']) ;
   

    //print_r($sb); die;
//extract($store);supercategory_id
}
?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="super_banner.php" class="btn btn-primary">Back</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <form action="super_banner4_save.php" method="post" enctype="multipart/form-data">
                        <input name="superbanner_id" type="hidden" value="<?php echo $superbanner_id ?>">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Super Banner Name</label>
                                <input type="text" class="form-control" value="<?php echo $superbanner4['superbanner_name'] ?>" placeholder="Super Banner Name" name="superbanner_name">

                                <input name="update" type="hidden" value="true">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Super Category Name</label>
                                <select name="supercategory_id" class="form-control">
                                <option value="">Select Super Category</option>
                                <?php 
                                    $super_category = getAllSubCategories();
                                    foreach ($super_category as $super) {
                                ?>
                                <option <?php echo $super['subcategory_id'] == $superbanner4['supercategory_id']? 'selected="selected"' : '' ?> value="<?php echo $super['subcategory_id'] ?>"><?php echo $super['subcategory_name'] ?></option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Image (SIZE 1440 W * 1080 H)</label>
                                <input type="file" class="form-control" placeholder="Image" name="superbanner_image">
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label>Image (SIZE 720 W * 540 H)</label>
                                <input type="file" class="form-control" placeholder="Image" name="superbanner_image2">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Image (SIZE 720 W * 540 H)</label>
                                <input type="file" class="form-control" placeholder="Image" name="superbanner_image3">
                            </div> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="submit" class="btn btn-success" value="Update">
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


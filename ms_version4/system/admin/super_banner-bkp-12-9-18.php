<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Super Category";

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
        <div class="billing-details">
                             
            <?php
            if(isset($_GET['status']) && $_GET['status']=="false")
            {
            ?>
                <div style="padding:5px; background-color:red; color:#FFF">
                    <p align="center">You cannot delete this category.Please delete Category of this Super Category then try.</p>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Super Category
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=__base_url?>system/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Super Category</li>
          </ol>
        </section>
        <!-- Main content -->
<?php 
          $superbanner1 = getAllSuperBanner1();
          $superbanner2 = getAllSuperBanner2();
          $superbanner3 = getAllSuperBanner3();
          $superbanner4 = getAllSuperBanner4();
          //print_r($supercategories);          
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <!-- <a href="super_banner_add.php" class="btn btn-success">Add Super Banner</a> -->
    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($superbanner1 as $banner1) {
                                extract($banner1);
                            ?>
                                <tr>
                                    <td><?php echo $superbanner_id;  ?></td>
                                    <td><?php echo $superbanner_name;  ?></td>
                                    <td><img src="../../images/supperbanner/<?php echo $banner1['superbanner_image'];?>" height="50px">
                                    </td>
                                    
                                    <td>
                                    <?php
                                    if($banner1['superbanner_status']=="ACTIVE")
                                    {
                                    ?>
                                    <a href="super_banner1_save.php?superbanner_status=INACTIVE&superbanner_id=<?php echo $banner1['superbanner_id'];?>" class="btn-sm btn-success"><?php echo $banner1['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="super_banner1_save.php?superbanner_status=ACTIVE&superbanner_id=<?php echo $banner1['superbanner_id'];?>" class="btn-sm btn-danger"><?php echo $banner1['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td>                                 
                                   <a href="super_banner1_edit.php?superbanner_id=<?php echo $superbanner_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>                                
                            <?php } ?>


                            <?php 
                            foreach ($superbanner2 as $banner2) {
                                extract($banner2);
                            ?>
                                <tr>
                                    <td><?php echo $superbanner_id;  ?></td>
                                    <td><?php echo $superbanner_name;  ?></td>
                                    <td><img src="../../images/supperbanner/<?php echo $banner2['superbanner_image'];?>" height="50px">
                                    </td>
                                    
                                    <td>
                                    <?php
                                    if($banner2['superbanner_status']=="ACTIVE")
                                    {
                                    ?>
                                    <a href="super_banner2_save.php?superbanner_status=INACTIVE&superbanner_id=<?php echo $banner2['superbanner_id'];?>" class="btn-sm btn-success"><?php echo $banner2['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="super_banner2_save.php?superbanner_status=ACTIVE&superbanner_id=<?php echo $banner2['superbanner_id'];?>" class="btn-sm btn-danger"><?php echo $banner2['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td>                                 
                                   <a href="super_banner2_edit.php?superbanner_id=<?php echo $superbanner_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>                                
                            <?php } ?>


                            <?php 
                            foreach ($superbanner3 as $banner3) {
                                extract($banner3);
                            ?>
                                <tr>
                                    <td><?php echo $superbanner_id;  ?></td>
                                    <td><?php echo $superbanner_name;  ?></td>
                                    <td><img src="../../images/supperbanner/<?php echo $banner3['superbanner_image'];?>" height="50px">
                                    </td>
                                    
                                    <td>
                                    <?php
                                    if($banner3['superbanner_status']=="ACTIVE")
                                    {
                                    ?>
                                    <a href="super_banner3_save.php?superbanner_status=INACTIVE&superbanner_id=<?php echo $banner2['superbanner_id'];?>" class="btn-sm btn-success"><?php echo $banner3['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="super_banner3_save.php?superbanner_status=ACTIVE&superbanner_id=<?php echo $banner3['superbanner_id'];?>" class="btn-sm btn-danger"><?php echo $banner3['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td>                                 
                                   <a href="super_banner3_edit.php?superbanner_id=<?php echo $superbanner_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>                                
                            <?php } ?>


                            <?php 
                            foreach ($superbanner4 as $banner4) {
                                extract($banner4);
                            ?>
                                <tr>
                                    <td><?php echo $superbanner_id;  ?></td>
                                    <td><?php echo $superbanner_name;  ?></td>
                                    <td><img src="../../images/supperbanner/<?php echo $banner4['superbanner_image'];?>" height="50px">
                                    </td>
                                    
                                    <td>
                                    <?php
                                    if($banner4['superbanner_status']=="ACTIVE")
                                    {
                                    ?>
                                    <a href="super_banner4_save.php?superbanner_status=INACTIVE&superbanner_id=<?php echo $banner2['superbanner_id'];?>" class="btn-sm btn-success"><?php echo $banner4['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="super_banner4_save.php?superbanner_status=ACTIVE&superbanner_id=<?php echo $banner4['superbanner_id'];?>" class="btn-sm btn-danger"><?php echo $banner4['superbanner_status'];  ?></a>
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td>                                 
                                   <a href="super_banner4_edit.php?superbanner_id=<?php echo $superbanner_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>                                
                            <?php } ?>
                        </tbody>
                        </table>
                      
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
    <script>
    function deleteentry(superbanner_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="superbanner_delete.php?eid="+superbanner_id;
        }
    }
</script>
  </body>

</html>


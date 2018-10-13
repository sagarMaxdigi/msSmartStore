<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Brands";
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
            Brands
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Brands</li>
          </ol>
        </section>
        <!-- Main content -->
<?php 
          $brands = getAllBrands();
          //print_r($supercategories);          
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="brand_add.php" class="btn btn-success">Add Brands</a>
    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 

                            foreach ($brands as $brand) {
                                extract($brand);
                            ?>
                                <tr>
                                    <td><?php echo $brand_id;  ?></td>
                                    <td><?php echo $brand_name;  ?></td>
                                    <td>
                                    <a href="brand_edit.php?brand_id=<?php echo $brand_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                   
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $brand_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
    function deleteentry(brand_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="brand_delete.php?brand_id="+brand_id;
        }
    }
</script>

  </body>

</html>


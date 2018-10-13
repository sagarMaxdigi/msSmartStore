<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Category";

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
        <!-- -------------------Atish on 15th August 2018-------------- -->
        <div class="billing-details">            
            <?php
            if(isset($_GET['status']) && $_GET['status']=="false")
            {
            ?>
                <div style="padding:5px; background-color:red; color:#FFF">
                    <p align="center">You cannot delete this category.Please delete Sub-category of this Category then try.</p>
                </div>
            <?php
            }
            ?>
        </div>
            <!-- -------------End Atish on 15th August 2018--------------- -->
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
          $categories = getAllCategories();
          //print_r($categories);          
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="category_add.php" class="btn btn-success">Add Category</a>
    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Super Category</th>
                                    <th>Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 

                            foreach ($categories as $category) {
                                extract($category);
                                $super = getSuperCategory($category_supercategory_id);
                            ?>
                                <tr>
                                    <td><?php echo $category_id;  ?></td>
                                    <td><?php echo $category_name;  ?></td>
                                    <td><?php echo $super['supercategory_name'];  ?></td>
                                    <td>
                                    <a href="category_edit.php?category_id=<?php echo $category_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="category_image.php?category_id=<?php echo $category_id?>" class="btn-xs btn-default">Upload Banner</a>
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $category_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
    function deleteentry(category_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="category_delete.php?eid="+category_id;
        }
    }
</script>

  </body>

</html>

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
<?php 
            $filter = array();
          $sliders = getAllMainSliders($filter);
          //print_r($sliders);          
?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="mainslider_add.php" class="btn btn-success">Add Slider</a>
    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slider</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>                           
                            </thead>
                            <?php 

                            foreach ($sliders as $slider) {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $slider['mainslider_id'];  ?></td>
                                    <td><img src="../../images/mainsliders/<?php echo $slider['mainslider_image'];?>" height="50px"></td>
                                    <td>
                                    <?php
									if($slider['mainslider_status']=="ACTIVE")
									{
									?>
                                    <a href="mainslider_save.php?mainslider_status=INACTIVE&mainslider_id=<?php echo $slider['mainslider_id'];?>" class="btn-sm btn-success"><?php echo $slider['mainslider_status'];  ?></a>
                                    <?php
									}
									else
									{
									?>
                                    <a href="mainslider_save.php?mainslider_status=ACTIVE&mainslider_id=<?php echo $slider['mainslider_id'];?>" class="btn-sm btn-danger"><?php echo $slider['mainslider_status'];  ?></a>
                                    <?php
									}
									?>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $slider['mainslider_id']?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
	                                </td>
                                </tr>                                
                            </tbody>
                            <?php } ?>
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
    function deleteentry(mainslider_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="mainslider_delete.php?eid="+mainslider_id;
        }
    }
</script>

  </body>

</html>


<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

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
<script>
function deleteTeacher(id)
{
	if(confirm("Are you sure to delete?")==true)
	{
		document.location="teacher_delete.php?id="+id;
	}
}
</script>
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
            Employee Management
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee Management</li>
          </ol>
        </section>
        <!-- Main content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a class="btn btn-success">Employee Registration</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Location</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>58647</td>
                                    <td>Sachin S. Jadhav</td>
                                    <td>Sr. Manager</td>
                                    <td>Halol 1</td>
                                    <td>Pipeline- HTS </td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>                                
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

  </body>

</html>


<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

	//include_once("checksession.php");
	//include_once("../connection.php");
	//include_once("../functions.php");
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
            Department Management
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Department Management</li>
          </ol>
        </section>
        <!-- Main content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a class="btn btn-success">New Department</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Transformer</td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-view">List Employee</i></a>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>2</td>
                                    <td>OGD-Gas Meter</td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-view">List Employee</i></a>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>3</td>
                                    <td>OGD-RMU</td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-view">List Employee</i></a>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>4</td>
                                    <td>OGD-liquid epoxy</td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-view">List Employee</i></a>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>5</td>
                                    <td>OGD- Pipeline HTS</td>
                                    <td>
                                    <a href="" class="btn btn-info"><i class="fa fa-view">View</i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-view">List Employee</i></a>
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


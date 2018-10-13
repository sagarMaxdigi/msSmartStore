<?php
	//ini_set('display_errors', 'On');
	//error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Student Enquiries";
?>

<!DOCTYPE html>
<html>
  <?php
	  include("header.php");
  ?>
<script>
function deleteStudent(id)
{
	if(confirm("Are you sure to delete?")==true)
	{
		document.location="student_delete.php?id="+id;
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
            Student Enquiries
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Enquiries</li>
          </ol>
        </section>
        <!-- Main content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <h3 class="box-title">Student Enquiries</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <?php
							$students=getAllStudentApplications();

							if(count($students)>0)
							{
						?>
                            <table class="table table-bordered">
                            <?php
								foreach($students as $student)
								{
									extract($student);
							?>
                                <tr>
                                  <td style="border-bottom:2px groove #333; padding-bottom:10px">
                                  	<div class="col-md-12">
									  Application ID : <?php echo $student_id  ?><br>
                                  	</div>
                                    
                                    <div class="col-md-12">
                                    	<div class="col-md-12">
                                        <strong>Personal Details</strong>
                                        </div>
                                        <div class="col-md-6">
			                              Name : <?php echo $student_firstname." ".$student_lastname ?>
										</div>

                                        <div class="col-md-6">
                                          	Contact : <?php echo $student_phone  ?>
                                        </div>
                                        <div class="col-md-6">
                                          	Email : <?php echo $student_email  ?>
                                        </div>
                                        <div class="col-md-12">
                                          	Address : 
											<?php
											if(strlen($student_addr1)>0) 
											echo $student_addr1;
											if(strlen($student_addr2)>0) 
											echo ", ".$student_addr2;
											if(strlen($student_city)>0) 
											echo "<br>".$student_city;
											if(strlen($student_zip)>0) 
											echo ", ".$student_zip;
											?>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        <strong>Tutor Requirment</strong>
                                        </div>
                                        <div class="col-md-6">
                                          	Class : <?php echo $student_class ?>
                                        </div>
                                        <div class="col-md-6">
                                          	Board : <?php echo $student_board ?>
                                        </div>
                                        <div class="col-md-6">
                                          	Time Slot : <?php echo $student_time ?>
                                        </div>
                                        <div class="col-md-12">
                                          	Comment : <?php echo $student_comment ?>
                                        </div>
                                        
                                        <div class="col-md-12">
											<br>
                                          	<em>Registered on : <?php echo $student_registeron  ?></em>
                                        </div>
                                  	</div>
                                    
                                    <div class="col-md-12" style="text-align:right">
                                    	<a href="javascript:void(0)" onClick="deleteStudent(<?php echo $student_id  ?>)" class="btn btn-danger">Delete</a>
                                        <?php
										/*
										if($teacher_status=="PENDING")
										{
										?>
                                    	<a href="teacher_shortlist.php?teacher_id=<?php echo $teacher_id ?>" class="btn btn-success">Short List</a>
                                        <?php
										}
										else
										{
										?>
                                    	<a href="teacher_shortlist.php?teacher_id=<?php echo $teacher_id  ?>&action=reject" class="btn btn-default">Short List Cancel</a>
                                        <?php
										}
										*/
										?>
                                    </div>
                                  </td>
                                </tr>
                            <?php
								}
							?>
                            </table>
                            <?php
							}
							else
							{
							?>
                            	<h4 class="col-md-3 btn-info">No Record Found</h4>
                            <?php
							}
							?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
				</div>
			</div>
		</section>
        
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Version</b> 1.0.0

        </div>

        <strong>Copyright &copy; 2017-2018 Concept Sprout.</strong> All rights reserved.

      </footer>


    </div><!-- ./wrapper -->
	
    <?php

	include("js.php");

	?>
    

  </body>

</html>


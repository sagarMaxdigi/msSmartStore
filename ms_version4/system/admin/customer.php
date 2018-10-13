<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Customer";


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
            Members
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer Enquiry</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php 
            $members = getAllCustomer();
            
            
        ?>
        


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                    <th>Action</th>
                                </tr>                                
                            </thead>
                            <tbody>
                            <?php
                           
                            foreach ($members as $key => $member) {
                              
                            ?>
                            
                                <tr>
                                    <td><?php echo $member['member_id'];  ?></td>
                                    <td><?php echo $member['member_fname']." ".$member['member_lname'];  ?></td>
                                    <td><?php echo $member['member_contact'];  ?></td>
                                    <td><?php echo $member['member_email'];  ?></td>
                                    <td><?php echo $member['member_city'];  ?></td>
                                    <td><?php echo $member['member_pincode'];  ?></td>
                                    <td>
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $member['member_id']?>)" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                    <a href="javascript:void(0)" onClick="wishlist(<?=$member['member_id']?>)"  title="Wish Lists" class="btn btn-xs btn-info"><i class="fa fa-shopping-cart"></i></a> 
                                    </td>
                                </tr>                                
                           
                            <?php 
                            } 
                             
                            ?>
                             </tbody>
                        </table>
                      
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
				</div>
			</div>
		</section>
        
      </div><!-- /.content-wrapper -->


      
        </div>




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
			responsive: true,
			ordering: false
        });
    });
    </script>
     <script>
    function deleteentry(member_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="customer_delete.php?member_id="+member_id;
        }
    }

    function wishlist(member_id)
    {
        console.log(member_id);
        document.location="customer_wishlist.php?member_id="+member_id;
    }
</script>

  </body>

</html>



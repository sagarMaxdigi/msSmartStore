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
            Customer Enquiry
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer Enquiry</li>
          </ol>
        </section>
        <!-- Main content -->


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
                                    <th>email</th>
                                    <th>contact</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>                                
                            </thead>
                            <?php 
                            $filter =array("store_id" => $store_id);
                            $customers = getAllCustomer($filter);
                            foreach ($customers as $customer) {
                                //print_r($customer);
                            extract($customer);
                            $product = getProduct($customer_product_id);
                            print_r($product);
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $customer_id;  ?></td>
                                    <td><?php echo $customer_name;  ?></td>
                                    <td><?php echo $customer_email;  ?></td>
                                    <td><?php echo $customer_contact;  ?></td>
                                    <td><?php echo $product['product_name'];  ?></td>
                                    <td>
                                        <?php 
                                            $date = DateTime::createFromFormat("Y-m-d H:i:s",$customer_ondate);
                                            echo $date->format("d/M/Y") ; 
                                        ?>
                                    </td>
                                    <td>
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $customer_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>                                    
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
    function deleteentry(customer_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="customer_delete.php?eid="+customer_id;
        }
    }
</script>

  </body>

</html>



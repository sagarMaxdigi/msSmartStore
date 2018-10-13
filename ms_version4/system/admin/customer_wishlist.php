<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Customer";

  extract($_GET);
  if(isset($ref_id))
  {
    $update_notf_bell = 'update notification set n_status=1 where n_ref_id = '.$ref_id;
    mysqli_query($con,$update_notf_bell);
  }
  else
  {
    $update_notf_bell = 'UPDATE notification SET n_status = 1 WHERE n_ref_id IN (SELECT wishlist_id FROM member_wishlist WHERE wishlist_member_id = '.$member_id.')';
    mysqli_query($con,$update_notf_bell);
  }
  
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
            Wish List
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer Enquiry</li>
          </ol>
        </section>
        <!-- Main content -->
        
        


        <!-- Main content -->
        <section class="content">
            
              <!-- row -->
              <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                  <!-- <div class="section-title">
                    <h2 class="title"></h2>
                  </div> -->
                
                <!-- section title -->
                
                <div class="box">
                  <div class="box-header with-border">
                    <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary">Back</a>
                  </div><!-- /.box-header -->
                  <div class="box-body">

                    <table id="wishListTbl" class="table table-bordered table-responsive table-hover">
                      <thead>
                          <tr>
                              <th>Sr.No.</th>
                              <th>Code</th>
                              <th>Product name</th>
                              <th>MRP</th>
                              <th>Store Price</th>
                              <th>Size</th>
                              <th>Color</th>
                              <th>Image</th>
                              <th>Store Name</th>
                              <th>Date</th>
                          </tr>                           
                      </thead>
                      <tbody>
                        
                      
                    <?php
                      $products=getMemberFavriteProducts($member_id);
                      $srNo=0;
                      for($i=0;$i<count($products);$i++)
                        {
                          $_product_id=$products[$i];
                          
                            $singleproduct=getProduct_wishlist($_product_id);
                            
                            $srNo++;
                    ?>
                            <tr>
                              <td><?=$srNo?></td>
                              <td><?=$singleproduct['product_code']?></td>
                              <td><?=$singleproduct['product_name']?></td>
                              <td><?=$singleproduct['product_mrp']?></td>
                              <td><?=$singleproduct['product_minimum_price']?></td>
                              <td><?=$singleproduct['wishlist_size']?></td>
                              <td><?=$singleproduct['wishlist_color']?></td>
                              <td><?php
                                    $images = explode(',',$singleproduct['images']);
                                    if(!empty($images))
                                    {
                                      foreach ($images as $key => $value) {
                                    
                                  ?>
                                        
                                          <img src="<?php echo __base_url.'product_images/'.$value;?>" alt="<?=$singleproduct['product_name']?>" height="30px" width="30px">
                                        
                                  <?php
                                      }
                                    }
                                  ?>
                              </td>
                              <td>
                                <?php 
                                  if(empty($singleproduct['product_available_stores']))
                                    echo "Not available store";
                                  else
                                    echo $singleproduct['product_available_stores']['store_name']; 
                        
                                ?>
                              </td>
                              <td><?=$singleproduct['wishlist_date']?></td>
                            </tr>
                    <?php
                    
                        }         
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                <?php
                  if(count($products)==0)
                    {
                ?>
                      <h3>Don't have any products in wishlist</h3>
                <?php
                    }
                ?>
              </div>
              <!-- /row -->

              

              
            
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
        $('#wishListTbl').DataTable({
			    responsive: true
        });
    });
    </script>
     

  </body>

</html>



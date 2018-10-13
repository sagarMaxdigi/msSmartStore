<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Store";
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
            Assign Products To Store
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Assign Products To Store</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php 
            extract($_GET);
            //print_r($_GET);
            if(isset($store_id))
            {
                $filter = array("store_id"=>$store_id,"show_q"=>"false");
                $mapping = getProductMapping($filter);
                //print_r($mapping);
				$store_products=array();
                foreach ($mapping as $map) {
                    $store_products[] = $map['mapping_product_id'];
                }
                /*echo '<pre>';
                print_r($mapping);*/
            }
			else
				die();
        ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <a href="store_product.php?store_id=<?php echo $store_id ?>" class="btn btn-success">Back</a>
                        </div>
                        
                        <div class="box-header with-border">
                        <form action="store_add_products.php" method="get">
                        <input type="hidden" name="store_id" value="<?php echo $store_id ?>">
                        <div class="col-md-2">
                        <?php
						$subcategories=getAllSubCategories();
						?>
                        <select class="form-control" name="sub_category">
                        <?php
							foreach($subcategories as $subcategory)
							{
						?>   
                        		<option value="<?php echo $subcategory['subcategory_id'] ?>"><?php echo $subcategory['subcategory_name'] ?></option>
                        <?php
							}
						?>                     
                        </select>
                        </div>
                        <div class="col-md-2">
                        	<input type="submit" class="btn btn-success" value="Search Product">
                        </div>
                        </form>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <?php
						if(isset($sub_category) && $sub_category!="")
						{
						?>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                    <div class="col-md-1">ID</div>
                                    <div class="col-md-2">Product</div>
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-1">MRP</div>
                                    <div class="col-md-4">Store Price</div>
                                    </th>
                                </tr>                                
                            </thead>
                            <tbody>
                                <?php 
								$filter=array("subcategory_id"=>$sub_category,"product_color_tbl"=>"product_color");
                                 $products = getAllProducts($filter);
                                 //$products = getProduct($filter);
                                 
                                    foreach ($products as $prod) {
                                        //print_r($prod);
                                        $images = explode(',',$prod['image']);

                                        if(in_array($prod['product_id'], $store_products))
                                        {
                                            continue;
                                        }
                                ?>
                            <tr>
                                <td>
                                    <form action="store_product_save.php" class="form_group" method="post">
                                        <input type="hidden" name="sub_category" value="<?php echo $sub_category?>">
                                        <input type="hidden" name="mapping_store_id" value="<?php echo $store_id?>">
                                        <input type="hidden" name="mapping_product_id" value="<?php echo $prod['product_id']?>">
                                        <input type="hidden" name="product_mrp" value="<?php echo $prod['product_mrp']?>">
                                        <div class="col-md-1"><?php echo $prod['product_id'];  ?></div>
                                        <div class="col-md-2">
                                        <?php
                                            foreach ($images as $key => $value) {
                                        ?>
                                            <img src="<?=__base_url?>product_images/<?=$value?>" width="100px">
                                        <?php
                                            }
                                        ?>
                                        </div>
                                        <div class="col-md-3"><?php echo $prod['product_name'];  ?></div>
                                        <div class="col-md-1"><?php echo $prod['product_mrp'];  ?></div>
                                        <div class="col-md-2">
                                            <input type="text" name="mapping_product_offerprice" placeholder="Store Offer Price" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-xs btn-warning" value="Assign Product">
                                            <span>
                                                <p class="text-danger">
                                                    <?php
                                                        if(isset($_GET['saved']) && $_GET['saved'] == 'false' && $_GET['product_id'] == $prod['product_id'] && $_GET['sub_category'] == $sub_category)
                                                        {
                                                        ?>
                                                            &nbsp;Store price should be less than MRP
                                                        <?php
                                                        }
                                                    ?>
                                                    
                                                </p>
                                            </span>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                                                                
                            <?php } 
                           // print_r($products);
                            ?>
                            </tbody>
                        </table>
                      	<?php
						}
						?>
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
            responsive: true,
            sorting: false
        });
    });
    </script>

  </body>

</html>


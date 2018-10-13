<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Product";

     
            extract($_GET);
            /*print_r($_GET);
            if(isset($store_id))
            {
                $filter = array("store_id"=>$store_id,"show_q"=>"false");
                $mapping = getProductMapping($filter);
                //print_r($mapping);
                $store_products=array();
                foreach ($mapping as $map) {
                    $store_products[] = $map['mapping_product_id'];
                }
            }*/
            


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
            Products
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products Details</li>
          </ol>
        </section>
        <!-- Main content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">


                        <div class="box-header with-border">

                            <form action="products.php" method="get">
                                <!-- <input type="hidden" name="store_id" value="<?php echo $store_id ?>"> -->
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



                        <a href="product_add.php" class="btn btn-success pull-right">Add Products</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>SPL</th>
                                    <th>Priority</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <!-- <th>Size</th>
                                    <th>Color</th> -->
                                    <th>Price</th>
                                    <th>Stores</th>
                                    <!-- <th>Description</th> -->
                                    <!-- <th>Highlights</th> -->
                                    <th width="10%">Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($sub_category))
                            {
                                $filter = ['subcategory_id' => $sub_category];
                                $products = getAllProducts($filter);
                            }
                            else
                            {
                                $products = getAllProducts();
                            }
                            
                            $count = 0;
                            foreach ($products as $product) {
								extract($product);
                                $count++;
                             $category = getSubCategory($product['product_category']);
                            ?>                            
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?php 
									if($product['product_special']=="true")
									{
										$file="star-on.png";
										$change="false";
									}
									else
									{
										$file="star-off.png";
										$change="true";
									}
									?>
                                    <a href="product_save.php?product_id=<?php echo $product['product_id']?>&special=<?php echo $change?>">
                                    <img src="../dist/img/<?php echo $file ?>">
                                    </a>
                                    </td>
                                     <td class="text-center">
                                        <?php
                                            if($product['product_priority'] == 1)
                                            {
                                        ?>      
                                                <a href="javascript:void(0)" onClick="priority(0,<?=$product['product_id']?>)" class="btn btn-xs btn-success"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></a>
                                        <?php
                                            }
                                            else 
                                            {
                                        ?>
                                                <a href="javascript:void(0)" onClick="priority(1,<?=$product['product_id']?>)" class="btn btn-xs btn-info"><i class="fa fa-angle-double-up fa-2x" aria-hidden="true"></i></a>
                                        <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    <td><?php echo $product_code;  ?></td>
                                    <td><?php echo $product_name;  ?></td>
                                    <td><?php echo $category['subcategory_name'];  ?></td>
                                   <!--  <td style="text-transform: uppercase;"><?php echo $product_size;  ?></td>
                                    <td style="text-transform: uppercase; width: 4%;"><?php echo $product_color;  ?></td> -->
                                    <td><?php echo $product_mrp ;  ?></td>
                                    <td>
                                        <?php 
                                            if(empty($product['product_available_stores']))
                                                echo "<p class = 'text-warning'>Not available in store</p>";
                                            else
                                                print_r($product['product_available_stores']['store_name'].'<br/>('.$product['product_available_stores']['city_name'].')') ;

                                            //print_r($product['product_available_stores']); 
                                            /*foreach ($product['product_available_stores'] as $key => $value) {
                                                 echo $value;
                                             } */
                                        ?>
                                    </td>
                                    <!-- <td><?php echo $product_desc;  ?></td> -->
                                    <!-- <td><?php echo $product_highlights;  ?></td> -->
                                    <td>
                                    <a href="product_view.php?product_id=<?php echo $product['product_id']?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="product_edit.php?product_id=<?php echo $product_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    
                                    <a href="javascript:void(0)" onClick="deleteentry(<?php echo $product_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    
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
		include_once("js.php");
	?>
    
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example2').DataTable({
			responsive: true,
			pageLength:100,
			ordering:false
        });
    });
    
    function deleteentry(product_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="product_delete.php?eid="+product_id;
        }
    }

    function priority(pri_val,product_id)
    {
        console.log(pri_val+'  '+product_id);
        $.ajax({
            url:"<?=__base_url?>system/admin/product_save.php",
            type:'get',
            data: {pri_val:pri_val,product_id:product_id},
            success: function(res)
            {
                
                obj = JSON.parse(res);
                console.log(obj.load_link);
                window.location.href = obj.load_link 
            }
        });
    }
</script>

  </body>

</html>


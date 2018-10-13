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
                                    <th width="5%">Sr.No.</th>
                                    <th width="5%">SPL</th>
                                    <th width="5%">Priority</th>
                                    <th width="5%">Code</th>
                                    <th width="30%">Name</th>
                                    <th width="20%">Category</th>
                                    <th width="7%">Price</th>
                                    <th width="7%">Stores</th>
                                    <th width="8%">Action</th>
                                    <th >
                                    <!-- Start, Edited by Atish on 30th Sept, 2018 -->                                        <input name="prodt_all" id="prodt_all" type="checkbox">&nbsp;Select all<!-- &nbsp;Select All&nbsp; -->
                                        <button id="delBtn" class="btn btn-xs btn-danger">Delete</button> 

                                    <!-- End, Edited by Atish on 30th Sept, 2018 -->
                                    </th>
                                </tr>                           
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($sub_category))
                            {
                                $filter = ['subcategory_id' => $sub_category];
                                $products = getAllProductsShow($filter);
                                
                            }
                            else
                            {
                                $products = getAllProductsShow();
                                
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
                                    <!-- <td style="text-transform: uppercase;"><?php echo $product_size;  ?></td> -->
                                    <!-- <td style="text-transform: uppercase; width: 4%;"><?php echo $product_color;  ?></td> -->
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
                                    <!-- <a href="product_image.php?product_id=<?php echo $product['product_id']?>" class="btn-xs btn-default">Upload Images</a><br/> -->
                                    <a href="product_view.php?product_id=<?php echo $product['product_id']?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                                    <a href="product_edit.php?product_id=<?php echo $product_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    
                                    <!-- <a href="javascript:void(0)" onClick="deleteentry(<?php echo $product_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                </td>
                                <td> <input class="checkbox minimal-red" name="product" type="checkbox" id="mulDel" value="<?=$product_id?>"><!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>&nbsp;</a> --></td>
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

        //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    
    });
    
    $('#prodt_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });

        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('#prodt_all').prop('checked',true);
            }else{
                   $('#prodt_all').prop('checked',false);
            }
        });

        $('#delBtn').on('click',function(){ //Edited by Atish on 30th Sept, 2018
            var chk = [];
            $.each($("input[name='product']:checked"), function(){            
                chk.push($(this).val());
            });
            if(chk=='')
            {
                alert('Please select product.');
            }
            else
            {
                var cnfrm = confirm("Are You Sure?");
                if(cnfrm == true)
                {
                    var products = [];
                    $.each($("input[name='product']:checked"), function(){            
                        products.push($(this).val());
                    });
                    document.location="product_delete.php?prodt_ids="+products;
                }
                
            }
            


            //var store_ids = $('#mulDel').val();
            
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

        // console.log(pri_val+'  '+product_id);
        $.ajax({
            url:"<?=__base_url?>system/admin/product_save.php",
            type:'get',
            data: {pri_val:pri_val,product_id:product_id},
            success: function(res)
            {
                
                // obj = JSON.parse(res);
                // console.log(obj.load_link);
                // window.location.href = obj.load_link 
                    location.reload();
            }
        });
    }
</script>

  </body>

</html>


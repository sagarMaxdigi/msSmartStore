<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Store";
?>
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

        <?php
        if(isset($_GET['alert']) && $_GET['alert']!="") //Added by Atish on 1st Oct, 2018
        {
        ?>
            <div style="padding:5px; background-color:red; color:#FFF">
                <p align="center"><?=$_GET['alert']?></p>
            </div>
        <?php
        }
        ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Store Products
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Products </li>
          </ol>
        </section>
        <!-- Main content -->

        <!-- Start, Atish on 30th Setp. 2018 -->
        <?php  
            extract($_GET);
			$mapping=array();

            


            if(isset($store_id) || isset($sub_category))
            {
                if(isset($sub_category))
                {
                    $filter = ['store_id'=>$store_id , 'show_q'=>'false','mapping_subcategory_id' => $sub_category];
                }
                else
                {
                    $sub_category = '';
                    $filter = array("store_id"=>$store_id , "show_q"=>"false");                    
                }
                $mapping = getProductMapping($filter);
            }
        ?>
        <!-- End, Atish on 30th Setp. 2018 -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="store_report.php" class="btn btn-success">Back</a>
                            <a href="store_add_products.php?store_id=<?php echo $store_id ?>" class="btn btn-success">Assign Products</a>
                        <!-- Start, Atish on 30th Setp. 2018 -->    
                        <br/><br/>
                        <div>
                            <form action="store_product.php" method="get">
                                
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
                                    <input type="hidden" name="store_id" value="<?=$store_id?>"> <!-- Add by Atish on 30th Sept, 2018 -->
                                </div>
                            </form>


                        </div><!-- /.box-header -->
                        <br/><br/>
                        <!-- End, Atish on 30th Setp. 2018 -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Code</th>
                                    <th>Product</th>
                                    <th>MRP</th>
                                    <th>Store Price</th>
                                    <th >
                                    <!--Start, Added by Atish on 30th Sept, 2018 -->
                                        <input name="str_prodt_all" id="str_prodt_all" type="checkbox">&nbsp;<span>Select all</span>
                                        &nbsp;&nbsp;<button id="strDelBtn" class="btn btn-xs btn-danger">Delete</button>
                                        <!-- &nbsp;Select All&nbsp; --> 
                                </th>
                                    <!--End, Added by Atish on 30th Sept, 2018 -->
                                </tr>                                
                            </thead>
                            <tbody>
                            <?php 
							$i=1;
							$productArray = array();
                            foreach ($mapping as $map) {

                            $product = getProduct($map['mapping_product_id']);
                           
                            foreach ($product as $key => $value) {
                                $productArray = $value;
                            }
                            ?>
                                <tr>
                                    <td><?php echo $i++;  ?></td>
                                    <td><?php echo $productArray['product_code'];  ?></td>
                                    <td><?php echo $productArray['product_name'];  ?></td>
                                    <td><?php echo $productArray['product_mrp'];  ?></td>
                                    <td><?php echo $map['mapping_product_offerprice']; ?></td>
                                    <td>
                                    

                                    
                                    <input class="checkbox minimal-red" name="str_product" type="checkbox" id="mulDel" value="<?=$map['mapping_product_id']?>">
                                   <!--Start, Added by Atish on 30th Sept, 2018 -->
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

    $('#str_prodt_all').on('change', function() {     //Added by Atish on 30th Sept, 2018
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });

        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('#str_prodt_all').prop('checked',true);
            }else{
                   $('#str_prodt_all').prop('checked',false);
            }
        });

        $('#strDelBtn').on('click',function(){//Edited by Atish on 30th Sept, 2018
            var chk = [];
            $.each($("input[name='str_product']:checked"), function(){            
                chk.push($(this).val());
            });

            console.log(chk);
            if(chk=='')
            {
                alert('Please select product.');
            }
            else
            {
                var cnfrm = confirm("Are You Sure?");
                if(cnfrm == true)
                {
                    var str_products = [];
                    $.each($("input[name='str_product']:checked"), function(){            
                        str_products.push($(this).val());
                    });
                    document.location='product_delete.php?store_prodt_ids='+str_products+'&sub_category=<?=$sub_category?>&store_id=<?=$store_id?>';
                }
            }
                        
        });


    function deleteentry(mapping_id,store_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="store_product_delete.php?eid="+mapping_id+"&store_id="+store_id;
        }
    }
</script>

  </body>

</html>


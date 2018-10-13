<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include_once("checksession.php");
	include_once("../connection.php");
	include_once("../functions.php");
	$title="Store";
    extract($_GET); 

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
        <?php

        if(isset($alert))
        {//Added by Atish on 1st Oct, 2018

        ?>
                <div style="padding:5px; background-color:red; color:#FFF">
                    <p align="center">You cannot delete this store. Please delete all products of this store then try.</p>
                </div>
            
        <?php
        }
        ?>
        <section class="content-header">
          <h1>
            Store
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Details</li>
          </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="store_add.php" class="btn btn-success">Add Store</a>
                        
                        </div>
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>SPL</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <!-- <th>Address</th> -->
                                    <th>City</th>
                                    <th>Landmark</th>
                                    <th>Action</th>
                                    <th>
                                        
                                        <input name="store_all"  id="store_all" type="checkbox">&nbsp;Select all
                                        <button id="delBtn" class="btn btn-xs btn-danger">Delete</button></th>
                                </tr>                                
                            </thead>
                            <tbody>
                            <?php 
                            $stores = getAllStores();
                            $sr_no = 0;
                            foreach ($stores as $store) {
                                extract($store);
                                $sr_no++;
                            $city_name = getCity($store_city);
                            extract($city_name);
                            ?>
                            
                                <tr>
                                    <td><?=$sr_no?></td>
                                    <td><?php 
                                    if($store_status==1)
                                    {
                                        $file="star-on.png";
                                        $change=0;
                                    }
                                    else
                                    {
                                        $file="star-off.png";
                                        $change=1;
                                    }
                                    ?>
                                    <a href="store_active.php?store_id=<?php echo $store_id?>&special=<?php echo $change?>">
                                    <img src="../dist/img/<?php echo $file ?>">
                                    </a>
                                    </td>
                                    <td><?php echo $store_code;  ?></td>
                                    <td><?php echo $store_name;  ?></td>
                                    <td><?php echo $store_email;  ?></td>
                                    <td><?php echo $store_contact1;  ?> / <?php echo $store_contact2;  ?></td>
                                    
                                   <!--  <td><?php //echo $store_address1.' '.$store_address2.' '.$store_address3;  ?></td> -->
                                    <td><?php echo $city_name;  ?></td>
                                    <td><?php echo $store_landmark;  ?></td>
                                    <td>
                                        
                                    <a href="store_view.php?store_id=<?php echo $store_id?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                                    <a href="store_edit.php?store_id=<?php echo $store_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                    <!-- <a href="javascript:void(0)" onClick="deleteentry(<?php echo $store_id?>)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->


                                    <br/>
                                    <!-- <a href="store_media.php?store_id=<?php // echo $store_id; ?>" class="btn btn-xs btn-default">Upload Media</a> -->
                                    <a href="store_product.php?store_id=<?php echo $store_id; ?>" class="btn btn-xs btn-default">Store Products</a>

                                    
                                </td>
                                <td> <!-- <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>&nbsp; --><input class="checkbox minimal-red" name="store" type="checkbox" id="mulDel" value="<?=$store_id?>"></a></td>
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
			responsive: true
        });

        $('#store_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });

        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('#store_all').prop('checked',true);
            }else{
                   $('#store_all').prop('checked',false);
            }
        });

        $('#delBtn').on('click',function(){
            var strChk = [];
            $.each($("input[name='store']:checked"), function(){            
                strChk.push($(this).val());
            });

            if(strChk=='')
            {
                alert('Please select store.');
            }
            else
            {
                var cnfrm = confirm("Are You Sure?");
                if(cnfrm == true)
                {
                    var stores = [];
                    $.each($("input[name='store']:checked"), function(){            
                        stores.push($(this).val());
                    });
                    document.location="store_delete.php?stro_ids="+stores;
                }
                
            }


            


            //var store_ids = $('#mulDel').val();
            
        });

    });

    function deleteentry(store_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="store_delete.php?eid="+store_id;
        }
    }
</script>

  </body>

</html>


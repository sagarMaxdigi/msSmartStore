<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once("checksession.php");
include_once("../connection.php");
include_once("../functions.php");
$title="Product";
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
          Product Additional Informations
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Products</li>
        </ol>
      </section>
      <!-- Main content -->
      <?php
      extract($_GET);
      if(isset($product_id))
      {
         $products=getProduct($product_id);
         $product_color = getProductColor($product_id);

         if(!empty($product_color))
         {
            $prodColor_array = array();
            foreach ($product_color as $key => $value) {
              $prodColor_array = $value;
            }
         }
         else
         {
            $prodColor_array = '';
         }
         
          $prod_array = array();
          foreach ($products as $key => $value) {
            $prod_array = $value;
          }
      }


      ?>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">
                <div class="box-header with-border">

                  <span class="pull-left"> <h3>Product Name </h3>
                    <h4><?php echo $prod_array['product_name'] ?></h4></span>

                  <a href="products.php" class="btn btn-primary pull-right">Back</a>
                </div><!-- /.box-header -->

                <div class="row">
                  <div class="col-md-12">
                    <br>

                   <form action="product_image_save.php" id="saveProduct" method="post" enctype="multipart/form-data">
                    <div class="row">    
                      <div class="form-group col-md-6">
                        <label>Color <span class="star"> * </span></label>
                        <select class="form-control " id="product_color" data-placeholder="Select Color" name="product_color" required>
                          <?php 
                          $colors = getAllColors();

                          foreach ($colors as $color) {
                            extract($color);
                            if($color_name==$prodColor_array['color'])
                            {
                              $selected = 'selected';
                            }
                            else
                            {
                              $selected = '';
                            }


                            ?>
                            <option <?=$selected?> value="<?php echo $color_name ?>"><?php echo $color_name ?></option>
                          <?php } ?>
                        </select>
                        <span class="err"></span>

                      </div>
                      <div class="form-group col-md-6">
                        <label>Size <span class="star"> * </span></label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Size" name="product_size[]" required>
                          <?php 
                          $sizes = getAllSizes();
                          foreach ($sizes as $size) {
                            extract($size);
                            if($size_name==$prodColor_array['size'])
                            {
                              $selected = 'selected';
                            }
                            else
                            {
                              $selected = '';
                            }

                            ?>
                            <option <?=$selected?> value="<?php echo $size_name ?>"><?php echo $size_name ?></option>
                          <?php } ?>
                        </select>
                        <br>
                        <br>

                      </div>  

                      <div class="form-group col-md-6">
                          <label>Image</label>
                          <input type="file" class="form-control" placeholder="Product Name" name="product_image[]" multiple="" required>
                        </div>                          
                      <div class="form-group col-md-6">
                        <br><br>
                        <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
                        <input type="hidden" name="product_code" value="<?php echo $prod_array['product_code']?>">
                        <input type="submit" name="submit" class="btn btn-success pull-right" value="Save">
                      </div>
                    </div>
                    <!-- <div class="row">
                      
                    </div> -->
                  </form>
                  </div>
                </div>
              </div>
            </div>

           </div><!-- /.box -->

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">Sr.No.</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Images</th>
                                    <th width="5%">Action</th>
                                </tr>                           
                            </thead>
                            <tbody>
                              <?php 
                              if($product_color){
                                foreach ($product_color as $key => $value) {  
                                ?>
                                <tr>
                                  <td><?php echo ++$key; ?></td>
                                  <td><?php echo $value['color']; ?></td>
                                  <td><?php echo $value['size']; ?></td>
                                  <td>
                                    <?php
                                    if($value['image']){
                                    $images = explode(',', $value['image']);
                                    foreach ($images as $k => $img) {
                                      ?>
                                      <img src="<?php echo __base_url.'product_images/'.$img;?>" height="30px" width="30px">  
                                      <?php
                                    }
                                    }
                                    ?>
                                    </td>
                                    <td><button class="btn btn-danger btn-xs" id="deleteColor" value="<?php echo $value['id']; ?>"><i class="fa fa-trash"></button></td>
                                  
                               </tr>   
                                <?php
                                }
                              }
                              ?>
                               
                            </tbody>
                        </table>
                  </div>  
                  <div class="clearfix"></div>
                  <!-- /.box-body -->
                </div><!-- /.box -->

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


                $("#saveProduct").submit(function(){
                  $(".err").html('');
                  var pid = <?php echo $_GET['product_id']?>;
                  var product_color = $('#product_color').val();
                  var flag='0';
                  $.ajax({
                      type: 'post',
                      url: "../functions.php?xAction=isexistProductColor&productId="+pid+"&color="+product_color,
                      async:false,
                      success: function (data) {
                         if(data>=1){
                              $( ".err" ).append("This product name is already exist");
                              flag='1';
                         }
                      }
                  });
                     
                  if(flag==='1')
                    return false;
                  else
                     return true;
              });


              $('#deleteColor').click(function(){
                var color_id = $(this).attr('value');
                  $.ajax({
                      type: 'post',
                      url: "../functions.php?xAction=deleteColor&color_id="+color_id,
                      async:false,
                      success: function (data) {
                         if(data=='ok'){
                              window.location.reload();
                         }
                         else{
                            alert('Something Went Wrong');
                         }
                      }
                  });
              });
 
              });
               $(function () {
                $(".select2").select2();
              });
            </script>
            <script src="../plugins/select2/select2.full.min.js"></script>

          </body>

          </html>
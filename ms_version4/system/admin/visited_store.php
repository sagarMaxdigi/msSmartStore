<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include_once("checksession.php");
    include_once("../connection.php");
    include_once("../functions.php");
    $title="Store Report";
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
            Store Enquiry Report
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Enquiry Report</li>
          </ol>
        </section>
        <!-- Main content -->
        <?php 
            extract($_GET);
            
            
              $store=getStore($sid);
              $filter=array("store_id"=>$sid);
              $reviews=getAllStoreReviews($filter);

        ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box" id="print_div">
                        <div class="box-body">

                          <!--  Product Details -->
                          <div class="store store-details clearfix">
                            <div class="col-md-12">
                                        <img src="<?=__base_url?>store_images/<?=$store['store_banner']?>" width="100%">
                                          
                                          <hr>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="store-body">
                                <h2 class="store-name"><?php echo $store['store_name'] ?></h2>
                                <?php
                                  $tle_rating = 0;
                                  if(count($reviews)>0)
                                  {
                                    foreach($reviews as $review)
                                    {
                                      $tle_rating = $tle_rating+$review;
                                    }
                                    $avg = round($tle_rating/count($reviews),1);
                                    $lim = round($avg, 0, PHP_ROUND_HALF_DOWN);
                                  }
                                  else
                                  {
                                    $avg=$lim=0;
                                  }
                                    
                                ?>  
                                <div>
                                  <div class="product-rating">
                                    <?php
                                      for ($i=0; $i < 5; $i++) { 
                                        if($lim > $i)
                                        {
                                          $star = 'fa-star';
                                        }
                                        else
                                        {
                                          $star = 'fa-star-o empty';
                                        }
                                    ?>
                                        <i class="fa <?=$star?>"></i>
                                    <?php
                                      }
                                    echo '&nbsp;'.$avg;
                                    ?>
                                  </div>

                                  <p>
                                    <a class="text-info"><?php echo '(&nbsp;'.count($reviews); ?> Customer Rating&nbsp;)</a>
                                  </p>
                                </div>

                                              <div class="store-contact">
                                                  <?php 
                                                  if($store['store_contact1']!="")
                                                  {
                                                      echo $store['store_contact1'];
                                                      
                                                      if($store['store_contact2']!="")
                                                          echo " / ";
                                                  }
                                                  
                                                  if($store['store_contact2']!="")
                                                  {
                                                      echo $store['store_contact2'];
                                                  }
                                                  ?>
                                              </div>
                                              
                                              <div class="store-address">
                                                  <?php 
                                                  if($store['store_address1']!="")
                                                      echo $store['store_address1'].",";
                                      
                                                  if($store['store_address2']!="")
                                                      echo $store['store_address2'].",";
                                      
                                                  if($store['store_address3']!="")
                                                      echo $store['store_address3'].",";

                                  $city = getCity($store['store_city']);
                    
                                                  echo "<br>".$city['city_name'];
                                                  ?>
                                              </div>
                                              
                                              <div class="store-map-button">
                                              <a href="<?php echo $store['store_location_url']  ?>" target="_blank"><strong>View Map</strong></a>
                                              </div>

                              </div>
                            </div>
                            

                          </div>
                          <!-- /Product Details -->
                          <hr/>

                            <div class="row">


                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                                      <label>Select</label>     
                                      <select class="form-control" name="showOrderWise" id="showOrderWise"  >
                                        <option value="all">All Stores</option>
                                        <option value="today">Today</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="month">Mothly</option>
                                        <option value="year" >Yearly</option>
                                        <option value="betDate">Between Dates</option>
                                      </select>
                                       
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12 hide" >
                                      <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>From</label> 
                                          <input type="date" id="fromDate" name="fromDate" class="form-control">
                                        </div>
                                      </div>
                                    </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12 hide" >
                                      <div class="form-group">
                                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Month</label> -->
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Month</label> 
                                          <select class="form-control" name="selectMonth" id="selectMonth"  >
                                            <option>Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">Octomber</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                            
                                          </select>
                                        </div>
                                      </div>
                                    </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12 hide" >
                                      <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>To</label>
                                          <input type="date" id="toDate" name="toDate" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-2 col-xs-12 hide" >
                                      <div class="form-group">
                                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">To</label> -->
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                          <label>Year</label> 
                                          <select class="form-control" name="selectYear" id="selectYear"  >
                                            <?
                                            $startdate = date("Y")-30;
                                            $enddate = date("Y");
                                            $years = range ($startdate,$enddate);
                                            foreach($years as $year)
                                            {
                                            ?>
                                              <option value="<?=$year?>"><?=$year?></option>
                                            <?php
                                            }
                                            ?>
                                            
                                          </select>
                                        </div>
                                      </div>
                                    </div>                              
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right" >
                                  <div class="form-group">
                                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">To</label> -->
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <div class="pull-right"><button class="btn btn-info" onclick="printDiv('print_div')"><i class="fa fa-print"></i> Print</button></div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                        <table id="StorEnqRpt" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>Contact No.</th>
                                    <th>Email</th>
                                    <th>Product</th>
                                    <th>Product code</th>
                                    <th>MRP</th>
                                    <th>Date</th>
                                    
                                </tr>                                
                            </thead>
                            <tbody>
                              <?php                                
                                $count = 0;  
                                $prod_enq = getEnquiry($store['store_id']);
                              

                                foreach ($prod_enq as $key => $value) {
                                  $count++;
                                
                                
                              ?>
                              <tr>
                                  <td><?=$count?></td>
                                  <td><?=$value['customer_name']?></td>
                                  <td><?=$value['member_contact']?></td>
                                  <td><?=$value['customer_email']?></td>
                                  <td>
                                    <p><!-- <img height="30" width="60" src="<?=__base_url?>product_images/<?=$value['product_img1']?>">&nbsp; -->
                                      <?=$value['product_name']?></p>
                                  </td>
                                  <td><?=$value['product_code']?></td>
                                  <td><?=$value['product_mrp']?></td>
                                  <td><?=date('dS M, Y | h:i:s',strtotime($value['customer_ondate']))?></td>
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


        var month     = '<?=date("m")?>';
        var year      = '<?=date("Y")?>';
        var types     = 'today';
        var today     = '<?=Date("Y-m-d")?>';
        var fromDate  = '<?=Date("Y-m-d")?>';
        var toDate    = '<?=Date("Y-m-d")?>';


    $(document).ready(function() {
        $('#StorEnqRpt').DataTable({
            responsive: true
        });


            

            $('#showOrderWise').on('change', function ()
            {
              types = this.value;
              if(types == 'weekly')
              {
                $('#selectYear').parent().parent().parent().addClass('hide');
                $('#selectMonth').parent().parent().parent().addClass('hide');
                $('#fromDate').parent().parent().parent().removeClass('hide');
              }
              else if(types == 'month')
              {
                $('#selectMonth').parent().parent().parent().removeClass('hide');
                $('#fromDate').parent().parent().parent().addClass('hide');
              }
              else if(types == 'year')
              {
                $('#selectYear').parent().parent().parent().removeClass('hide');
                $('#selectMonth').parent().parent().parent().addClass('hide');

                $('#fromDate').parent().parent().parent().addClass('hide');
                $('#toDate').parent().parent().parent().addClass('hide');
              }
              else if(types == 'betDate')
              {
                $('#fromDate').parent().parent().parent().removeClass('hide');
                $('#toDate').parent().parent().parent().removeClass('hide');
                $('#selectMonth').parent().parent().parent().addClass('hide');
                $('#selectYear').parent().parent().parent().addClass('hide');
              }
              else
              {
                $('#fromDate').parent().parent().parent().addClass('hide');
                $('#toDate').parent().parent().parent().addClass('hide');

                $('#selectMonth').parent().parent().parent().addClass('hide');
                $('#selectYear').parent().parent().parent().addClass('hide');
                //var data = {type:types,date1:today,table:'store'};
                var data = {type:types,fromDate:today,table:'customer_enquiry',month:month,year:year,fromDate:fromDate,toDate:toDate,sid:'<?=$sid?>'};
                retriveOrderList(data);
              }
            })
         
            $('#selectMonth').on('change', function ()
          {
            $('#selectYear').parent().parent().parent().removeClass('hide');
            month = this.value;
            var data = {type:types,fromDate:today,table:'customer_enquiry',month:month,year:year,fromDate:fromDate,toDate:toDate,sid:'<?=$sid?>'};
            retriveOrderList(data);
          })

          $('#selectYear').on('change', function ()
          {
            year = this.value;
            var data = {type:types,fromDate:today,table:'customer_enquiry',month:month,year:year,fromDate:fromDate,toDate:toDate,sid:'<?=$sid?>'};
            retriveOrderList(data);
          })
          
          $('#fromDate').on('change', function ()
          {
            fromDate = this.value;
            if(types == 'weekly')
              {
                var data = {type:types,fromDate:fromDate,table:'customer_enquiry',month:month,year:year,fromDate:fromDate,toDate:toDate,sid:'<?=$sid?>'};
                retriveOrderList(data);
              }
          });
          
          $('#toDate').on('change', function ()
          {
            toDate = this.value;
            var data = {type:types,fromDate:fromDate,table:'customer_enquiry',month:month,year:year,toDate:toDate,sid:'<?=$sid?>'};
            retriveOrderList(data);
          });

          function retriveOrderList(data)
          {
            
                var trow = $('#StorEnqRpt').DataTable();
                trow.clear().draw();
                $.ajax({
                  url:'<?=__base_url?>system/admin/order_show_wise.php',
                  type:'post',
                  data:data,
                  success:function(data)
                  {
                    
                    var json_obj = JSON.parse(data);
                    $.each(json_obj,function(index,val)
                    {
                      var d = "<tr>"+
                                "<td>"+(parseInt(index+1))+"</td>"+
                                "<td>"+val.customer_name+"</td>"+
                                "<td>"+val.member_contact+"</td>"+
                                "<td>"+val.customer_email+"</td>"+
                                "<td align='center'>"+
                                    "<p>"+/*"<img height='30' width='60' src='<?=__base_url?>product_images/"+val.product_img1+"'>&nbsp;"*/val.product_name+"</p>"+
                                "</td>"+
                                "<td>"+val.product_code+"</td>"+
                                "<td>"+val.product_mrp+"</td>"+
                                "<td><?=date('dS M, Y | h:i:s',strtotime("+val.customer_ondate+"))?></td>"+
                              "</tr>"; 

                      trow.row.add($(d)).draw();
                    });
                  }
                });
          }



    });
       
    $('#date').datepicker({
        autoclose: true,
        format : 'yyyy-m-dd',
    });

    function deleteentry(customer_id)
    {
        if(confirm("Sure to delete?")==true)
        {
            document.location="customer_delete.php?eid="+customer_id;
        }
    }

    function printDiv(divName)
    {

        var printContents = document.getElementById(divName).innerHTML;

        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        document.location.reload();
    }

  </script>

  </body>

</html>

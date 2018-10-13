<?php	
	include_once("head.php");
?>
<body>
	<?php
        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");
	?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Location</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
            <?php
			extract($_GET);
			if(!isset($pincode))
			{
				$pincode=$query['zip'];
			}
			?>
				<form action="location.php" method="get"  class="clearfix">
					<div class="col-md-6">                    
						<div class="billing-details">
							
							<div class="section-title">
								<h3 class="title">Enter your pincode here</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" value="<?=$pincode?>" required placeholder="Area Pincode">
							</div>
						</div>
					</div>

					<div class="col-md-12">
                        <input type="submit" class="primary-btn" value="Search Stores Now">
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    
    <?php
	if(isset($pincode) && $pincode!="")
	{
	?>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Available at Stores Near You</h2>
					</div>
				</div>
				<!-- section title -->

                <?php
					$filter = array("pincode" => $pincode);
					$stores = getAllStores($filter);
															
					//print_r($storelist);
					if($stores)
					{


                    	foreach($stores as $store)
                    	{
							$_store_id=$store['store_id'];
                ?>
                			<div class="col-md-4 col-sm-6 col-xs-6">                
                <?php
					//print_r($store);    
					//echo $store['store_name'];
								include("singlestore.php");
                ?>                
                			</div>                
                <?php
                    	}
                    }
                    else
                    {
                ?>
                			<div class="col-md-4 col-sm-6 col-xs-6"> 
								<p class="text-danger">No any store available at <b><?=$pincode?></b></p>
							</div>
                <?php
                    }
                ?>

            </div>
            <!-- row -->
        </div>
	    <!-- container -->
	</div>
	<!-- section -->
    <?php
	}

	?>
	
<?php
	include_once("footer.php");
	include_once("js.php");
?>

</body>

</html>

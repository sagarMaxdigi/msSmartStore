<?php
	$_force_session="true";

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
				<li><a href="index.php">Home</a></li>
				<li class="active">My Wishlist</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Your Wishlist</h2>
					</div>
				</div>
				<!-- section title -->

                <?php
                    $products=getMemberFavriteProducts($_member_id);

					
                    for($i=0;$i<count($products);$i++)
                    {
                        $_product_id=$products[$i];
                ?>
                <div class="col-md-3 col-sm-6 col-xs-6">                
                <?php
					include("singleproduct.php");
                ?>                
                </div>                
                <?php
                    }					
                    
                ?>
                
                <?php
					if(count($products)==0)
					{
				?>
                		<h3>You dont have any products in wishlist</h3>
                <?php
					}
				?>

			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php
	include_once("footer.php");
	include_once("js.php");
?>

</body>

</html>

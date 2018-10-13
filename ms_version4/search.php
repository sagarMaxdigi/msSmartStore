<?php
	//include_once("checksession.php");
	include_once("head.php");

?>
<body>
	<?php
        
        if(isset($_POST [ 'search_qry' ]))
        {
        	//$button = $_POST [ 'search' ];
	        $search_qry= $_POST [ 'search_qry' ]; 
	        if( !$search_qry) 
	        	$error = "<p class='alert alert-danger'>you didn't submit a keyword</p>"; 
	        else 
	        	{ 
	        		if( strlen( $search_qry) <= 1 ) 
	        			$error = "<p class='alert alert-danger'>Search term too short</p>"; 
	        		else 
	        			{ 
	        				$success = "<p>You searched for <b> $search_qry</b><p>"; 
	        				$filter=array("search"=>$search_qry);
                    		$products=getAllProducts($filter);
	        				
	        			} 
	        	}
        }


        include_once("top-header.php");
		$show_on_click="show-on-click";
        include_once("navigation.php");

        

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
						<h2 class="title"><p><?php if(isset($success)) echo $success; else echo 'Not found'?></p></h2>
					</div>
				</div>
				<!-- section title -->

                <?php
                    
                    
                   if(isset($products) && $products == true)
                   {
                   		shuffle($products);
					
                    	for($i=0;$i<count($products) && $i<16;$i++)
                    	{
                        	$product=$products[$i];
                        	$_product_id=$product['product_id'];
                ?>
                			<div class="col-md-3 col-sm-6 col-xs-6">                
                <?php
								include("singleproduct.php");
                ?>                
                			</div>                
                <?php
						
                    	}
                   }
                   else
                   {
                   		echo "<p class='alert alert-danger'> Search not found.</p>";
                   }
					
                ?>
			</div>
			<!-- /row -->

			

			
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

<?php
	
	//&prdt=<?=$_GET['pid']
	if(isset($_GET['pid']))
	{
		$para = "&prdt=".$_GET['pid'];
	}
	else
	{
		$para = "";
	}

	$store=getStore($_store_id);
	if($store)
	{
		$Store_Rating = getStoreReviews($store['store_id']);
	
		$Store_Tle_Rating = 0;
		if(count($Store_Rating)>0)
		{
			foreach ($Store_Rating as $key => $value) {
				$Store_Tle_Rating = $Store_Tle_Rating+$value;
			}
	
			$_avg = round($Store_Tle_Rating/count($Store_Rating),1);
			$_lim = round($_avg, 0, PHP_ROUND_HALF_DOWN);
		}
		else
		{
			$_avg =$_lim = 0;
		}

		$city = getCity($store['store_city']);

				if($query && $query['status'] == 'success') {

                  if($store['store_serving_pincode'] == $query['zip'])
                  {
?>	
					
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							
							<h6 class="text-muted text-warning">In your area, City <b><?=$query['city']?>&nbsp;</b>-&nbsp;Pincode&nbsp;<b><?=$query['zip']?></b></h6>
						</div>
					</div>
					<!-- section title -->
                  	<div class="store store-single">
        
				    <div class="store-thumb">
				        <img src="<?php echo $store['store_logo'] ?>" height="300" alt="">
				    </div>
				    <div class="store-body">
				    
				        <?php
						if(isset($_member_id) && $_member_id!="")
						{
						?>
					        <a href="store.php?sid=<?php echo $store['store_id'] ?>&ref_id=<?=$_member_id?><?=$para?>">
					        <h2 class="store-name"><?php echo $store['store_name'] ?></h2>
				    	    </a>        
				        <?php
						}
						else
						{
						?>
					        <h2 class="store-name"><?php echo $store['store_name'] ?></h2>
				        <?php
						}
						?>
				        
				        <?php
						if(isset($_member_id) && $_member_id!="")
						{
						?>
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
								
							echo "<br>".$city['city_name'];
							?>
				        </div>
				        
				        <div class="store-map-button">
				        <a href="<?php echo $store['store_location_url']  ?>" target="_blank">View Map</a>
				        </div>
				        <?php
						}
						else
						{
						?>
				            <div class="store-address">
				                <a href="login.php" style="color:#000">Login To View Contact Details</a>
				            </div>
						<?php
						}
									
							?>	
					        <div>
								<div class="product-rating">
									<?php
									
										for ($i=0; $i < 5; $i++) { 
											if($_lim > $i)
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
									echo '&nbsp;'.$_avg;
									?>
								</div>

								<p>
									<a class="text-info"><?php echo '(&nbsp;'.count($Store_Rating); ?> Customer Rating&nbsp;)</a>
								</p>
							</div>
				    </div>    
				        
				</div>
				<!-- /Product Single -->
<?php
                  }
                  else
                  {
?>

					<div class="store store-single">
					        
					    <div class="store-thumb">
					        <img src="<?php echo $store['store_logo'] ?>" height="300" alt="">
					    </div>
					    <div class="store-body">
					    
					        <?php
							if(isset($_member_id) && $_member_id!="")
							{
							?>
						        <a href="store.php?sid=<?php echo $store['store_id'] ?>&ref_id=<?=$_member_id?><?=$para?>">
						        <h2 class="store-name"><?php echo $store['store_name'] ?></h2>
					    	    </a>        
					        <?php
							}
							else
							{
							?>
						        <h2 class="store-name"><?php echo $store['store_name'] ?></h2>
					        <?php
							}
							?>
					        
					        <?php
							if(isset($_member_id) && $_member_id!="")
							{
							?>
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
									
								echo "<br>".$city['city_name'];
								?>
					        </div>
					        
					        <div class="store-map-button">
					        <a href="<?php echo $store['store_location_url']  ?>" target="_blank">View Map</a>
					        </div>
					        <?php
							}
							else
							{
							?>
					            <div class="store-address">
					                <a href="login.php" style="color:#000">Login To View Contact Details</a>
					            </div>
							<?php
							}
							
							/*$tle_rating = 0;
							if(count($StoreReviews)>0)
							{
								foreach($StoreReviews as $review)
								{
									$tle_rating = $tle_rating+$review;
								}
								$avg = round($tle_rating/count($StoreReviews),1);
								$lim = round($avg, 0, PHP_ROUND_HALF_DOWN);
							}
							else
							{
								$avg=$lim=0;
							}*/
									
							?>	
					        <div>
								<div class="product-rating">
									<?php
										
										for ($i=0; $i < 5; $i++) { 
											if($_lim > $i)
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
									echo '&nbsp;'.$_avg;
									?>
								</div>

								<p>
									<a class="text-info"><?php echo '(&nbsp;'.count($Store_Rating); ?> Customer Rating&nbsp;)</a>
								</p>
							</div>
					    </div>    
					        
					</div>
					<!-- /Product Single -->

<?php
                  }




                } else {
                  echo 'Unable to get location';
                }

	unset($_store_id);

	}
	else
	{
		
	}
?>
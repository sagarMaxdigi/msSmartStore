<?php
include_once("connection.php");
function getAllStores($filter=array())
{
	global $con;
	$q="select * from store where 1=1";
	if(count($filter)>0)
	{
		extract($filter);
		//print_r($filter);
		if(isset($pincode) && $pincode!="")
		{
			$q.=" and store_serving_pincode LIKE '%$pincode%'";
		}
		if(isset($subcategory_id) && $subcategory_id!="")
		{
			$q.=" and product_category=$subcategory_id";
		}
	}
	

	if(isset($filter['show_q']) && $filter['show_q'] == 'true')
	{
		echo $q;
	}
	$q.=" order by store_id desc";
	$res=mysqli_query($con,$q);
	
	$stores=array();
	if($res){
	while($row=mysqli_fetch_assoc($res))
	{
		$stores[]=$row;
	}
	}
	
	return $stores;
}

function mainSlider()
{
	global $con;
	$q="select * from mainsliders where mainslider_status='ACTIVE'";
	
	$res=mysqli_query($con,$q);

	$mainSlider=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$mainSlider[]=$row;
	}	
	return $mainSlider;
}

function getStore($store_id)
{
	global $con;
	$q="SELECT st.*, (SELECT ct.city_name FROM city AS ct where ct.city_id=ifnull(st.store_city,0) limit 1)  AS city_name FROM store AS st WHERE store_id=$store_id AND store_status=1";
	
	$res=mysqli_query($con,$q);
	
	$store=array();
	if($res)
	{
		if($row=mysqli_fetch_assoc($res))
		{
			$store=$row;
		}
		return $store;
	}
	else
	{
		return $store=false;
	}
	
}

function getStore_admin($store_id)
{
	global $con;
	$q="SELECT st.*, (SELECT ct.city_name FROM city AS ct where ct.city_id=ifnull(st.store_city,0) limit 1)  AS city_name FROM store AS st WHERE store_id=$store_id";
	
	$res=mysqli_query($con,$q);
	
	$store=array();
	if($res)
	{
		if($row=mysqli_fetch_assoc($res))
		{
			$store=$row;
		}
		return $store;
	}
	else
	{
		return $store=false;
	}
	
}

function getAllCities()
{
	global $con;
	$q="select * from city where 1=1 ";
	
	$res=mysqli_query($con,$q);
	
	$cities=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$cities[]=$row;
	}
	
	return $cities;
}
function getCity($city_id)
{
	global $con;
	$q="select * from city where city_id=$city_id ";

	$res=mysqli_query($con,$q);
	
	$city=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$city=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $city;
}
function getAllAreas()
{
	global $con;
	$q="select * from area where 1=1 ";
	
	$res=mysqli_query($con,$q);
	
	$areas=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$areas[]=$row;
	}
	
	return $areas;
}
function getArea($area_id)
{
	global $con;
	$q="select * from area where area_id=$area_id ";

	$res=mysqli_query($con,$q);
	
	$area=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$area=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $area;
}
function getAllProductsShow($filter=array(),$sort="")
{
	global $con;
	$q="select t1.* from products t1 where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		//print_r($filter);

		
		if(isset($store_id) && $store_id!="")
		{
			$q.=" and t1.product_id IN (SELECT mapping_product_id FROM `product_mapping` WHERE mapping_store_id=$store_id)";
		}
		if(isset($supercategory_id) && $supercategory_id!="")
		{
			$q.=" and t1.product_category in (select subcategory_id from subcategory where subcategory_category_id in (select category_id from categories where category_supercategory_id=$supercategory_id))";
		}
		if(isset($category_id) && $category_id!="")
		{
			$q.=" and t1.product_category in (select subcategory_id from subcategory where subcategory_category_id=$category_id)";
		}
		if(isset($subcategory_id) && $subcategory_id!="")
		{
			$q.=" and t1.product_category=$subcategory_id";
		}

		if(isset($product_name) && $product_name!="")
		{
			$q.=" and t1.product_name like '%$product_name%'";
		}
		if(isset($brand_id) && $brand_id!="")
		{
			$q.=" and t1.product_brand = $brand_id";
		}
		if(isset($special) && $special=="true")
		{
			$q.=" and t1.product_special = '$special'";
		}
		if(isset($is_new) && $is_new!="")
		{
			$q.=" and t1.is_new = '$is_new'";
		}
		if(isset($search))
		{
			$search_exploded = explode ( " ", $search); 
			$x = 0; 
			$construct = ""; 
			foreach( $search_exploded as $search_each ) 
				{ 
					$x++; 
					
					if( $x == 1 ) 
						$construct .="t1.product_name LIKE '%$search_each%' or t1.product_code LIKE '%$search_each%'"; 
					else 
						$construct .=" AND t1.product_name LIKE '%$search_each%' or t1.product_code LIKE '%$search_each%' and t1.product_highlights LIKE '%$search_each%'"; 
				} 
				
				$q .= " and $construct "; 
				
		}
		if(isset($pids) && $pids!="")
		{
			
			$q.=" and t1.product_id in(-1";
			
			foreach($pids as $pid)
			{
				$q.=",$pid";
			}
			
			$q.=")";
		}

	}
	if($sort=="priceminmax")
	{
		$q.=" order by t1.product_mrp asc ";
	}
	else if($sort=="pricemaxmin")
	{
		$q.=" order by t1.product_mrp desc ";
	}
	else
		$q.=" order by t1.product_priority DESC, t1.product_id DESC, t1.product_last_date ASC";
		
	$res=mysqli_query($con,$q);
	
	$products=array();
	if($res)
	{
		
		while($row=mysqli_fetch_assoc($res))
		{
			$row['product_minimum_price']=getProductMinimumPrice($row['product_id']);
			
			if($row['product_minimum_price']==-1)
				$row['product_minimum_price']=$row['product_mrp'];

			$row['product_discount']=(int)(100-($row['product_minimum_price']*100)/$row['product_mrp']);

			$row['product_available_stores']=getProductAvailableStores($row['product_id']);

			$products[]=$row;
		}
	}
	else
	{
		$products = false;
	}
	
	
	return $products;
}


function getAllProducts($filter=array(),$sort="")
{
// ssssssssssssssssssss
	global $con;
	$q="select t1.*,t2.id as colorID, t2.color as color, t2.size as size,t2.image as image from products t1 left join product_color t2 on t1.product_id=t2.product_id where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		//print_r($filter);

		
		if(isset($store_id) && $store_id!="")
		{
			$q.=" and t1.product_id IN (SELECT mapping_product_id FROM `product_mapping` WHERE mapping_store_id=$store_id)";
		}
		if(isset($supercategory_id) && $supercategory_id!="")
		{
			$q.=" and t1.product_category in (select subcategory_id from subcategory where subcategory_category_id in (select category_id from categories where category_supercategory_id=$supercategory_id))";
		}
		if(isset($category_id) && $category_id!="")
		{
			$q.=" and t1.product_category in (select subcategory_id from subcategory where subcategory_category_id=$category_id)";
		}
		if(isset($subcategory_id) && $subcategory_id!="")
		{
			$q.=" and t1.product_category=$subcategory_id";
		}

		if(isset($product_name) && $product_name!="")
		{
			$q.=" and t1.product_name like '%$product_name%'";
		}
		if(isset($brand_id) && $brand_id!="")
		{
			$q.=" and t1.product_brand = $brand_id";
		}
		if(isset($special) && $special=="true")
		{
			$q.=" and t1.product_special = '$special'";
		}
		if(isset($is_new) && $is_new!="")
		{
			$q.=" and t1.is_new = '$is_new'";
		}
		if(isset($search))
		{
			$search_exploded = explode ( " ", $search); 
			$x = 0; 
			$construct = ""; 
			foreach( $search_exploded as $search_each ) 
				{ 
					$x++; 
					
					if( $x == 1 ) 
						$construct .="t1.product_name LIKE '%$search_each%' or t1.product_code LIKE '%$search_each%'"; 
					else 
						$construct .=" AND t1.product_name LIKE '%$search_each%' or t1.product_code LIKE '%$search_each%' and t1.product_highlights LIKE '%$search_each%'"; 
				} 
				
				$q .= " and $construct "; 
				
		}
		if(isset($pids) && $pids!="")
		{
			
			$q.=" and t2.id in(-1";
			
			foreach($pids as $pid)
			{
				$q.=",$pid";
			}
			
			$q.=")";
		}

	}
	if($sort=="priceminmax")
	{
		$q.=" order by t1.product_mrp asc ";
	}
	else if($sort=="pricemaxmin")
	{
		$q.=" order by t1.product_mrp desc ";
	}
	else
		$q.=" order by t1.product_priority DESC, t1.product_id DESC, t1.product_last_date ASC";
		


	
	// echo $q;
	// die;

	$res=mysqli_query($con,$q);
	
	$products=array();
	if($res)
	{
		
		while($row=mysqli_fetch_assoc($res))
		{
			$row['product_minimum_price']=getProductMinimumPrice($row['product_id']);
			
			if($row['product_minimum_price']==-1)
				$row['product_minimum_price']=$row['product_mrp'];

			$row['product_discount']=(int)(100-($row['product_minimum_price']*100)/$row['product_mrp']);

			$row['product_available_stores']=getProductAvailableStores($row['product_id']);

			$products[]=$row;
		}
	}
	else
	{
		$products = false;
	}
	
	
	return $products;
}

function getProduct($product_id)
{
	global $con;
	// $q="select * from products where product_id=$product_id ";
	$q="select t1.*, t2.id as colorID,t2.image,t2.color,t2.size from products as t1 left join product_color as t2 on t1.product_id=t2.product_id where t1.product_id=$product_id";

	$res=mysqli_query($con,$q);
	
	$product=array();

	// if($row=mysqli_fetch_assoc($res))
	while($row=mysqli_fetch_assoc($res)) 
	{
		if($row['product_img1']!="")
			$row['product_img1']="product_images/".$row['product_img1'];
		
		if($row['product_img2']!="")
			$row['product_img2']="product_images/".$row['product_img2'];
		
		if($row['product_img3']!="")
			$row['product_img3']="product_images/".$row['product_img3'];
		
		if($row['product_img4']!="")
			$row['product_img4']="product_images/".$row['product_img4'];
		
		if($row['product_img5']!="")
			$row['product_img5']="product_images/".$row['product_img5'];

		$row['product_minimum_price']=getProductMinimumPrice($product_id);

		if($row['product_minimum_price']==-1)
			$row['product_minimum_price']=$row['product_mrp'];

		$row['product_discount']=(int)(100-($row['product_minimum_price']*100)/$row['product_mrp']);

		$row['product_available_stores']=getProductAvailableStores($row['product_id']);

		$product[]=$row;
		
	}
	
	
	return $product;
}


function getProduct_wishlist($product_id)
{
	global $con;
	// $q="select * from products where product_id=$product_id ";
	$q="select t1.*, t2.wishlist_size, t2.wishlist_date, t2.wishlist_color,t2.wishlist_size, t2.images from products as t1 left join member_wishlist as t2 on t1.product_id=t2.wishlist_product_id where t1.product_id=$product_id order by t2.wishlist_date desc";

	$res=mysqli_query($con,$q);
	
	$product=array();

	// if($row=mysqli_fetch_assoc($res))
	while($row=mysqli_fetch_assoc($res)) 
	{
		if($row['product_img1']!="")
			$row['product_img1']="product_images/".$row['product_img1'];
		
		if($row['product_img2']!="")
			$row['product_img2']="product_images/".$row['product_img2'];
		
		if($row['product_img3']!="")
			$row['product_img3']="product_images/".$row['product_img3'];
		
		if($row['product_img4']!="")
			$row['product_img4']="product_images/".$row['product_img4'];
		
		if($row['product_img5']!="")
			$row['product_img5']="product_images/".$row['product_img5'];

		$row['product_minimum_price']=getProductMinimumPrice($product_id);

		if($row['product_minimum_price']==-1)
			$row['product_minimum_price']=$row['product_mrp'];

		$row['product_discount']=(int)(100-($row['product_minimum_price']*100)/$row['product_mrp']);

		$row['product_available_stores']=getProductAvailableStores($row['product_id']);
		

		$product[]=$row;
		//print_r($row);
	}
	$whislist_array = array();
	foreach ($product as $key => $value) {
		$whislist_array=$value;
	}
	
	return $whislist_array;
}

function getProductMinimumPrice($product_id)
{
	global $con;
	$q="select mapping_product_offerprice from product_mapping where mapping_product_id=$product_id ";

	$res=mysqli_query($con,$q);
	
	if($row=mysqli_fetch_assoc($res))
	{
		$product_minimum_price=$row['mapping_product_offerprice'];
	}
	else
	{
		$product_minimum_price=-1;
	}
	
	//echo mysqli_error($con);
	
	return $product_minimum_price;
}

function getProductAvailableStores($product_id)
{
	global $con;
	$q="select mapping_store_id from product_mapping where mapping_product_id=$product_id ";

	$res=mysqli_query($con,$q);
	
	$stores=array();	
	while($row=mysqli_fetch_assoc($res))
	{
		$mapping_store_id=$row['mapping_store_id'];
		
		$stores[]=getStore($mapping_store_id);
	}
	$stores_array = array();
	foreach ($stores as $key => $value) {
		$stores_array=$value;
	}
	//echo mysqli_error($con);
	
	return $stores_array;
}

function getAllProductReviews($filter=array())
{
	global $con;
	$q="select * from product_review where 1=1 ";
	
	if(count($filter)>0)
	{
		extract($filter);
		
		if(isset($product_id) && $product_id!="")
		{
			$q.=" and review_product_id='$product_id' ";
		}

		if(isset($member_id) && $member_id!="")
		{
			$q.=" and review_member_id='$member_id' ";
		}
	}

	$res=mysqli_query($con,$q);
	
	$reviews=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$reviews[]=$row;
	}
	
	return $reviews;
}

function getAllStoreReviews($filter=array())
{
	global $con;
	$q="select * from store_rating where store_status=1 ";
	
	if(count($filter)>0)
	{
		extract($filter);
		
		if(isset($store_id) && $store_id!="")
		{
			$q.=" and store_id='$store_id' ";
		}

		if(isset($member_id) && $member_id!="")
		{
			$q.=" and member_id='$member_id' ";
		}
	}

	$res=mysqli_query($con,$q);
	
	$reviews=array();
	if($res)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$reviews[]=$row['rating_star'];
		}
		
		return $reviews;
	}
	else
	{
		return $reviews=false;
	}
	
}

function getStoreReviews($store_id)
{
	global $con;
	$q="SELECT * FROM store_rating WHERE store_id=".$store_id;
	
	$res=mysqli_query($con,$q);
	$a = array();
	$Store_Review = array();

	while($row=mysqli_fetch_assoc($res))
	{
		$Store_Review[]=$row['rating_star'];
		
	}
			
	return $Store_Review;
}

function randomImageName()
{
	$str="abcdefghijklmnpqrstuvwxyz123456789";
	$name="";
	for($i=0;$i<8;$i++)
	{
		$n=rand(0,strlen($str)-1);
		$name=$name.$str[$n];
	}
	//echo "name : ".$name;
	return $name;
}
function getAllSuperCategories($filter=array())
{
	global $con;
	$q="select * from supercategories where 1=1 ";
	
	$res=mysqli_query($con,$q);
	
	$super_categories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_categories[]=$row;
	}	
	return $super_categories;
}
function getSuperCategory($supercategory_id)
{
	global $con;
	$q="select * from supercategories where supercategory_id=$supercategory_id ";

	$res=mysqli_query($con,$q);
	
	$super=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$super=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $super;
}
function getAllCategories($filter=array())
{
	global $con;
	$q="select * from categories where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		//print_r($filter);
		if(isset($supercategory_id) && $supercategory_id!="")
		{
			$q.=" and category_supercategory_id=$supercategory_id";
		}
	}

	$res=mysqli_query($con,$q);
	$categories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$categories[]=$row;
	}
	return $categories;
}
function getCategory($category_id)
{
	global $con;
	$q="select * from categories where category_id=$category_id ";
	$res=mysqli_query($con,$q);
	$category=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$category=$row;
	}
	return $category;
}
function getAllSubCategories($filter=array())
{
	global $con;
	// $q="select * from subcategory where 1=1 ";
	// echo "hi";
	$q = "SELECT P.*,PC.* FROM products AS P LEFT JOIN product_color AS PC ON P.product_id = PC.product_id";
	if(count($filter)>0)
	{
		extract($filter);
		//print_r($filter);
		if(isset($category_id) && $category_id!="")
		{
			$q.=" and subcategory_category_id=$category_id";
		}
	}
	$res=mysqli_query($con,$q);
	
	$subcategories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$subcategories[]=$row;
	}
	return $subcategories;
}
function getSubCategory($subcategory_id)
{
	global $con;
	$q="select * from subcategory where subcategory_id=$subcategory_id ";
	$res=mysqli_query($con,$q);
	$subcategory=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$subcategory=$row;
	}
	return $subcategory;
}
function getProductMapping($filter=array()) //Edited By Atish on 30th Sept. 2018
{
	global $con;
	$q="select * from product_mapping where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		if(isset($store_id_not) && $store_id_not!="")
		{
			$q.=" and mapping_store_id NOT LIKE '$store_id'";
		}
		if(isset($store_id) && $store_id!="")
		{
			$q.=" and mapping_store_id=$store_id";
		}
		if(isset($product_id) && $product_id!="")
		{
			$q.=" and mapping_product_id=$product_id";
		}

		if(isset($mapping_subcategory_id) && $mapping_subcategory_id!="")
		{
			$q.=" and mapping_subcategory_id=$mapping_subcategory_id";
		}
		/*if(isset($super_category_id) && $super_category_id!="")
		{
			$q.=" and mapping_product_id in (select product_id from products where product_category in (select subcategory_id from subcategory where subcategory_category_id in (select category_id from categories where category_supercategory_id=$super_category_id)))";
		}*/
	}

	if(isset($filter['show_q']) && $filter['show_q'] == 'true')
	{
		echo $q;
	}

	$res=mysqli_query($con,$q);
	$mapping=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$mapping[]=$row;
	}
	return $mapping;
}
function getMapping($mapping_id)
{
	global $con;
	$q="select * from product_mapping where mapping_product_id=$mapping_id ";
	$res=mysqli_query($con,$q);
	$mapping=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$mapping=$row;
	}
	return $mapping;
}
function getMapProduct($product_id)
{
	global $con;
	$q="select * from products where product_id NOT LIKE $product_id ";

	$res=mysqli_query($con,$q);
	
	$product=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$product[]=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $product;
}
function getAllCustomer($filter=array())
{
	global $con;
	$q="select * from members where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
	}
	$q.=" order by member_id desc ";
	
	$res=mysqli_query($con,$q);
	
	$members=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$members[]=$row;
	}
	
	return $members;
}

function isMemberFavrite($member_id, $product_id)//Edited by Atish on 30th Sept, 2018
{
	global $con;
	//$q="select * from member_wishlist where wishlist_member_id=$member_id and wishlist_product_id=$product_id ";
	$q="SELECT mw.*,s.store_id,s.store_name FROM member_wishlist AS mw LEFT JOIN store AS s ON mw.wishlist_store_id = s.store_id WHERE mw.wishlist_member_id=$member_id and mw.wishlist_product_id=$product_id";
	
	$res=mysqli_query($con,$q);
	
	if($row=mysqli_fetch_assoc($res))
	{
		return $row;
	}
	else
	{
		return false;
	}
}


function getMemberFavriteProducts($member_id)
{
	global $con;
	$q="select * from member_wishlist where wishlist_member_id=$member_id";
	
	$res=mysqli_query($con,$q);
	
	$products=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$products[]=$row['wishlist_product_id'];
	}
	return $products;
}

function getAllColors()
{
	global $con;
	$q="select * from colors where 1=1 ";
	
	$res=mysqli_query($con,$q);
	
	$colors=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$colors[]=$row;
	}
	
	return $colors;
}
function getColor($color_id)
{
	global $con;
	$q="select * from colors where color_id=$color_id";

	$res=mysqli_query($con,$q);
	
	$color=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$color=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $color;
}
function getAllSizes()
{
	global $con;
	$q="select * from size where 1=1 ";
	
	$res=mysqli_query($con,$q);
	
	$sizes=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$sizes[]=$row;
	}
	
	return $sizes;
}
function getSize($size_id)
{
	global $con;
	$q="select * from size where size_id=$size_id";

	$res=mysqli_query($con,$q);
	
	$size=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$size=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $size;
}
function getAllEnquiries($store_id,$filter=array(),&$query='')
{
	global $con;
	$q="select count(customer_store_id) as count_visitor, * from customer_enquiry where customer_store_id=$store_id ";
	if(count($filter)>0)
	{
		extract($filter);
		if(isset($month) && isset($year))
		{
			$q.=" and customer_ondate LIKE '$year-$month%'";
		}		
	}
	$query = $q;

	if(isset($filter['show_q']) && $filter['show_q'] == 'true')
	{
		echo $q;
	}
	
	$res=mysqli_query($con,$q);
	
	$enquiry=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$enquiry=$row;
	}
	
	return $enquiry;
}


function getEnquiry($store_id)
{
	global $con;
	$q="SELECT t.*,p.product_name,p.product_code,p.product_img1,p.product_mrp,(select m.member_contact from members m where m.member_id=t.member_id limit 1) as member_contact FROM customer_enquiry t
inner join products p on t.customer_product_id=p.product_id
where t.customer_store_id=".$store_id;
	
	$res=mysqli_query($con,$q);
	$stores=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$stores[]=$row;
	}
	return $stores;
}

function getAllMainSliders($filter=array())
{
	global $con;
	$q="select * from mainsliders where 1=1 ";
	
	if(count($filter)>0)
	{
		extract($filter);
		
		if(isset($status) && $status!="")
		{
			$q.=" and mainslider_status='$status'";
		}
	}
	
	$q.=" order by mainslider_id ";
	$res=mysqli_query($con,$q);
	$sliders=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$sliders[]=$row;
	}
	return $sliders;
}
function getMainSlider($mainslider_id)
{
	global $con;
	$q="select * from mainsliders where mainslider_id='$mainslider_id' ";
	$res=mysqli_query($con,$q);
	$slider=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$slider=$row;
	}
	return $sliders;
}
function getAllComments($filter=array())
{
	global $con;
	$q="select * from comments where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		if(isset($store_id))
		{
			$q.=" and store_id = $store_id";
		}
		
	}
	$q.=" order by comment_id ";
	$res=mysqli_query($con,$q);
	$comments=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$comments[]=$row;
	}
	return $comments;
}

function getAllBrands($filter=array())
{
	global $con;
	$q="select * from brand where 1=1 ";
	if(count($filter)>0)
	{
		extract($filter);
		if(isset($brand_id) && $brand_id!="")
		{
			$q.=" and product_brand=$brand_id";
		}
		
	}
	$res=mysqli_query($con,$q);
	$brands=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$brands[]=$row;
	}
	return $brands;
}
function getBrand($brand_id)
{
	global $con;
	$q="select * from brand where brand_id='$brand_id' ";
	$res=mysqli_query($con,$q);
	$brand=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$brand=$row;
	}
	return $brand;
}
function sendMail($subject,$to,$body)
{
	require_once "Mail.php";

	$from = "MSSmartStore<info@mssmartstore.com>";
	
	$host = "mail.mssmartstore.com";
	$username = 'info@mssmartstore.com';
	$password = 'Info@123456';

	$headers = array ('From' => $from,
					  'To' => $to,
					  'Subject' => $subject,
					  'MIME-Version'=>'1.0',
					  'Content-type'=>'text/html'
					  );
	
	$smtp = Mail::factory('smtp',
		  array ('host' => $host,
				 'auth' => true,
				 'username' => $username,
				 'password' => $password));

	$mail = $smtp->send($to, $headers, $body);
	
	return $mail;
}
function getAdmin($username)
{
	global $con;
	$q="select * from admin where username='$username' ";

	$res=mysqli_query($con,$q);
	
	$admin=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$admin=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $admin;
}

function getMember($member_id)
{
	global $con;
	$q="select * from members where member_id='$member_id' ";

	$res=mysqli_query($con,$q);
	
	$member=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$member=$row;		
	}
	
	//echo mysqli_error($con);
	
	return $member;
}

function getAllSubCategories_banner4($filter=array())
{
	global $con;
	$query =  "select * from superbanner where superbanner_id=4";
	$result=mysqli_query($con,$query);
	foreach($result as $banner_row);
	
	//print_r($row['supercategory_id']); die;
	$sub_category = $banner_row['supercategory_id'];

	$q="select * from subcategory where subcategory_id = $sub_category";

	
	$res=mysqli_query($con,$q);

	
	$subcategories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$subcategories[]=$row;
	}
	//print_r($subcategories); die;
	return $subcategories;
}

function getSupperBanner4($superbanner_id=4)
{
	global $con;
	$q="select * from superbanner where superbanner_id=4";

	$res=mysqli_query($con,$q);
	
	$superbanner4=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$superbanner4=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $superbanner4;
}


function getSupperBanner1($superbanner_id=1)
{
	global $con;
	$q="select * from superbanner where superbanner_id=1";

	$res=mysqli_query($con,$q);
	
	$superbanner1=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$superbanner1=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $superbanner1;
}

function getSupperBanner2($superbanner_id=2)
{
	global $con;
	$q="select * from superbanner where superbanner_id=2";

	$res=mysqli_query($con,$q);
	
	$product=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$superbanner2=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $superbanner2;
}

function getSupperBanner3($superbanner_id=3)
{
	global $con;
	$q="select * from superbanner where superbanner_id=3";

	$res=mysqli_query($con,$q);
	
	$superbanner3=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$superbanner3=$row;
		//print_r($row);
	}
	
	//echo mysqli_error($con);
	
	return $superbanner3;
}




function getAllSuperBanner1($filter=array())
{
	global $con;
	$q="select * from superbanner where superbanner_id=1 ";
	
	$res=mysqli_query($con,$q);
	
	$super_banner1=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_banner1[]=$row;
	}	
	return $super_banner1;
}

function getAllSuperBanner2($filter=array())
{
	global $con;
	$q="select * from superbanner where superbanner_id=2 ";
	
	$res=mysqli_query($con,$q);
	
	$super_banner1=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_banner1[]=$row;
	}	
	return $super_banner1;
}

function getAllSuperBanner3($filter=array())
{
	global $con;
	$q="select * from superbanner where superbanner_id=3";
	
	$res=mysqli_query($con,$q);
	
	$super_banner3=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_banner3[]=$row;
	}	
	return $super_banner3;
}


function getAllSuperBanner4($filter=array())
{
	global $con;
	$q="select * from superbanner where superbanner_id=4";
	
	$res=mysqli_query($con,$q);
	
	$super_banner4=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_banner4[]=$row;
	}	
	return $super_banner4;
}

function getSuperBanner($superbanner_id)
{
	global $con;
	$q="select * from superbanner where superbanner_id='$superbanner_id' ";
	$res=mysqli_query($con,$q);
	$banner=array();
	if($row=mysqli_fetch_assoc($res))
	{
		$banner=$row;
	}
	return $banners;
}

function getAllBanner($filter=array())
{
	global $con;
	$q="select * from superbanner where superbanner_status='ACTIVE' and superbanner_id in (1,2,3)";
	
	$res=mysqli_query($con,$q);
	
	$super_categories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$super_categories[]=$row;
	}	
	return $super_categories;
}
function getAllSubCategories_banner1($filter=array())
{
	global $con;
	$query =  "select * from superbanner where superbanner_id=1";
	$result=mysqli_query($con,$query);
	foreach($result as $banner_row);
	
	//print_r($row['supercategory_id']); die;
	$sub_category = $banner_row['supercategory_id'];

	$q="select * from subcategory where subcategory_id = $sub_category";

	
	$res=mysqli_query($con,$q);

	
	$subcategories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$subcategories[]=$row;
	}
	//print_r($subcategories); die;
	return $subcategories;
}

function getAllSubCategories_banner2($filter=array())
{
	global $con;
	$query =  "select * from superbanner where superbanner_id=2";
	$result=mysqli_query($con,$query);
	foreach($result as $banner_row);
	
	//print_r($row['supercategory_id']); die;
	$sub_category = $banner_row['supercategory_id'];

	$q="select * from subcategory where subcategory_id = $sub_category";

	
	$res=mysqli_query($con,$q);

	
	$subcategories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$subcategories[]=$row;
	}
	//print_r($subcategories); die;
	return $subcategories;
}

function getAllSubCategories_banner3($filter=array())
{
	global $con;
	$query =  "select * from superbanner where superbanner_id=3";
	$result=mysqli_query($con,$query);
	foreach($result as $banner_row);
	
	//print_r($row['supercategory_id']); die;
	$sub_category = $banner_row['supercategory_id'];

	$q="select * from subcategory where subcategory_id = $sub_category";

	
	$res=mysqli_query($con,$q);

	
	$subcategories=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$subcategories[]=$row;
	}
	//print_r($subcategories); die;
	return $subcategories;
}


function getProductColor($product_id){
	global $con;
	$q="select * from product_color where product_id=$product_id";

	$res=mysqli_query($con,$q);

	$product=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$product[]=$row;
	}
	
	return $product;
}


// is exist product by subham added on 11-10-2018
if(isset($_REQUEST['xAction'])){
	switch ($_REQUEST['xAction']) {
	case 'isexistProduct':
			echo isexistProduct($_REQUEST['product'],$_REQUEST['product_id']);
			break;
	case 'isexistProductColor':
			echo isexistProductColor($_REQUEST['productId'],$_REQUEST['color']);
			break;
	case 'deleteColor':
			echo deleteColor($_REQUEST['color_id']);
			break;
	}		
}

function isexistProduct($product,$product_id){
	global $con;
	if($product_id){
		$q="select count(product_name) as cnt from products where product_name='$product' AND product_id!=".$product_id;
	}else{
		$q="select count(product_name) as cnt from products where product_name='$product'";	
	}
	$res=mysqli_query($con,$q);
	$return='';
	if($row=mysqli_fetch_assoc($res))
	{
		$return = $row['cnt'];
	}
	return $return;
}

function isexistProductColor($productId,$color){
	global $con;
	$q="select count(color) as cnt from product_color where color='$color' AND product_id=$productId";
	$res=mysqli_query($con,$q);
	$return='';
	if($row=mysqli_fetch_assoc($res))
	{
		$return = $row['cnt'];
	}
	return $return;
}

function deleteColor($color_id){
		global $con;
		$str='';
		$q="delete from product_color where id=".$color_id;
		
		$res=mysqli_query($con,$q);

		if(mysqli_affected_rows($con)>0)
		{
			$str = 'ok';
		}
		return $str;
}
?>
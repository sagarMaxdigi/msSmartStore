<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script>
$(document).ready(function(){
	
	
	
	$("#savereview").click(function(){
		
		//alert("hello");
		
		var product=$("#product_id").val();
		var review=$("#review_text").val();
		
		var ratingValue=0;
		
		if($('#star5').prop('checked'))
		{
			ratingValue=5;
		}
		else if($('#star4').prop('checked'))
		{
			ratingValue=4;
		}
		else if($('#star3').prop('checked'))
		{
			ratingValue=3;
		}
		else if($('#star2').prop('checked'))
		{
			ratingValue=2;
		}
		else if($('#star1').prop('checked'))
		{
			ratingValue=1;
		}
		
		$.post("product_review_save.php",
		{
			review_text: review,
			rating: ratingValue,
			product_id: product
		},
		function(data, status){			
			
			var obj = JSON.parse(data);
			if(obj.flag == 1)
				$("#review_form").html("<h5 class='text-success'>Thank you for your Rating...</h5>");
			else
				$("#store_review_form").html("<h5 class='text-danger'>Unknow error...</h5>");
		});
	});

	$("#StoreSaveReview").click(function(){
		
		//alert("hello");
		
		var store_id=$("#store_id").val();
		
		
		var ratingValue=0;
		
		if($('#star5').prop('checked'))
		{
			ratingValue=5;
		}
		else if($('#star4').prop('checked'))
		{
			ratingValue=4;
		}
		else if($('#star3').prop('checked'))
		{
			ratingValue=3;
		}
		else if($('#star2').prop('checked'))
		{
			ratingValue=2;
		}
		else if($('#star1').prop('checked'))
		{
			ratingValue=1;
		}
		$.post("product_review_save.php",
		{
			
			rating: ratingValue,
			store_id: store_id
		},
		function(data, status){			
			
			var obj = JSON.parse(data);
			if(obj.flag == 1)
				$("#store_review_form").html("<h5 class='text-success'>Thank you for your Rating...</h5>");
			else
				$("#store_review_form").html("<h5 class='text-danger'>Unknow error...</h5>");
		});
	});

	$('a').on('click',function(){

		anchor=$(this);
		type = anchor.attr('id');
		if(type == 'size')
		{
			size = $(this).attr("size_n");
			$('#size.main-btn-active').removeClass("main-btn-active size");
			if($(this).attr("size_n") == size)
			{
				anchor.addClass("main-btn-active size");
			}			
			
		}
		
			
		

		if(type == 'color')
		{
			color = $(this).attr("color_name");
			$('#color.main-btn-active').removeClass("main-btn-active color");
			if($(this).attr("color_name") == color)
			{
				anchor.addClass("main-btn-active color");
			}
			
		}

		// console.log('Size: '+size+', Color: '+color);
		
	});


	$(".heartbutton").on('click',function(){
		//alert("hello"+$(this).attr("product_id"));
		
		button=$(this);
		product=$(this).attr("product_id");
		store = $("#wishlist_store").val();

		if(color== '')
		{
			document.getElementById ('favMsg').innerHTML = "<p class='text-danger'>Select color</p>";
		}
		else if(size == '')
		{
			document.getElementById ('favMsg').innerHTML = "<p class='text-danger'>Choose size</p>";
		}
		else if(store == '')
		{
			document.getElementById ('favMsg').innerHTML = "<p class='text-danger'>Choose store</p>";
		}
		else
		{
			$.post("product_add_wishlist.php",
			{
				product_id: product,
				size:size,
				color:color,
				images:images,
				store_id:store
			},
			function(data, status){	
				var obj = JSON.parse(data);
				if(obj.flag == 1)
				{
					button.addClass("main-btn-active");
					button.removeClass("heartbutton");	
					document.getElementById ('favMsg').innerHTML = 'Added in wishlist';
				}
				else if(obj.flag == 2)
				{
					button.addClass("heartbutton");
					$('.heartbutton').blur();
					button.removeClass("main-btn-active");
					document.getElementById ('favMsg').innerHTML = 'Removed from wishlist';
					$('#size.main-btn-active').removeClass("main-btn-active size");
					$('#color.main-btn-active').removeClass("main-btn-active color");
					size='';
				}
				else
				{
					document.getElementById ('favMsg').innerHTML = obj.msg;
				}
			
			});
		}
		

	});



});


</script>

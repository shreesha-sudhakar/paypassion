<?php include 'second_pages_header.php';?>
	<div id="msg" style="display:none;">There is no search result, use the suggested keywords</div>
	<div class="container" id="result_populate">
		<h2>Search Result</h2>
		<!--<div class="table-responsive">
			<table class="table" id="result_populate">
			</table>
		</div>-->
		
		
	</div>
<?php include 'footer_customer.php';?>
<script>
	var url_string = window.location.search;
	//alert(url_string);
	var url_string = "http://www.example.com/t.html"+url_string;
	//alert(url_string);
	var url_val = new URL(url_string);
	//alert(url_val);
	var c = url_val.searchParams.get("search_val");
	//alert(c);
	$.ajax({
			method : "POST",
			url : "http://localhost/admin123/api/search_gigster_gig.php",
			data : "action=search_display&search_val="+c,
			dataType : "json"
	}).done(function(data){
		console.log(data);
		if(data.status == "failure"){
			$("#msg").show();
		}
		else{
			var b = " ";
			//var images = data.response.images;
			//console.log(images);
			//var pic = images.split(",");
			console.log(pic);
			for(var i = 0;i<data.response.length;i++){
			var a = data.response[i];
			var images = a.images;
			var pic = images.split(",");
			//alert(a.gigster_id);
			b += "<div class='col-md-3 product-men'><div class='men-pro-item simpleCart_shelfItem'><div class='men-thumb-item'><img src='"+"http://localhost/"+pic[i]+"' alt='' class='pro-image-front'><img src='"+"http://localhost/"+pic[i+1]+"' alt='' class='pro-image-back'><div class='men-cart-pro'><div class='inner-men-cart-pro'><a href='#' class='link-product-add-cart'>Quick View</a></div></div><span class='product-new-top'>New</span></div><div class='item-info-product'><h4><a href='single.html'>"+a.gig_name+"</a></hr><div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2'><form action='#' method='post'><fieldset><input type='hidden' name='cmd' value='_cart' /><input type='hidden' name='add' value='1'/><input type='hidden' name='business' value=' ' /><input type='hidden' name='item_name' value='Formal Blue Shirt' /><input type='hidden' name='amount' value='30.99' /><input type='hidden' name='discount_amount' value='1.00' /><input type='hidden' name='currency_code' value='USD' /><div style='display:none;' class='gig_id' type='hidden' name='return'>"+a.gigster_id+"</div><input type='hidden' name='cancel_return' value=' ' /><input type='button' name='submit' value='View Gigster' class='button next_page'/></fieldset></form></div></div></div></div>";
			
				/*b = "<thead><tr><th>Gigster Name</th><th>Gig Name</th><th>Gig Area</th><th>Gig Type</th><th>Address</th><th>Preferred Location</th><th>Description</th><th>Award Details</th><th>Crew Members</th></tr></thead><tbody>"
				for(var i = 0;i<data.response.length;i++){
					var a = data.response[i];
					b += "<tr><td>"+a.gigster_name+"</td><td>"+a.gig_name+"</td><td>"+a.gig_area+"</td><td>"+a.gig_type_name+"</td><td>"+a.address+"</td><td>"+a.preferred_location+"</td><td>"+a.description+"</td><td>"+a.award_details+"</td><td>"+a.crew_members+"</td></tr>";
				}
				b += "</tbody>";*/
			
			}
			$("#result_populate").html(b);
			
		}
		
		$(".next_page").click(function(){
			//alert("sfsd");
			console.log(data);
			var gigster_id=$(this).parent().children('.gig_id').html();
			//alert(gigster_id);
			window.location.assign("single.php?gigster_id="+gigster_id);
		})
	});
	//alert(c);
</script>
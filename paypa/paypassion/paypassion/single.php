<?php include 'second_pages_header.php';?>
	<div class="container">
	<div class="col-md-4" id="pic_gallery"></div>
	<div class="col-md-6 single-right-left simpleCart_shelfItem" style="float:right;">
					<h3 id="gig_name"></h3>
					<div class="rating1">
						<!--<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>-->
					</div>
					<div class="description">
						<h5 id="description">Check delivery, payment options and charges at your location</h5>
						<!-- <form action="#" method="post">
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="" spellcheck="false"><div class="ginger-module-inputHandlerGhost ginger-module-inputHandlerGhost-textarea"></div>
						<input type="submit" value="Check">
						</form>-->
						
					</div>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5 id="gigs_done">Quality :</h5>
							<!--<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">5 Qty</option>
								<option value="null">6 Qty</option> 
								<option value="null">7 Qty</option>					
								<option value="null">10 Qty</option>								
							</select>-->
						</div>
					</div>
					<div class="occasional">
						<h5 id="award_details">Types :</h5>
						<!--<div class="colr ert">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Sneakers </label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
						</div>-->
						<div class="clearfix"> </div>
					</div>
					<div id="videos" class="occasional">
						
					</div>
					<div id="crew_members" class="occasional">
						
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<!--<form action="#" method="post">-->
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="business" value=" ">
																	<input type="hidden" name="item_name" value="Wing Sneakers">
																	<input type="hidden" name="amount" value="650.00">
																	<input type="hidden" name="discount_amount" value="1.00">
																	<input type="hidden" name="currency_code" value="USD">
																	<input type="hidden" name="return" value=" ">
																	<input type="hidden" name="cancel_return" value=" ">
																	<input type="button" name="submit" value="Send Quote" class="button" id="send_quote">
																</fieldset>
															<!--</form>-->
														</div>
																			
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
					
		      </div>
	</div>
	
<!--Modal for sending quotation-->	
<div class="modal fade signup123" id="quote" tabindex="-1" role="dialog" style="display:none">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile register123">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Send Quotation <span>Now</span></h3>
						 <!--<form action="#" method="post">-->
							<label>Gig Date</label>
							<div class="styled-input agile-styled-input-top">
								<input type="date" name="Name" id ="gig_date" required="">
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="Email" id="gig_address" required=""> 
								<label>Gig Address</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="phone" id="gig_area" required=""> 
								<label>Gig Area</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="password" id="crowd" required=""> 
								<label>Approximate Crowd</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="Confirm Password" id="duration" required=""> 
								<label>Duration</label>
								<span></span>
							</div> 
							<input type="button" value="Send Quote" id="send_quote_customer"></a>
						<!--</form>-->
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/Pasted image at 2017_08_04 11_37 AM.png" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-body modal-body-sub_agile otp123">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Enter OTP <span>Now</span></h3>
						 <!--<form action="#" method="post" id="signupForm1">-->
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="otp" required="" id="signupOtp">
								<label>OTP</label>
								<span></span>
							</div>

							<input type="button" value="OTP Send" id="otpVal">
							<!--<a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a>-->
						<!--</form>-->
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/Pasted image at 2017_08_04 11_37 AM.png" alt=" "/>
						</div>
						<div class="clearfix"></div>
						</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>	
	
<!--Modal for sending quotation end-->		
<?php include 'footer_customer.php';?>
<script>
	$(document).ready(function(){
		var url_string = window.location.search;
		//alert(url_string);
		var url_string = "http://www.example.com/t.html"+url_string;
		var url_val = new URL(url_string);
		//alert(url_val);
		var gigster_id = url_val.searchParams.get("gigster_id");
		//alert(c);
		$.ajax({
			method : "POST",
			url : "http://localhost/admin123/api/gigster_profile.php",
			data : "action=populate&gigster_id="+gigster_id,
			dataType : "json"
		}).done(function(data){
			console.log(data);
			var images = data.response.images;
			var pic = images.split(",");
			var x = "<div id='slider' class='flexslider' style='width:520px;height:520px'><ul class='slides'>";
			for(var i=0;i<pic.length;i++){
				x += "<li><img src='"+"http://localhost/"+pic[i]+"' style='width:500px;height:500px'/></li>";
			}
			x += "</ul></div><div id='carousel' class='flexslider'><ul class='slides'>";
			for(var i=0;i<pic.length;i++){
				x += "<li><img src='"+"http://localhost/"+pic[i]+"' style='width:200px;height:200px;'/></li>";
			}    
			x += "</ul></div>";
			$("#pic_gallery").html(x);
			
			$('#carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 210,
			itemMargin: 5,
			asNavFor: '#slider'
		  });
	 
		  $('#slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel"
		  });
		  
		  $("#gig_name").text(data.response.gig_name);
		  $("#description").text("description : "+data.response.description);
		  $("#gigs_done").text("No of Gigs done : "+data.response.gigs_done);
		  $("#award_details").text("Awards : "+data.response.award_details);
		  var videos = data.response.videos;
		  var records = videos.split(",");
		  var u ="<h4>Video Links : </h4>";
		  for(var i=0;i<records.length;i++){
			  u += "<h5>"+records[i]+"</h5>"
		  }
		  $("#videos").html(u);
		  $("#crew_members").text("Crew Members : "+data.response.crew_members);
		  
		});
		$("#send_quote").click(function(){
			$("#quote").modal();
		});
		$("#send_quote_customer").click(function(){
			var gig_date = $("#gig_date").val();
			var gig_address = $("#gig_address").val();
			var gig_area = $("#gig_area").val();
			var crowd = $("#crowd").val();
			var duration = $("#duration").val();
			alert(gig_date+" "+gig_address+" "+gig_area+" "+crowd+" "+duration);
		});
	});
</script>
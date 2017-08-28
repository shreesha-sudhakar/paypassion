<?php include 'header.php'?>
<div class="clearfix"></div>
<br/>
<br/>

<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="" id="signInUser" >
								<label>Username/Phone Number</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="password" required="" id="signInPassword"> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign In" id="loginUser">
						</form>
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
														<p><a href="#" data-toggle="modal" data-target="#myModal2"> Don't have an account?</a></p>
														<p><a href="#" data-toggle="modal" data-target="#otpModal"> Forgot Password?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //ModalForgotPass -->


<div class="modal fade" id="otpModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Enter OTP <span>Now</span></h3>
						 <form action="#" method="post" id="signupForm1">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="otp" required="" id="signupOtp">
								<label>OTP</label>
								<span></span>
							</div>

							<input type="submit" value="OTP Send" id="otpVal">
							<!--<a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a>-->
						</form>
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
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //ModalForgotPass -->
<!--//Modalsignup-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						 <form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" id ="signupName" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" id="signupEmail" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="phone" id="signupPhone" required=""> 
								<label>Phone Number</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" id="signupPassword" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="Confirm Password" id="signupConfirmPassword" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign Up" id="signupUser">
						</form>
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
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modalsignup jjj-->

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script>
	$(document).ready(function(){
		$("#signupUser").click(function(){
			//alert("heloo");
			var name = $("#signupName").val();
			var phone = $("#signupPhone").val();
			var email = $("#signupEmail").val();
			var password = $("#signupPassword").val();
			var confirmPassword = $("#signupConfirmPassword").val();
			//var action = 'customer_register';
			console.log(name+" "+phone+" "+email+" "+password+" "+confirmPassword);
			if(password == confirmPassword){
//console.log("passwords dont match");
			
			$.ajax({
				url:"localhost/customer_register.php",
				data:"action=customer_register&name="+name+"&phone="+phone+"&email="+email+"&password="+password,
				method:"POST",
				dataType:"JSON"
			}).done(function(data){
				
				if(data.status=='success'){
					console.log(data);
					alert("success");
					$("#myModal2").hide();
					$("#otpModal").show();
				}else{
					alert("not success");
				}
			});
		}else{
			alert("j");
		}
		});
		$("#otpVal").click(function(){
		alert("inside signupotp");
			var otp = $("#signupOtp").val();
			var action = "otp_verify";
			var phone = $("#signupPhone").val();
			alert(otp+" "+phone);
			$.ajax({
				url:"http://192.168.43.58/customer_register.php",
				method:"POST",
				data: 'action='+action+'&otp='+otp+'&phone='+phone,
				dataType:"JSON"
			}).done(function(data){
				console.log(data);
				if(data.status == "success"){
					alert("otp verified");
					//$("#myModal2").hide();
					$("#otpModal").hide();
					$("#myModal").show();
					
				}
				else{
					alert("not created");
				}
			});
			
		});
		$("#loginUser").click(function(){
			var username = $("#signInUser").val();
			var password = $("#signInPassword").val();
			var action  = "login_customer";
			var data = {'action':action,'username':username,'password':password};
			$.ajax({
				method:"POST",
				url:"http://192.168.43.58/customer_register.php",
				data: 'action='+action+'&username='+username+'&password='+password,
				dataType:"JSON"
			}).done(function(data){
				console.log(data);
				if(data.status=="success"){
					alert("user authenticated");
					location.href="womens.html";
				}
				else{
					alert("user not authenticated");
				}
			});
		});
	});
	
</script>
<?php include 'footer.php'?>

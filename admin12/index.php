<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PayPASSION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Pay</b>PASSION</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body login_account">
    <p class="login-box-msg">Sign in</p>

    
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="phone_login" placeholder="Phone Number">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password_login" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <span id="alert_login" style="display:none;color:red;">Phone number or password incorrect</span>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat sign_in" value="Sign in">
        </div>
        <!-- /.col -->
      </div>
    
	
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <span class="forgot_password">I forgot my password</span><br>
    <span class="new_register">Register a new membership</span>

  </div>
  <!-- /.login-box-body -->
  <div class="register-box-body admin_register" style="display:none;">
    <p class="login-box-msg">Register a new membership</p>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="user_name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <span id="name_alert">Please insert a valid name.</span>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" id="user_phone" placeholder="phone number">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <span id="phone_alert" style="color:red;display:none;">Please insert a valid phone number.</span>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="user_password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="confirm_password" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat sign_up" value="Register">
        </div>
        <!-- /.col -->
      </div>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <span class="login_member">I already have a membership</span>
  </div>
   <div class="register-box-body phone_section" style="display:none;">
    <p class="login-box-msg">Enter phone number</p>

   
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="phone3" placeholder="Phone number">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat enter_phone" value="Submit">
        </div>
        <!-- /.col -->
      </div>
    

    
  </div>
  <div class="register-box-body otp_section" style="display:none;">
    <p class="login-box-msg">Enter OTP</p>

    
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="otp_phone" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat submit_otp" value="Submit">
        </div>
        <!-- /.col -->
      </div>
    

    
  </div>
  <div class="register-box-body otp_section11" style="display:none;">
    <p class="login-box-msg">Enter OTP</p>

   
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="otp_phone11" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat submit_otp11" value="Submit">
        </div>
        <!-- /.col -->
      </div>
   

    
  </div>
  <div class="register-box-body password_section" style="display:none;">
    <p class="login-box-msg">Reset password</p>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="password1" placeholder="Enter password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" id="password2" placeholder="confirm password">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat submit_password" value="Submit">
        </div>
        <!-- /.col -->
      </div>
 

    
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $(document).ready(function(){
	  $(".new_register").click(function(){
		  $(".login_account").hide();
		  $(".admin_register").show();
	  });
	  $(".login_member").click(function(){
		  $(".login_account").show();
		  $(".admin_register").hide();
	  });
	  $(".forgot_password").click(function(){
		  $(".login_account").hide();
		  $(".phone_section").show();
	  });
	  //-------------------sign up--------------------
	  $(".sign_up").click(function(){
		 var user_phone=$("#user_phone").val();
		 var user_password=$("#user_password").val();
		 var c_password=$("#confirm_password").val();
		 var user_name=$("#user_name").val();
		 if(user_password==c_password){
		 $.ajax({
			 url:"http://localhost/admin123/api/gig_normal_register.php",
			 data:"action=gig_details&phone="+user_phone+"&password="+user_password+"&name="+user_name,
			 method:"POST",
			 dataType:"JSON"
		 }).done(function(data){
			 if(data.status=='success'){
				$(".otp_section").show();
				$(".admin_register").hide();
				$.ajax({
			 url :"http://localhost/admin123/api/gig_normal_register.php",
			 method :"POST",
			 data :"action=gigster_id_fetch&phone="+user_phone,
			 dataType :"JSON"
		 }).done(function(data1){
			 console.log(data1);
		 });
			 }else{
				 alert("phone number already exists");
			 }
		 });
		 }else{
			 alert("Passwords does not match!");
		 }
	  });
	  //---------------------otp verify----------------------
	  $(".submit_otp").click(function(){
		 var otp=$("#otp_phone").val();
		 $.ajax({
			 url:"http://localhost/admin123/api/gig_normal_register.php",
			 data:"action=RESET_VERIFY&otp="+otp,
			 method:"POST",
			 dataType:"JSON"
		 }).done(function(data){
			 if(data.status=='success'){
				$(".otp_section").hide();
				$(".login_account").show();
			 }else{
				 alert("otp does not exist");
			 }
		 });
	  });
	  //--------------sign in---------------
	   $(".sign_in").click(function(){
		var phone_number = $("#phone_login").val();
		var user_password = $("#password_login").val();
		$.ajax({
			url:"http://localhost/admin123/api/gig_normal_register.php",
			method: "POST",
			data:"action=login&phone_number="+phone_number+"&password="+user_password,
			dataType:"json"
		}).done(function(data){
			console.log(data);
			//api returns success redirect the user to index.php else display error message
			if(data.status=="success"){
				window.localStorage.setItem('gigster_id',data.response.id);
				window.localStorage.setItem('phone_number',data.response.phone_number);
				window.localStorage.setItem('name',data.response.name);
				window.location.assign("dashboard.php");
			}else{
				$("#alert_login").show();
			}
		});
	});
	//------------------enter phone number---------------
	$(".enter_phone").click(function(){
		var phone_number = $("#phone3").val();
		$.ajax({
			url:"http://localhost/admin123/api/gig_normal_register.php",
			method: "POST",
			data:"action=PHONE&phone_number="+phone_number,
			dataType:"json"
		}).done(function(data){
			console.log(data);
			//api returns success redirect the user to index.php else display error message
			if(data.status=="success"){
				$(".otp_section11").show();
				$(".phone_section").hide();
			}else{
				alert("phone number does not exist.");
			}
		});
	});
	//-----------otp password-------------
	 $(".submit_otp11").click(function(){
		 var otp=$("#otp_phone11").val();
		 $.ajax({
			 url:"http://localhost/admin123/api/gig_normal_register.php",
			 data:"action=RESET_VERIFY&otp="+otp,
			 method:"POST",
			 dataType:"JSON"
		 }).done(function(data){
			 if(data.status=='success'){
				$(".otp_section11").hide();
				$(".password_section").show();
			 }else{
				 alert("enter correct otp");
			 }
		 });
	  });
	  //-------------ajax forgot password---------------
	  $(".submit_password").click(function(){
		 var p1=$("#password1").val();
		 var p2=$("#password2").val();
		 var phone_number=window.localStorage.getItem('phone_number');
		 if(p1==p2){
		 $.ajax({
			 url:"http://localhost/admin123/api/gig_normal_register.php",
			 data:"action=UPDATE_PASSWORD&password="+p1+"&phone_number="+phone_number,
			 method:"POST",
			 dataType:"JSON"
		 }).done(function(data){
			 if(data.status=='success'){
				$(".password_section").hide();
				$(".login_account").show();
			 }
		 });
		 }else{
			 alert("password does not match");
		 }
	  });
  });
</script>
</body>
</html>

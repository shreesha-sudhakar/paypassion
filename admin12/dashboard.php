<?php include 'header.php';?>
	<br/>
	<div style="padding-left:150px;">	
		<a class="btn btn-app col-md-3" id="profile_update">
			<i class="fa fa-users"></i> Profile
		</a>
		<a class="btn btn-app col-md-3" id="booking_view">
			<i class="fa fa-inbox"></i> Bookings
		</a>
		<a class="btn btn-app col-md-3" id="quotation_view">
			<i class="fa fa-envelope-open"></i> Quotation
		</a>
	</div>
	<!--
	<button id="profile_update">Profile Update</button>
	<button id="booking_view">Booking View</button>
	<button id="quotation_view">Quotation View</button>-->
<?php include 'footer.php';?>

<script>
	$(document).ready(function(){
		var gigster_id = window.localStorage.getItem('gigster_id');
		//alert(gigster_id);
		if(gigster_id){
			$("#profile_update").click(function(){
				window.location.assign('profile_view.php');
			});
			$("#quotation_view").click(function(){
				window.location.assign('quotation_view.php');
			});
			$("#booking_view").click(function(){
				window.location.assign('booking_view.php');
			});
		}
		else{
			alert("please login to access details");
			window.location.assign("index.php");
		}
	});
</script>


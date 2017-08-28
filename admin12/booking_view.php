<?php include 'header.php';?>
	<center>
		<h2>Your Bookings</h2>
	</center>
	<div class="box">
		<div class="box-header">
              <h3 class="box-title">Bookings</h3>
        </div>
		<div class="box-body">
			<table id="book_view" class="table table-bordered table-hover">
		
			</table>
		</div>
	</div>
<?php include 'footer.php';?>
<script>
$(document).ready(function(){
	var gigster_id = window.localStorage.getItem('gigster_id');
	if(gigster_id){
		$.ajax({method: "POST",
				url: "http://localhost/admin123/api/gigster_profile.php",
				data: "action=booking_view&gigster_id="+gigster_id,
				dataType: "JSON"}).done(function(data){
					console.log(data);
					if(data.status == "success"){
						var x='', y='';
						y="<thead><tr><td>Booking ID</td><td>Customer Name</td><td>Phone</td><td>Gig Date</td><td>Gig Address</td><td>Gig Area</td><td>Gig Type</td><td>Crowd Expected</td><td>Duration</td><td>Amount</td></tr></thead><tbody>";
						for(var i=0;i<data.response.length;i++){
							x = data.response[i];
							y += "<tr><td>"+x.quotation_id+"</td><td>"+x.customer_name+"</td><td>"+x.phone+"</td><td>"+x.gig_date+"</td><td>"+x.gig_address+"</td><td>"+x.gig_area+"</td><td>"+x.gig_type+"</td><td>"+x.crowd+"</td><td>"+x.duration+"</td><td>"+x.quote_amount+"</td></tr>";
						}
						y += "</tbody>";
						$("#book_view").html(y);
					}
				});
	}
	else{
		alert("please login to access details");
		window.location.assign("index.php");
	}
});
</script>
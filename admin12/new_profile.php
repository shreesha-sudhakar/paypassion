<?php include 'header.php';?>

<style type="text/css">
	.row:after{
	padding:10px;
    content: "";
    clear: both;
    display: table;
}

.column {
	padding:80px;
    float: left;
    width: 50%;
}

</style>

<div class="row">
          <div class="box box-primary column">
            <div class="box-header with-border">
              <h3 class="box-title">Gigster Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="gigster_name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone Number</label>
                  <input type="text" class="form-control" id="gigster_phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="textarea" class="form-control" id="gigster_address" placeholder="Address">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">No of Gigs done</label>
                  <input type="text" class="form-control" id="gigs_done" placeholder="Enter Gigs done">
                </div>
                
              </div>
              <!-- /.box-body -->
			
			
            <!--</form>-->
          </div>
          <!-- /.box -->
		  <!-- general form elements -->
          <div class="box box-primary column">
            <div class="box-header with-border">
              <h3 class="box-title">Professional Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Gig Name</label>
                  <input type="text" class="form-control" id="gig_name" placeholder="Enter Gig Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Area of expertise</label>
				  <form name="classic">
                  <select name="countries" id="area_expertise" class="form-control" size="1" onChange="updatecities(this.selectedIndex)" style="width: 150px">
						<option selected>Select A City</option>
						<option value="1">Music</option>
						<option value="2">Dance</option>
						<option value="3">Event Management</option>
						<option value="4">Acting</option>
						<option value="5">Art</option>
						</select>
				</div>
					<div class="form-group">
						<div><label for="exampleInputEmail1">Gig type</label></div>                              
						<select name="cities" id="gig_type" size="1" class="form-control" style="width: 150px" <!--onClick="alert(this.options[this.options.selectedIndex].value)"-->>
						</select>
					</div>
				</form>
				  <br/>
				  
				 
                
                
				<div class="form-group">
                  <label for="exampleInputEmail1">Preferred Location</label>
                  <input type="text" class="form-control" id="prefered_location" placeholder="Enter Preffered Location">
                </div>
                
              </div>
              <!-- /.box-body -->
			  
			  
			
            <!--</form>-->
          </div>
		</div>
		<div class="row">
          <div class="box box-primary column">
            <div class="box-header with-border">
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="textarea" class="form-control" id="description" placeholder="Enter Gig Description">
                </div>
                                  
				<div class="form-group">
                  <label for="exampleInputEmail1">images</label>
                  <input type="text" class="form-control" id="images" placeholder="dummy will be changed to file input">
                </div>
                
              </div>
			</div>
		</div>
		<div class="box box-primary column">
            <div class="box-header with-border">
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Award Details</label>
                  <input type="text" class="form-control" id="award_details" placeholder="Enter Award Details">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Youtube links</label>
                  <input type="text" class="form-control" id="youtube_links" placeholder="Enter Video links in Youtube">
                </div>                
              </div>
			</div>
		
	</div>
	<center><button type="button" class="btn btn-primary" id="update_gig_profile">Submit</button></center>  
	</div>

<?php include 'footer.php';?>

<script>
$(document).ready(function(){
	var gigster_id = window.localStorage.getItem('gigster_id');
		if(gigster_id){
			//alert(gigster_id);
		}
		else{
			alert("no id set");
		}
		$("#update_gig_profile").click(function(){
			
			var gigster_name = $("#gigster_name").val();
			var phone = $("#gigster_phone").val();
			var gigs_done = $("#gigs_done").val();
			var gig_name = $("#gig_name").val();
			var area_expertise = $("#area_expertise").val();
			var gig_type = $("#gig_type").val();
			var preferred_location = $("#prefered_location").val();
			var address = $("#gigster_address").val();
			var description = $("#description").val();
			var award_details = $("#award_details").val();
			var images = $("#images").val();
			var youtube_links = $("#youtube_links").val();
			$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=gigster_profile&gigster_name="+gigster_name+"&phone="+phone+"&gigs_done="+gigs_done+"&gig_name="+gig_name+"&area_expertise="+area_expertise+"&gig_type="+gig_type+"&preferred_location="+preferred_location+"&address="+address+"&description="+description+"&award_details="+award_details+"&images="+images+"&youtube_links="+youtube_links+"&gigster_id="+gigster_id,
					dataType : "json"
				}).done(function(data){
					console.log(data);
					if(data.status == "success"){
					
					}
				}).always(function(d){
					console.log(d);
				});
		});
		
		
	
	});
</script>


<script type="text/javascript">
 
var countrieslist=document.classic.countries;
var citieslist=document.classic.cities;
 
var cities=new Array()
cities[0]=[""]
cities[1]=["vocal|100", "guitar|101", "drums|102"]
cities[2]=["hiphop|103", "jazz|104"]
cities[3]=["party|105", "wedding|106"]
cities[4]=["drama|107","action|108"]
cities[5]=["drawing|109","painting|110"]
 
function updatecities(selectedcitygroup){
    citieslist.options.length=0
    if (selectedcitygroup>0){
        for (i=0; i<cities[selectedcitygroup].length; i++)
            citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1])
    }
}
 
</script>


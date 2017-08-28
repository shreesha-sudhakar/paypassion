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
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}


</style>
<div id="populate">
<div class="row clearfix row-eq-height">
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
						<option selected>Select an area</option>
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
							<option selected>select a type</option>
							<option value="100">vocal</option>
							<option value="101">guitar</option>
							<option value="102">drums</option>
							<option value="103">hiphop</option>
							<option value="104">jazz</option>
							<option value="105">party</option>
							<option value="106">wedding</option>
							<option value="107">drama</option>
							<option value="108">action</option>
							<option value="109">drawing</option>
							<option value="110">painting</option>
						</select>
					</div>
				</form>
				  
				 
                
                
				<div class="form-group">
                  <label for="exampleInputEmail1">Preferred Location</label>
                  <input type="text" class="form-control" id="preferred_location" placeholder="Enter Preffered Location">
                </div>
                
              </div>
              <!-- /.box-body -->
			  
			  
			
            <!--</form>-->
          </div>
		  
	</div>
		<div class="row row-eq-height">
          <div class="box box-primary column">
            <div class="box-header with-border">
			<div class="box-body">
                
				<h4>Image Preview</h4>
				<div class ="form-group" id="preview">
				</div>
				
				<h4>Select an image to delete</h4>
				<div class="form-group" id="select_div">
                  
                </div>
				<button class='delete_img'>delete</button>	
				
				<div class="form-group" id="form_div">
                  
                </div>
                
              </div>
			</div>
		</div>
		<div class="box box-primary column">
            <div class="box-header with-border">
			<div class="box-body">
			
				<div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="textarea" class="form-control" id="description" placeholder="Enter Gig Description">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputPassword1">No Of Crew Members</label>
                  <input type="text" class="form-control" id="crew_members" placeholder="Enter no of crew members">
                </div>
			
                <div class="form-group">
                  <label for="exampleInputPassword1">Award Details</label>
                  <input type="text" class="form-control" id="award_details" placeholder="Enter Award Details">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Youtube links</label>
                  <input type="text" class="form-control" id="youtube_links" placeholder="Enter Video links in Youtube">
				  <span>Enter comma separated youtube links, in case of multiple videos.</span>
                </div>
				<br><br><br>
              </div>
			</div>
		
	</div>
	
	</div>

</div>
<center><button type="button" class="btn btn-primary" id="update_gig_profile">Submit</button></center>  
<?php include 'footer.php';?>

<script>
$(document).ready(function(){
	var gigster_id = window.localStorage.getItem('gigster_id');
		if(gigster_id){
			function populate_profile(){
				$.ajax({
					method:"POST",
					url:"http://localhost/admin123/api/gigster_profile.php",
					data:"action=populate&gigster_id="+gigster_id,
					dataType:"json"
				}).done(function(data){
					console.log(data);
					var a = data.response;
					var x = "",k="";
					var sub_gigster_id;
					$("#gigster_name").val(data.response.gigster_name);
					$("#gigster_phone").val(data.response.gigster_phone);
					$("#gigster_address").val(data.response.address);
					$("#gigs_done").val(data.response.gigs_done);
					document.getElementById("area_expertise").value = data.response.area_id;
					$("#gig_name").val(data.response.gig_name);
					//$("#area_expertise").val(data.response.area_name);
					//$("#gig_type").val(data.response.gig_type_name);
					document.getElementById("gig_type").value = data.response.gig_type_id;
					$("#preferred_location").val(data.response.preferred_location);
					$("#description").val(data.response.description);
					$("#award_details").val(data.response.award_details);
					//$("#images").val(data.response.images);
					$("#youtube_links").val(data.response.videos);
					$("#crew_members").val(data.response.crew_members);
					x = "<form action='http://localhost/upload_file.php?action=gigster_image&gigster_id="+gigster_id+"' method='post' enctype='multipart/form-data'><h4>Select image to upload:</h4><input type='file' name='fileToUpload' id='fileToUpload'><br><input type='submit' value='Upload Image' id='upload' name='submit'></form>";
					var count_images = data.response.images;
					var count = count_images.split(",");
					k = "<select id='img_selected' style='width:200px'><option></option>";
					for(var i=0;i<count.length;i++){
						k += "<option value='"+count[i]+"'>"+count[i]+"</option>";
					}
					k += "</select>";
					//k += "<button class='delete_img'>delete</button>";
				$("#form_div").html(x);
				$("#select_div").html(k);
				var image_preview = $("#img_selected").val();
				var p = "<img src='"+"http://localhost/"+image_preview+"' style='width:300px;height:90px;'>";
				$("#preview").html(p);
				});
			}
			populate_profile();
			
			$(".delete_img").click(function(){
				//alert("sfsd");
				var file_path = $("#img_selected").val();
				alert(file_path);
				$.ajax({
						method : "POST",
						url : "http://localhost/admin123/api/gigster_profile.php",
						data : "action=delete_gigster_img&gigster_id="+gigster_id+"&file_path="+file_path,
						dataType : "json"
				}).done(function(data){
					console.log(data);
					window.location.assign("profile_view.php");
				});
			});
			
			function preview_img(){
				var image_preview = $("#img_selected").val();
				var p = "<img src='"+"http://localhost/"+image_preview+"' style='width:300px;height:90px;'>";
				$("#preview").html(p);
			}
			$("#select_div").change(function(){
				preview_img();
			});
		$("#update_gig_profile").click(function(){
			
			var gigster_name = $("#gigster_name").val();
			var phone = $("#gigster_phone").val();
			var gigs_done = $("#gigs_done").val();
			var gig_name = $("#gig_name").val();
			var area_expertise = $("#area_expertise").val();
			var gig_type = $("#gig_type").val();
			var preferred_location = $("#preferred_location").val();
			var address = $("#gigster_address").val();
			var description = $("#description").val();
			var award_details = $("#award_details").val();
			//var images = $("#images").val();
			var youtube_links = $("#youtube_links").val();
			var crew_members = $("#crew_members").val();
			if(gigster_name && gig_name && area_expertise && preferred_location && address && description){
				$.ajax({
						method : "POST",
						url : "http://localhost/admin123/api/gigster_profile.php",
						data : "action=gigster_profile&gigster_name="+gigster_name+"&phone="+phone+"&gigs_done="+gigs_done+"&gig_name="+gig_name+"&area_expertise="+area_expertise+"&gig_type="+gig_type+"&preferred_location="+preferred_location+"&address="+address+"&description="+description+"&award_details="+award_details+"&youtube_links="+youtube_links+"&gigster_id="+gigster_id+"&crew_members="+crew_members,
						dataType : "json"
					}).done(function(data){
						console.log(data);
						if(data.status == "success"){
							populate_profile();
							window.location.assign("profile_view.php");
						}
					}).always(function(d){
						console.log(d);
					});
			}
			else{
				alert("fill the complete details");
			}
		});
	
		
	
		}
		else{
			alert("please login to access details");
			window.location.assign("index.php");
		}
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
            citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1]);
    }
}
 
</script>


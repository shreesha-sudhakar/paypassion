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
.crew_img{
	width : 200px;
	height :200px;
	border-radius : 50%;
}
#caro_parent{
	width : 900px;
	height : 300px;
	margin-left : 100px;
}
.caro{
	max-width:100%;
	max-height:100%;
	object-fit: contain;
}
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}
.x{
	background-color : #add8e6;
}
</style>

<div style="padding-left:150px;padding-top:25px;">	
			<button class="btn btn-app col-md-3 x" id="edit_profile"><i class="fa fa-edit"></i> Edit Profile</button>
			
			<button class="btn btn-app col-md-3 x" id="add_crew"><i class="fa fa-user-o"></i> Add Crew</button>
		
			<button class="btn btn-app col-md-3 x" id="update_crew"><i class="fa fa-edit"></i> Update Crew </button>
		
</div>
<br>
<br>
<br>
<h2 id="profile_info"></h2>
<div class="progress">
	<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" id="profile_meter">
	</div>
</div>
<h4 id="heads_up">Complete your profile to have maximum views</h4>

<center><div><h1>Gig Pictures</h1></div></center>

<div id="caro_parent"></div>

<div class="row row-eq-height">
        <div class="box box-primary column">
            <div class="box-header with-border">
				<h2>Gigster Details</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
              <div class="box-body">
                
                  
                  <h4>Name : <span id="gigster_name"></span></h4>
        
                  <h4>Phone Number : <span id="gigster_phone"></span></h4>
                
                  <h4>Address : <span id="gigster_address"></span></h4>
				
                  <h4>No of Gigs done : <span id="gigs_done"></span></h4>
				  
				  <h4>No Of Crew Members : <span id="crew_members"><span></h4>
				  
				  <h4>Youtube Links : <span id="youtube_links"></span></h4>
                  
              <!-- /.box-body -->
			
			
            <!--</form>-->
			</div>
		</div>
          <!-- /.box -->
		  <!-- general form elements -->
          <div class="box box-primary column">
            <div class="box-header with-border">
              <h2>Professional Details</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form role="form">-->
            <div class="box-body">
			  
                  <h4>Gig Name : <span id="gig_name"></span></h4>
				  
				  <h4>Area of Expertise : <span id="area_expertise"></span></h4>
	
                  <h4>Preferred Location :<span id="preferred_location"></span></h4>
				  
				  <h4>Award Details : <span id="award_details"></span></h4>
				  
				  <h4>Description : <span id="description"></span></h4>
                 
                  <h4>Images : <span id="images"></span></h4>
            </div>
                
          </div>
              <!-- /.box-body -->
			  
			  
			
            <!--</form>-->
</div>
		
<!--div for crew members-->

<div class="row" id="crew_info_show">
</div>
<!--div for crew members close-->		
<!-- modal for add member-->
        <div class="modal fade" id="crew_add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Crew Member</h4>
              </div>
              <div class="modal-body">
				<div class="input-group">
					<label>Name <input class="form-control" id="gigster_name_crew" type="text" placeholder="Enter Name"></label>
					<div class="form-group">
                  <label for="exampleInputPassword1">Area of expertise</label>
				  <form name="classic">
                  <select name="countries" id="area_expertise_add" class="form-control" size="1" onChange="updatecities(this.selectedIndex)" style="width: 150px">
						<option selected>Select an area</option>
						<option value="1">Music</option>
						<option value="2">Dance</option>
						<option value="3">Event Management</option>
						<option value="4">Acting</option>
						<option value="5">Art</option>
					</select>
				</div>
					<div class="form-group">
						<br/>
						<div><label for="exampleInputEmail1">Gig type</label></div>                              
						<select name="cities" id="gig_type_add" size="1" class="form-control" style="width: 150px" <!--onClick="alert(this.options[this.options.selectedIndex].value)"-->>
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
				</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_crew_member">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<!-- modal for add member end-->

<!-- modal for update member-->

 <div class="modal fade" id="crew_update">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Crew Member</h4>
              </div>
              <div class="modal-body">
				<label>Select Gigster
				<select id="select_gigster" class="form-control"></select>
				</label>
				
				<h4>Image Preview</h4>
				<div class ="form-group" id="preview">
				</div>
				
				<div id="form_div"></div>
				
				<div class="input-group">
				
					<label>Name <input class="form-control" type="text" placeholder="Enter Name" id="sub_gigster_name_update"></label>
					<br/>
					<br/>
					<form name="classic">
						<label>Area of Expertise
						<select name="countries" id="area_expertise_update" class="form-control" size="1" onChange="updatecities(this.selectedIndex)" style="width: 150px">
							<option selected>Select an area</option>
							<option value="1">Music</option>
							<option value="2">Dance</option>
							<option value="3">Event Management</option>
							<option value="4">Acting</option>
							<option value="5">Art</option>
						</select>
						</label>
						<br/>
						<br/>
						<label>Gig Type<select name="cities" id="gig_type_update" size="1" class="form-control" style="width: 150px" <!--onClick="alert(this.options[this.options.selectedIndex].value)"-->>
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
						</label>
					</form>		
				</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="delete_crew_member">Delete Crew Member</button>
                <button type="button" class="btn btn-primary" id="update_crew_member">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- modal for update member end-->

	
	

<?php include 'footer.php';?>

<script>
$(document).ready(function(){
	var gigster_id = window.localStorage.getItem('gigster_id');
		if(gigster_id){
			
			
			function populate(){
				//alert(gigster_id);
				$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=populate&gigster_id="+gigster_id,
					dataType : "json"
				}).done(function(data){
					console.log(data);
					var a = data.response;
					var value,bar_percent=0;
					var attributes = [a.gigster_name,a.gigster_phone,a.address,a.gigs_done,a.youtube_links,a.crew_members,a.gig_name,a.area_name,a.preferred_location,a.award_details,a.description,a.images];
					//console.log(attributes);
					if(data.status == "success"){
						var count_images = data.response.images;
						var count = count_images.split(",");
						console.log(count);
						if(count[0] == ""){
							//alert("fsdfsd");
							$("#images").text("Please add crew images");
							$("#images").css("background-color","red");
						}
						
						/*var z = "<center><div class='row' id='row_caro'><div class='box box-solid'><div class='box-header with-border'><h1 class='box-title'>Gig Pictures</h1></div><div class='box-body'><div id='carousel-example-generic' class='carousel slide' data-ride='carousel'><ol class='carousel-indicators'>";
						console.log(count);
						for(var i = 0;i < count.length;i++){
								z += "<li data-target='#carousel-example-generic' data-slide-to='"+i+"' class='active'></li>";
						}
						z += "</ol><div class='carousel-inner'><div class='item active'>";
						for(var j=0;j<count.length;j++){
							alert(""+"http://localhost/"+count[j]+"");
							z += "<img id='gig_image_"+j+"' width='70px' heigth='50px' class ='caro' src='"+"http://localhost/"+count[j]+"' alt='"+j+" slide'><div class='carousel-caption'>Slide</div></div></div>";
						}
						z += "<a class='left carousel-control' href='#carousel-example-generic' data-slide='prev'><span class='fa fa-angle-left'></span></a><a class='right carousel-control' href='#carousel-example-generic' data-slide='next'><span class='fa fa-angle-right'></span></a></div></div></div></div></center>";
						*/
						
						
						var z = "<div id='myCarousel' class='carousel slide' data-ride='carousel'><ol class='carousel-indicators'>";

						for(var i=0;i<count.length;i++){
							if(i == 0){
								z += " <li data-target='#myCarousel' data-slide-to="+i+" class='active'></li>";
							}
							else{
								z += "<li data-target='#myCarousel' data-slide-to="+i+"></li>";
							}	
						}
						z += "</ol><center><div class='carousel-inner'>";

						for(var j=0;j<count.length;j++){
							if(j == 0){
								z += "<div class='item active'><img src='"+"http://localhost/"+count[j]+"' style='width:900px;height:300px;align:center'></div>";
							}
							else{
								z += "<div class='item'><img src='"+"http://localhost/"+count[j]+"' style='width:900px;height:300px;align:center'></div>";
							}
						}

						z += "</div></center><a class='left carousel-control' href='#myCarousel' data-slide='prev'><span class='glyphicon glyphicon-chevron-left'></span><span class='sr-only'>Previous</span></a><a class='right carousel-control' href='#myCarousel' data-slide='next'><span class='glyphicon glyphicon-chevron-right'></span><span class='sr-only'>Next</span></a></div>";
 
 						
						//console.log(z);
						
						$("#caro_parent").html(z);
						//alert(gigster_id);
						$("#gigster_name").text(a.gigster_name);
						$("#gigster_phone").text(a.gigster_phone);
						$("#gigster_address").text(a.address);
						$("#gigs_done").text(a.gigs_done);
						$("#youtube_links").text(a.videos);
						$("#crew_members").text(a.crew_members);
						$("#gig_name").text(a.gig_name);
						$("#area_expertise").text(a.area_name);
						$("#preferred_location").text(a.preferred_location);
						$("#award_details").text(a.award_details);
						$("#description").text(a.description);
						
						if(count[0] != ""){
							$("#images").text(a.images);
						}
						$("#gig_image_1").attr('src',"http://localhost/"+a.images);
						for(var i=0;i<attributes.length;i++){
							//alert(key+" "+value);
							if(attributes[i] == "" || attributes[i] == null ){
								//alert(attributes[i]);
								//bar_percent += 8;
							}
							else{
								//alert(attributes[i]);
								bar_percent += 8;
							}
						}
						//alert(bar_percent);
						document.getElementById("profile_meter").style.width = bar_percent+"%";
						$("#profile_info").text("Profile Completed "+bar_percent+"%")
					}
					else{
						alert("gigsters details not retrieved");
					}
				});
			};
		
			function crew_populate(){
				$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=crew_populate&gigster_id="+gigster_id,
					dataType : "json"
				}).done(function(data){
					console.log(data);
					if(data.status == "success"){
						var a = data.response;
						var x = "",y = "";				
						
						for(var i=0,j=1;i<a.length;i++,j++){
							y = a[i];
							x+="<div class='box box-primary column' id='id"+i+"'><div><center><h3>Crew Member "+j+"</h3></center></div><center><img src="+"http://localhost/"+y.image_path+" class='crew_img'></center><center><div class='box-body'><h4>Name : <span>"+y.sub_gigster_name+"</span></h4><h4>Area of Expertise : <span>"+y.sub_gig_area_name+"</span></h4><h4>Gig Type : <span>"+y.sub_gig_type_name+"</span></h4></div></center></div>";
						}
						$("#crew_info_show").html(x);
					}
					else{
						alert("fetch failure");
					}
					
				});
			};
			populate();
			crew_populate();
		
		$("#edit_profile").click(function(){
			window.location.assign("profile_edit.php");
		});
			
		$("#add_crew").click(function(){
			$("#crew_add").modal();
		});
		
		$("#add_crew_member").click(function(){
			$("#crew_add").modal("hide");
			var sub_gigster_name = $("#gigster_name_crew").val();
			var sub_area_expertise = $("#area_expertise_add").val();
			var sub_gig_type = $("#gig_type_add").val();
			//alert(sub_gigster_name+" "+sub_gig_area_id+" "+sub_gig_type_id)
			$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=add_crew_member&gigster_id="+gigster_id+"&sub_gigster_name="+sub_gigster_name+"&sub_area_expertise="+sub_area_expertise+"&sub_gig_type="+sub_gig_type,
					dataType : "json"
			}).done(function(data){
				console.log(data);
				crew_populate();
				populate();
			});
		});
		
		$("#update_crew").click(function(){
			$("#crew_update").modal();
			function show_crew(){
				$.ajax({
						method : "POST",
						url : "http://localhost/admin123/api/gigster_profile.php",
						data : "action=get_crew_names&gigster_id="+gigster_id,
						dataType : "json"
				}).done(function(data){
					console.log(data);
					if(data.status == "success"){
						var a = data.response;
						var x = "<option selected>Please select a Gigster</option>",y = "";
						for(var i = 0;i<a.length;i++){
							y = a[i];
							x += "<option value="+y.sub_gigster_id+">"+y.sub_gigster_name+" </option>";
						}
						$("#select_gigster").html(x);
					}
					else{
						alert("crew names could not be fetched");
					}
				});
			}
			show_crew();
		});
		
		$("#select_gigster").change(function(){
			var sub_gigster_id = $("#select_gigster").val();
			var s = "";
			//alert(sub_gigster_id);
			$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=sub_gigster_details&sub_gigster_id="+sub_gigster_id,
					dataType : "json"
			}).done(function(data){
				console.log(data);
				$("#sub_gigster_name_update").val(data.response.sub_gigster_name);
				document.getElementById("gig_type_update").value = data.response.sub_gig_type_id;
				document.getElementById("area_expertise_update").value = data.response.sub_gig_area_id;
				s = "<img src='"+"http://localhost/"+data.response.image_path+"' style='width:200px;height:100px;'>";
				$("#preview").html(s);
				//alert(sub_gigster_id);
				var a = "<form action='http://localhost/upload_file.php?action=crew_image&sub_gigster_id="+sub_gigster_id+"' method='post' enctype='multipart/form-data'>Select image to upload:<input type='file' name='fileToUpload' id='fileToUpload'><input type='submit' value='Upload Image' id='upload' name='submit'></form>";
				$("#form_div").html(a);
				//$("#area_expertise_update").val(data.response.gig_area);
			});
		});
		
		$("#update_crew_member").click(function(){
			var sub_gigster_id = $("#select_gigster").val();
			var sub_gigster_name = $("#sub_gigster_name_update").val();
			var sub_gig_area_id = $("#area_expertise_update").val();
			var sub_gig_type_id = $("#gig_type_update").val();
			//alert(sub_gigster_id+" "+sub_gigster_name+" "+sub_gig_area_id+" "+sub_gig_type_id);
			$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=update_crew_member&sub_gigster_id="+sub_gigster_id+"&sub_gigster_name="+sub_gigster_name+"&sub_gig_area_id="+sub_gig_area_id+"&sub_gig_type_id="+sub_gig_type_id,
					dataType : "json"
			}).done(function(data){
				console.log(data);
				$("#crew_update").modal("hide");
				crew_populate();
				
			});
		});
		
		$("#delete_crew_member").click(function(){
			var sub_gigster_id = $("#select_gigster").val();
			$.ajax({
					method : "POST",
					url : "http://localhost/admin123/api/gigster_profile.php",
					data : "action=delete_crew_member&sub_gigster_id="+sub_gigster_id+"&gigster_id="+gigster_id,
					dataType : "json"
			}).done(function(data){
				console.log(data);
				$("#crew_update").modal("hide");
				crew_populate();
				populate();
			});
		});
	/*
	$("#id0").click(function(){
		$('#id0').addClass('wow slideInLeft');
	});
	$("#id1").click(function(){
		$("#id1").addClass('wow slideInRight');		
	});*/
	
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
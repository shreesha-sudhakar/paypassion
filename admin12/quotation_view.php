<?php include 'header.php';?>
	<center>
		<h2>Quotation View</h2>
	</center>
	
	<br/>
	<div class="box">
		<div class="box-header">
              <h3 class="box-title">Quotes</h3>
        </div>
		<div class="box-body">
			<table id="quote_view" class="table table-bordered table-hover">
	
			</table>
		</div>
	</div>
	 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">QUOTATION STATUS</h2>
              </div>
			  <div class="container" >
				<div class="row">
					<h4 class="col-sm-4">Quotation Id</h4>
					<h4 class="col-sm-4" id="quote_id"></h4> 
				</div>
				<br/>
				<div class="row">
					<h4 class="col-sm-4">Quotation Amount</h4>
					<div class="col-sm-4"><input type="text" placeholder="amount" id="amount_quote"></div>
				</div>
				
				<div class="form-group">
					<h4>Quotation Status</h4>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" class="status" value="accepted" checked>
                      Accept
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" class="status" value="onprocess">
                      Process
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" class="status" value="rejected">
                      Reject
                    </label>
                  </div>
                </div>
				<button class="btn btn-primary" id="history" data-toggle='modal' data-target='#history_modal'>quotation history</button>
              </div>
				<span id="quote_sent_alert" style="display:none;">Quote sent, wait for customer reply.</span>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="send_quote">Send Quote</button>
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	</div>
	<!-- negotiation history modal-->
	                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	
      


	<div class="modal fade" id="history_modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">QUOTATION STATUS</h2>
              </div>
				<div class="modal-body">
					<div>
						<table id="history_view" class="table table-striped"></table>
					</div>
				</div>
            
          </div>
          
        </div>
	</div>
	<!-- negotiation history moodal ends-->
<?php include 'footer.php';?>

<script>
	$(document).ready(function(){
		var gigster_id = window.localStorage.getItem('gigster_id');
		if(gigster_id){
			
			//alert(gigster_id);
			function reply(){
			$(".reply_quote").click(function(){
				console.log("buttonclicked");
				var q_id=$(this).parent().parent().children('.q_id').html();
			
				
				$.ajax({
							method : "POST",
							url : "http://localhost/admin123/api/gigster_profile.php",
							data : "action=quote_button&quotation_id="+q_id,
							dataType : "json"
				}).done(function(data){
					console.log(data);
					//alert(data.response);
					if(data.response == '1'){
						document.getElementById("send_quote").disabled = true;
						$("#quote_sent_alert").show();
					}
				});

			
			$("#quote_id").text(q_id);
			$("#history").click(function(){
				$.ajax({method: "POST",
						url: "http://localhost/admin123/api/gigster_profile.php",
						data: "action=quotation_history&quotation_id="+q_id,
						dataType: "JSON"}).done(function(data){
							console.log(data);
							if(data.status == "success"){
								var x='', y='',a='';
								y="<thead><tr><td>Quote Maker Id</td><td>Amount</td><td>Status</td></tr></thead><tbody>";
								x=data.response.gigster;
								a=data.response.customer;
								for(var i=0;i<data.response.customer.length;i++){	
									x=data.response.gigster[i];
									a=data.response.customer[i];
									y+="<tr><td>gigster</td><td>"+x.amount+"</td><td>"+x.flag+"</td></tr><tr><td>customer</td><td>"+a.amount+"</td><td>"+a.flag+"</td></tr>";
								}
								if(data.response.gigster.length>data.response.customer.length){
									len = data.response.gigster.length;
									x = data.response.gigster[len-1]; 	
									y+="<tr><td>gigster</td><td>"+x.amount+"</td><td>"+x.flag+"</td></tr>";
								}
								y+="</tbody>";
								$("#history_view").html(y);
								
							}
						});
			});
			console.log(q_id);
			$("#send_quote").click(function(){
				
				var flag = $(".status:checked").val();
				var quote_amount = $("#amount_quote").val();
				alert(quote_amount);
				if(quote_amount != " "){
					alert(q_id+" "+quote_amount+" "+flag);
					$.ajax({method: "POST",
							url: "http://localhost/admin123/api/gigster_profile.php",
							data: "action=gig_reply_quote&quotation_id="+q_id+"&quote_amount="+quote_amount+"&flag="+flag+"&customer="+"0",
							dataType: "JSON"}).done(function(data){
								console.log(data);
								//document.getElementById("send_quote").disabled = true;
								//alert("disabled");
								window.location.assign("quotation_view.php");
								
					});
				}
				else{
					alert("enter amount");
				}
				});
				});
		
			}
			function populate_quotation(){
				var a='', b='', c='';
				$.ajax({
						method : "POST",
						url: "http://localhost/admin123/api/gigster_profile.php",
						data: "action=quotation_view&gigster_id="+gigster_id,
						dataType:"JSON"
				}).done(function(data){
					console.log(data);
					if(data.status == "success"){
						b="<thead><tr><td>Quotation Id</td><td>Customer Id</td><td>Gig Date</td><td>Gig Address</td><td>Area of expertise</td><td>Specific Skill</td><td>Gig Duration</td><td>Crowd Expected<td>Reply</td></tr></thead><tbody>";
						for(var i=0;i<data.response.length;i++){
							a=data.response[i];
							b+="<tr><td class='q_id'>"+a.quotation_id+"</td><td>"+a.customer_id+"</td><td>"+a.gig_date+"</td><td>"+a.gig_address+"</td><td>"+a.gig_area+"</td><td>"+a.gig_type+"</td><td>"+a.duration+"</td><td>"+a.crowd+"</td><td><button type='button' class='btn btn-default reply_quote' data-toggle='modal' data-target='#modal-default'>Reply</button></td></tr>";
						}
						b+="</tbody>";
						$("#quote_view").html(b);
						reply();
					}
				});
			}
			populate_quotation();	
		}
		else{
			alert("please login to access details");
			window.location.assign("index.php");
		}
		
	});

</script>
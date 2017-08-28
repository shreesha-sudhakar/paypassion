<?php
	header("Access-Control-Allow-Origin: *");
	include 'connect.php';
	//post method
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//action variable isset
		if (isset($_POST["action"])){
			//ACTION to be performed on the DB.
			$action = $_POST["action"]; 
			switch($action){
			case "display_customer_details":		
				if(isset($_POST['id'])){
					$lead_id=$_POST['id'];
					//displaying gigster table 				
					$display=mysqli_query($connect,"select * from gigsters");
					if(mysqli_num_rows($display)>0){
						$disp=array();
						$i=0;
						while($row=mysqli_fetch_array($display)){
							$id=$row['id'];
							$gig_type=$row['gig_type'];					
							$gig_date=$row['gig_date'];
							$gig_venue=$row['gig_venue'];
							$gig_aud_strength=$row['gig_aud_strength'];
							$gig_req_desc=$row['gig_req_desc'];
							$approx_budget=$row['approx_budget'];	
							$disp[$i]=array('id'=>$id,'gig_type'=>$gig_type,'gig_date'=>$gig_date,'gig_venue'=>$gig_venue,'gig_aud_strength'=>$gig_aud_strength,
									'gig_req_desc'=>$gig_req_desc,'approx_budget'=>$approx_budget);
							$i++;
						}  
						$status = "success";
						$message =  "Displaying the data from gigsters table.";						
						$response=array("disp"=>$disp);
						} else {
						//if data is not there in the table.
						$status = "failure";
						$response = null;
						$message =  "Data is not found.";										
					}
					}else{			//if data is not there in the table.
					$status = "failure";
					$response = null;
					$message =  "Data is not found.";										
				}												
				break;
				default:
				//Action is parameter not set.
				$status = "failure";
				$response = null;
				$message = "Action enetered is wrong.";
				break;
			}
			} else { 
			//Action parameter is not set.
			$status = "failure";
			$response = null;
			$message = "its not posting actions.";
		}
		} else {
		// Incorrect API method used. Use POST.
		$status = "failure";
		$response = null;
		$message = "failed request to the server";
	}					
	$data = array("status"=>$status, "message"=>$message, "response"=>$response);
	$data = json_encode($data);
	echo $data;
?>				
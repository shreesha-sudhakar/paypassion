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
				case "display_gig_profile":		
				if(isset($_POST['id'])){
					$area_id=$_POST['id'];
					//displaying the gig type based on area name 				
					$display=mysqli_query($connect,"SELECT gig_type.gig_type_name, area.gig_area FROM `gig_type`,area WHERE area.area_id=gig_type.area_id and area.area_id='$area_id'");
					if(mysqli_num_rows($display)>0){
						$disp=array();
						$i=0;
						while($row=mysqli_fetch_array($display)){
							$area_id=$row['area_id'];
							$gig_type_name=$row['gig_type_name'];					
							$gig_area=$row['gig_area'];
							$disp[$i]=array('area_id'=>$area_id,'gig_area'=>$gig_area,'gig_type_name'=>$gig_type_name);
							$i++;
						}  
						$status = "success";
						$message =  "Displaying the data from gig profile table.";						
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
				// Action parameter not set.
				default:
				$status = "failure";
				$response = null;
				$message = "Action enetered is wrong.";
				break;
			}
			} else {
            // Action parameter not set.			
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
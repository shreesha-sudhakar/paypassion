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
				case "gig_profile_insert":
				if(isset($_POST['gig_name'])&& isset($_POST['gig_type']) && isset($_POST['address']) && isset($_POST['pre_address'])&& isset($_POST['desc']) && isset($_POST['awards'])) {
					$gig_name=$_POST['gig_name'];
					$gig_type=$_POST['gig_type'];
					$address=$_POST['address'];
					$pre_address=$_POST['pre_address'];
					$desc=$_POST['desc'];
					$awards=$_POST['awards'];
					
					//inserting a values to the customer table
					$insert=mysqli_query($connect,"INSERT INTO `gigster_profile`(`gigster_id`, `gig_name`, `gig_type`, `address`, `preferred_location`, `description`, `images`, `videos`, `reviews`, `rating`, `award_details`, `gigs_done`, `premium`, `created_timestamp`, `updated_timestamp`, `status`) VALUES 
					('$gig_id','$gig_name','$gig_type','$address','$pre_address','$desc','images','videos','','','$awards','','','','','')");
					
					$status = "success";
					$response = array("insert"=>$insert);
					$message =  "Data is inserted into table.";
					} else {
					// executes when data not inserted
					$status = "failure";
					$response = null ;
					$message =  "Data is not inserted.";			
				}
				break;
				//gig profile dispaly
				case "display_gig_profile":		
				if(isset($_POST['id'])){
					$lead_id=$_POST['id'];
					//displaying and updating the customer table 				
					$display=mysqli_query($connect,"select * from gigster_profile where id='$id'");
					if(mysqli_num_rows($display)>0){
						$disp=array();
						$i=0;
						while($row=mysqli_fetch_array($display)){
							$id=$row['id'];
							$gig_name=$row['gig_name'];					
							$gig_type=$row['gig_type'];
							$address=$row['address'];
							$preferred_location=$row['preferred_location'];
							$description=$row['description'];
							$award_details=$row['award_details'];
							$gigs_done=$row['gigs_done'];
							$disp[$i]=array('id'=>$id,'gig_name'=>$gig_name,'gig_type'=>$gig_type,'address'=>$address,
							'preferred_location'=>$preferred_location,'description'=>$description,'award_details'=>$award_details,'gigs_done'=>$gigs_done);
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
				case "gig_profile_update":
				//gig profile update
				if(isset($_POST['gig_id'])&& $_POST['gig_name'])&& isset($_POST['gig_type']) && isset($_POST['address']) && isset($_POST['pre_address'])&& isset($_POST['desc']) && isset($_POST['awards'])) {
					$gig_name=$_POST['gig_name'];
					$gig_type=$_POST['gig_type'];
					$address=$_POST['address'];
					$pre_address=$_POST['pre_address'];
					$desc=$_POST['desc'];
					$awards=$_POST['awards'];
					$gig_id=$_POST['gig_id'];
					$update=mysqli_query($connect,"UPDATE `gigster_profile` SET `gig_name`='$gig_name',`gig_type`='gig_type',`address`='$address',`preferred_location`='$pre_address',
					`description`='$desc',`images`='',`videos`='',`award_details`='$awards',`gigs_done`='$no_of_gigs',
					`updated_timestamp`=now() WHERE gigster_id='$gig_id'");
					
					$status='success';
					$response=null;
					$message='data is updated';
					} else {
					//displays data is not updated
					$status='failure';
					$response=null;
					$message='Data is not updated.'; 
				}
			break;
			case "gig_profile_update":
				//gig profile update
				if(isset($_POST['gig_id'])&& $_POST['gig_name'])) {
					$status=$_POST['status'];
					$gig_id=$_POST['gig_id'];
					$update=mysqli_query($connect,"UPDATE `gigster_profile` SET `status`='deleted',
					 WHERE gigster_id='$gig_id'");
					$status='success';
					$response=null;
					$message='data is updated';
					} else {
					//displays data is not updated
					$status='failure';
					$response=null;
					$message='Data is not updated.'; 
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
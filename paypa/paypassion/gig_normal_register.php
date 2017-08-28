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
				//login for customer care
				case "gig_details":
				if(isset($_POST['name'])&& isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {
					$name=$_POST['name'];
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					
					//inserting a values to the customer table
					$insert=mysqli_query($connect,"INSERT INTO `gig_login`(`id`, `name`, `phone`, `email`,`password`, `email_verify`, `phone_verify`, `verified`, `status`,`access`) VALUES 
					('','$name','$phone','$email','$password','','','','','')");
					
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
				
				case "display_gig_details":		
				if(isset($_POST['id'])){
					$lead_id=$_POST['id'];
					//displaying and updating the customer table 				
					$display=mysqli_query($connect,"select * from gig_login where id='$id'");
					if(mysqli_num_rows($display)>0){
						$disp=array();
						$i=0;
						while($row=mysqli_fetch_array($display)){
							$id=$row['id'];
							$name=$row['name'];					
							$phone=$row['phone'];
							$email=$row['email'];
							$password=$row['password'];	
							$disp[$i]=array('id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,);
							$i++;
						}  
						$status = "success";
						$message =  "Displaying the data from customer table.";						
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
				
				
				case "gig_update":			
				// updating the customer table 				
				if(isset($_POST['id'])) {
					$name=$_POST['name'];					
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					$password = $_['password'];
					mysqli_query($connect,"UPDATE `gig_login` SET `name`='$name',`phone`='$phone',`email`='$email',`password`='$password'  WHERE id='$id'");	
					
					$status = "success";
					$response= null;
					$message =  "Data is updated into customer table.";
					} else {
					//customer id not set
					$status = "failure";
					$response = null;
					$message =  "id is not set.";
					
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
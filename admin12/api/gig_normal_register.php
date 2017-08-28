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
				if(isset($_POST['name'])&& isset($_POST['phone']) && isset($_POST['password'])) {
					$name=$_POST['name'];
					$phone=$_POST['phone'];
					$password=$_POST['password'];
					
					//inserting a values to the customer table
					$insert1 = mysqli_query($connect,"select phone,name from `gig_login` where phone='$phone'");
					if(mysqli_num_rows($insert1)>0){
						$status = "failure";
						$response = null;
						$message = "customer already registered ,use forgot password instead";
					}
					else{
					//inserting a values to the customer table
					$insert=mysqli_query($connect,"INSERT INTO `gig_login`(`gigster_id`, `name`, `email`, `email_verify`,`phone`, `phone_verify`, `password`, `created_timestamp`, `updated_timestamp`,`status`,`verified`,`access`) VALUES 
					('','$name','','','$phone','','$password',now(),'','','','admin')");
					$phone_list=mysqli_query($connect,"select distinct(phone) from `gig_login` where phone='$phone'");
						if(mysqli_num_rows($phone_list)>0){
								/*$result10 = mysqli_query($connect,"select gigster_id from gig_login where phone='$phone'");
								if(mysqli_num_rows($result10)>0){
									while($row = mysqli_fetch_array($result10)){
									$gigster_id = $row['gigster_id'];
									}
									$status = "success";
									$response = null;
									$message = "gigster_id retrieved";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "gigster_id not retrieved";
								}
								$result11 = mysqli_query($connect,"insert into gigster_profile(gigster_id)values('$gigster_id')");
								if($result11){
									$status = "success";
									$response = $gigster_id;
									$message = "gigster_profile row initialized";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "gigster_profile row not initialized";
								}*/
							$status = "success";
							$response = NULL;
							$message =  "Phone number correct.";
							// code to generate randon 6 digit number
							function generateRandomString($length = 6) {
	   							$characters = '0123456789';
	   							$charactersLength = strlen($characters); 
	   							$randomString = '';
	   							for ($i = 0; $i < $length; $i++) {
	       							$randomString .= $characters[rand(0, $charactersLength - 1)];
	   							}
	   							return $randomString;
							}
							$rangen=generateRandomString();
							$phoned='91'.$phone;
							$coded=$rangen;
							mysqli_query($connect,"update `gig_login` set phone_verify='$coded',verified='0' where phone='$phone'");
	    					// Textlocal account details
	    					$username = 'info@a1sports.in';
	    					$password = 'Manu.8080';
	    					// Message details
	    					$numbers = $phoned;
	    					$sender = urlencode('AONESP');
	    					$message = "$coded is your verification code for A1sports";
	    					// Prepare data for POST request
	    					$data = array('username' => $username, 'password' => $password, 'numbers' => $numbers, "sender" => $sender, "message" => $message, "test" => false);
	    					// Send the POST request with cURL
						    $ch = curl_init('http://api.textlocal.in/send/');
						    curl_setopt($ch, CURLOPT_POST, true);
						    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						    $response = curl_exec($ch);
						    curl_close($ch);
						 
						$status = "success";
						$response = array("insert"=>$insert);
						$message =  "Data is inserted into table.";
					}
					else {
							$status = "failure";
							$response = NULL;
							$message =  "No Data Found.";
						}

				}


					
				}
					 else {
					// executes when data not inserted
					$status = "failure";
					$response = null ;
					$message =  "Data is not set.";			
				}
				break;	
				
				case "gigster_id_fetch":
					if(isset($_POST['phone'])){
						$phone = $_POST['phone'];
						$result10 = mysqli_query($connect,"select gigster_id from gig_login where phone='$phone'");
								if(mysqli_num_rows($result10)>0){
									while($row = mysqli_fetch_array($result10)){
									$gigster_id = $row['gigster_id'];
									}
									$status = "success";
									$response = null;
									$message = "gigster_id retrieved";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "gigster_id not retrieved";
								}
								$result11 = mysqli_query($connect,"insert into gigster_profile(gigster_id,created_timestamp)values('$gigster_id',now())");
								if($result11){
									$status = "success";
									$response = null;
									$message = "gigster_profile row initialized";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "gigster_profile row not initialized";
								}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "phone not set";
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
				case "RESET_VERIFY":
			if(isset($_POST['otp'])){
				$otp=$_POST['otp'];
						//reseting the password by email id
									$verify=mysqli_query($connect,"select verified,phone_verify from `gig_login` where verified='0' and phone_verify='$otp'");
									if(mysqli_num_rows($verify)>0){
									$resp=array();
									$i=0;
									while($row=mysqli_fetch_assoc($verify))
									{						
										$verified=$row['verified'];
										
									}	
										mysqli_query($connect,"update `gig_login` set `verified`=1 where phone_verify='$otp'");
										$status = "success";
										$response = NULL;
										$message =  "Data is updated into the table.";
										
								} else { 
										$status = "failed";
										$response = NULL;
										$message =  "Data is not updated into the login table.";
										}
								} else { 
										$status = "failed";
										$response = NULL;
										$message =  "Phone number not set.";
										}
																
								break;
					case "login":
					//if isset
					if(isset($_POST['phone_number']) && isset($_POST['password'])){
						//assigning variable for user_id and password
						$phone_number=$_POST['phone_number'];	
						$password=$_POST['password'];
						//sql for login
						$verify_login= mysqli_query($connect,"select * from `gig_login` where phone='$phone_number' and password='$password' and verified='1'");	
						if(mysqli_num_rows($verify_login)>0){
							while($row = mysqli_fetch_array($verify_login)){
								$id = $row['gigster_id'];
								$name = $row['name'];
								$phone_number =$row['phone'];
								$password=$row['password'];
							}								
							$status = "success";
							$response =array("id"=>$id,"name"=>$name,"phone_number"=>$phone_number,"password"=>$password);
							$message = "phone_number and password is correct";
						} else {
							$status = "failure";
							$response = null;
							$message = "phone_number not  exist";
						}
					}
					break;
					case "PHONE":
					if(isset($_POST['phone_number'])){
					$phone_number=$_POST['phone_number'];
						//getting the values from the task table and assigning to the task_list
						$phone_list=mysqli_query($connect,"select distinct(phone) from `gig_login` where phone='$phone_number'");
						if(mysqli_num_rows($phone_list)>0){
							$status = "success";
							$response = NULL;
							$message =  "Phone number correct.";
						// code to generate randon 6 digit number
						function generateRandomString($length = 6) {
						   $characters = '0123456789';
						   $charactersLength = strlen($characters);
						   $randomString = '';
						   for ($i = 0; $i < $length; $i++) {
							   $randomString .= $characters[rand(0, $charactersLength - 1)];
						   }
						   return $randomString;
						}
						$rangen=generateRandomString();
						$phoned='91'.$phone_number;
						$coded=$rangen;
						mysqli_query($connect,"update `gig_login` set phone_verify='$coded',verified='0' where phone='$phone_number'");
							// Textlocal account details
							$username = 'info@a1sports.in';
							$password = 'Manu.8080';

							// Message details
							$numbers = $phoned;
							$sender = urlencode('AONESP');
							$message = "$coded is your verification code for PAYPASSION";


							// Prepare data for POST request
							$data = array('username' => $username, 'password' => $password, 'numbers' => $numbers, "sender" => $sender, "message" => $message, "test" => false);

							// Send the POST request with cURL
							$ch = curl_init('http://api.textlocal.in/send/');
							curl_setopt($ch, CURLOPT_POST, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$response = curl_exec($ch);
							curl_close($ch);
							} else {
										$status = "failure";
										$response = NULL;
										$message =  "No Data Found.";
									}
					}else{
						$status = "failure";
						$response = NULL;
						$message =  "Isset is not working.";
					}
					break;	
					case "UPDATE_PASSWORD":
					if(isset($_POST['password']) && isset($_POST['phone_number'])){
						$password=$_POST['password'];
						$phone_number=$_POST['phone_number'];
				//reseting the password by email id
							$update_password=mysqli_query($connect,"select password,phone from `gig_login` where phone='$phone_number'");
							if(mysqli_num_rows($update_password)>0){
								mysqli_query($connect,"update `gig_login` set `password`='$password' where phone='$phone_number'");
								$status = "success";
								$response = NULL;
								$message =  "Password is reset into the table.";
						} else { 
								$status = "failed";
								$response = NULL;
								$message =  "Password is not updated into the login table.";
								}
					}else{
						$status = "failed";
						$response = NULL;
						$message =  "Isset is not set.";
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
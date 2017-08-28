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
				case "customer_register":
				if(isset($_POST['name'])&& isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {
					$name=$_POST['name'];
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					$password=$_POST['password'];

					$insert1 = mysqli_query($connect,"select phone,customer_name from customer_login where phone='$phone'");
					if(mysqli_num_rows($insert1)>0){
						$status = "failure";
						$response = null;
						$message = "customer already registered ,use forgot password instead";
					}
					else{
					//inserting a values to the customer table
					$insert=mysqli_query($connect,"INSERT INTO `customer_login`(`customer_id`, `customer_name`, `phone`, `email`,`password`, `email_verify`, `phone_verify`,`status`) VALUES 
					('','$name','$phone','$email','$password','','','')");
					$phone_list=mysqli_query($connect,"select distinct(phone) from customer_login where phone='$phone'");
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
							$phoned='91'.$phone;
							$coded=$rangen;
							mysqli_query($connect,"update customer_login set phone_verify='$coded',verified='0' where phone='$phone'");
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

				case "login_customer":
					if(isset($_POST['username']) && isset($_POST['password'])){
						$username = $_POST['username'];
						//echo $username;
						$password = $_POST['password'];
						$result = mysqli_query($connect,"select * from customer_login where ((email = '$username' OR phone = '$username') AND password = '$password')");
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_array($result)) {
								$obj=array(
											'customer_id' => $row['customer_id'],
											'customer_name' => $row['customer_name']
									);
							}
							$status = "success";
							$response = $obj;
							$message  = "user found";
						}
						else{
							$status = "failure";
							$response = null;
							$message  = "user not found";	
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message  = "user credentials not set";
					}

				break;
				case "otp_verify":
                    if (isset($_POST['otp'])) {
                        $otp        = $_POST['otp'];
                        $phone      = $_POST['phone'];
                        $verify_otp = mysqli_query($connect, "update customer_login set verified ='1' where phone_verify='$otp'");
                        //echo $verify_otp;
                        if ($verify_otp) {
                            $status   = "success";
                            $response = null;
                            $message  = "otp verified";
                        }
                        else {
                            $status   = "failure";
                            $response = NULL;
                            $message  = "otp incorrect";
                        }
                    }
                    else {
                        $status   = "failure";
                        $response = NULL;
                        $message  = "type missing";
                    }
                    break;

				case "display_customer_details":		
				if(isset($_POST['id'])){
					$lead_id=$_POST['id'];
					//displaying and updating the customer table 				
					$display=mysqli_query($connect,"select * from customer where id='$id'");
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
				case "customer_update":			
				// updating the customer table 				
				if(isset($_POST['id'])) {
					$name=$_POST['name'];					
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					mysqli_query($connect,"UPDATE `customer` SET `name`='$name',`phone`='$phone',`email`='$email' WHERE id='$id'");	
					
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
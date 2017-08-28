<?php
	//	header("Access-Control-Allow-Origin: *");
	ob_start();
	include 'connect.php';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if (isset($_POST["action"])){
			//ACTION to be performed on the DB.
			$action = $_POST["action"];
			if(isset($_POST['phone'])){
				$phone=$_POST['phone'];
				switch ($action){
					case "PHONE":
					//getting the values from the customer care customer_login table
					$phone_list=mysqli_query($connect,"select distinct(phone) from gig_customer_login where phone='$phone'");
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
						mysqli_query($connect,"update gig_customer_login set otp='$coded',verify='0' where phone='$phone'");
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
						} else {
						//displays data not found
						$status = "failure";
						$response = NULL;
						$message =  "No Data Found.";
					}
					break;	
					case "RESET_VERIFY":
					if(isset($_POST['otp'])){
						$otp=$_POST['otp'];
						//reseting the password by otp
						$verified=mysqli_query($connect,"select verify,otp from gig_customer_login where verify='0' and otp='$otp'");
						if(mysqli_num_rows($verified)>0){								
							$verify=$row['verify'];								
							mysqli_query($connect,"update customer_login set `verify`=1 where otp='$otp'");
							$status = "success";
							$response = NULL;
							$message =  "Data is updated into the table.";
							} else { 
							//executes when data is not updated in customer_login table
							$status = "failure";
							$response = NULL;
							$message =  "Data is not updated into the customer_login table.";
						}
						} else { 
						//executes when otp is invalid
						$status = "failure";
						$response = NULL;
						$message =  "otp is invalid";
					}																
					break;
					case "UPDATE_PASSWORD":
					//reseting the password by phone number
					$update_password=mysqli_query($connect,"select password,phone from gig_customer_login where phone='$phone'");
					if(mysqli_num_rows($update_password)>0){
						$password=$_POST['password'];
						mysqli_query($connect,"update gig_customer_login set `password`='$password',verify='1' where phone='$phone'");
						$status = "success";
						$response = NULL;
						$message =  "Password is reset into the table.";
						} else { 
						//executes when password is not updated in customer_login table
						$status = "failed";
						$response = NULL;
						$message =  "Password is not updated into the customer_login table.";
					}
					break;
					default:
					$status = "failure";
					$response = null;
					$message =  "Incorrect action value provided.";
					break;
				}// End switch case
				} else{
				// Action parameter not set.
				$status = "failure";
				$response = null;
				$message =  "phone number is not set.";
			}
			} else {
			// Action parameter not set.
			$status = "failure";
			$response = null;
			$message =  "Action not set.";
		}
		} else {
		// Incorrect API method used. Use POST.
		$status = "failure";
		$response = null;
		$message =  "Incorrect API method used.";
	}
	$data = array("status"=>$status, "message"=>$message, "response"=>$response);
	$data = json_encode($data);
	echo $data;
	
?>


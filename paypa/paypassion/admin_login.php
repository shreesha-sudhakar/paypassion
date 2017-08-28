<?php
	header("Access-Control-Allow-Origin: *");
	include 'connect.php';
	//post method
	if ($_SERVER['REQUEST_METHOD'] == "GET"){
		//action variable isset
		if (isset($_GET["action"])){
			//ACTION to be performed on the DB.
			$action = $_GET["action"]; 
			switch($action){
				//login for user
				case "login":
				//if isset
				if(isset($_GET['phone']) && isset($_GET['password'])){
					//assigning variable for phone and password
					$phone=$_GET['phone'];	
					$password=$_GET['password'];
					//sql for login
					$verify_login= mysqli_query($connect,"select * from login where access='admin' and verify='1' and (phone='$phone' or email='$email') and password='$password'");	
					if(mysqli_num_rows($verify_login)>0){
						while($row = mysqli_fetch_array($verify_login)){
							$id = $row['id'];
							$name = $row['name'];
							$phone =$row['phone'];
						}		
						mysqli_query($connect,"update login set `status`='available' where phone='$phone'");
						
						$status = "success";
						$response =array("id"=>$id,"name"=>$name,"phone"=>$phone);
						$message = "phone_number and password is correct";
						} else {
						//executes when phone_number not exist
						$status = "failure";
						$response = null;
						$message = "phone_number not exist";
					}
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
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
				//gig_login for user
				case "gig_login":
				//if isset
				if(isset($_POST['phone']) && isset($_POST['password'])){
					//assigning variable for phone and password
					$phone=$_POST['phone'];	
					$password=$_POST['password'];
					//sql for gig_login
					$verify_gig_login= mysqli_query($connect,"select * from gig_login where verify='1' and (phone='$phone' or email='$email') and password='$password'");	
					if(mysqli_num_rows($verify_gig_login)>0){
						while($row = mysqli_fetch_array($verify_gig_login)){
							$id = $row['id'];
							$name = $row['name'];
							$phone =$row['phone'];
						}		
						mysqli_query($connect,"update gig_login set `status`='available' where phone='$phone'");
						
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
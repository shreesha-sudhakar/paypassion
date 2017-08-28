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
				case "quotation1":	
				if(isset($_POST['customer_id']) && 
				isset($_POST['quote_amount']) && isset($_POST['gig_date']) && isset($_POST['gig_address']) && 
				isset($_POST['gig_area']) && isset($_POST['gig_type']) && isset($_POST['crowd']) && isset($_POST['duration']) && isset($_POST['gigster_id'])){
					//$action = $_POST['action'];
					//$quotation_id = $_POST['quotation_id'];
					$customer_id = $_POST['customer_id'];
					$quote_amount = $_POST['quote_amount'];
					$gig_date = $_POST['gig_date'];
					$gigster_id = $_POST['gigster_id'];
					$gig_address = $_POST['gig_address'];
					$gig_area = $_POST['gig_area'];
					$gig_type = $_POST['gig_type'];
					$crowd = $_POST['crowd'];
					$duration = $_POST['duration'];
					$result = mysqli_query($connect,"INSERT INTO `quotation`(`quotation_id`, `customer_id`, `gigster_id`, `gig_date`, `gig_address`, `gig_area`, `gig_type`, `crowd`, `duration`, `quote_amount`) VALUES ('','$customer_id','$gigster_id','$gig_date','$gig_address','$gig_area','$gig_type','$crowd','$duration','$quote_amount')");
						$status = 'success';
						$response = null;
						$message = 'row inserted into quotation';
						
					}else{
					$status = 'failure';
					$message = 'values not set';
					$response = null;
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
			$message = "its not posting actions.....";
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
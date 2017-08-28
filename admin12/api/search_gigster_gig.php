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
				case "gig_gigster_search":
					if(isset($_POST['search_key'])){
						$search_key = $_POST['search_key'];
						$hit_vals = array();
						$count = 0;
						$result = mysqli_query($connect,"select gigster_profile.gigster_name,gigster_profile.gig_name from gigster_profile");
						if(mysqli_num_rows($result)>0){
							$result1 = mysqli_query($connect,"select gig_area from area");
							if(mysqli_num_rows($result1)>0){
								while($row1 = mysqli_fetch_array($result1)){
									if((stristr($row1['gig_area'],$search_key)) != false){
									$hit_vals[$count] = $row1['gig_area'];
									$count += 1;
									}
								}
							}
							else{
								$status = "failure";
								$message = "gig areas not retrived";
								$response = null;
							}
							while($row = mysqli_fetch_array($result)){
								if((stristr($row['gigster_name'],$search_key)) != false){
									$hit_vals[$count] = $row['gigster_name'];
									$count += 1;
								}
								if((stristr($row['gig_name'],$search_key)) != false){
									$hit_vals[$count] = $row['gig_name'];
									$count += 1;
								}
							}
							$status = "success";
							$message = "gigsters and gig names retrieved";
							$response = $hit_vals;
						}
						else{
							$status = "failure";
							$message = "gigster name and gig name not retrieved";
							$response = null;
						}
					}
					else{
						$status = "failure";
						$message = "search key not set";
						$response = null;
					}
				break;
				default:
					$status = "failure";
					$message = "action not set";
					$response = null;
				break;
			}
			}
		else{ 
			//Action parameter is not set.
			$status = "failure";
			$response = null;
			$message = "its not posting actions.";
		}
	} 
	else {
	// Incorrect API method used. Use POST.
	$status = "failure";
	$response = null;
	$message = "failed request to the server";
	}					
	$data = array("status"=>$status, "message"=>$message, "response"=>$response);
	$data = json_encode($data);
	echo $data;
?>				
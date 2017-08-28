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
				
				case "search_display":
					if(isset($_POST['search_val'])){
						$search_val = $_POST['search_val'];
						$obj_all = array();
						$gig_area = "";
						$gig_type_name = "";
						$result = mysqli_query($connect,"select * from gigster_profile where gigster_name = '$search_val' || gig_name = '$search_val'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$area_id = $row['area_id'];
								$gig_type_id = $row['gig_type_id'];
								
								$result3 = mysqli_query($connect,"select area.gig_area,gig_type.gig_type_name from area,gig_type where area.area_id='$area_id' and gig_type.gig_type_id='$gig_type_id'");
								if(mysqli_num_rows($result3)>0){
									while($row3 = mysqli_fetch_array($result3)){
										$gig_area = $row3['gig_area'];
										$gig_type_name = $row3['gig_type_name'];
									}
								}
								
								$obj = array("gigster_id" => $row['gigster_id'],
												"gigster_name" => $row['gigster_name'],
												"gig_name" => $row['gig_name'],
												//"gigster_phone" => $row['gigster_phone'],
												"gig_area" => $gig_area,
												"area_id" => $row['area_id'],
												"gig_type_name" => $gig_type_name,
												"gig_type_id" => $row['gig_type_id'],
												"address" => $row['address'],
												"preferred_location" => $row['preferred_location'],
												"description" => $row['description'],
												"images" => $row['images'],
												"videos" => $row['videos'],
												"reviews" => $row['reviews'],
												"rating" => $row['rating'],
												"award_details" => $row['award_details'],
												"premium" => $row['premium'],
												"gigs_done" => $row['gigs_done'],
												"crew_members" => $row['crew_members']);
								array_push($obj_all,$obj);
								$status = "success";
								$response = $obj_all;
								$message = "gigster or gig details retrieved";
							}
						}
						else{
							$result1 = mysqli_query($connect,"select area_id from area where gig_area= '$search_val'");
							if(mysqli_num_rows($result1)>0){	
								while($row1 = mysqli_fetch_array($result1)){
									$area_id = $row1['area_id'];
								}
								$result2 = mysqli_query($connect,"select * from gigster_profile where area_id = '$area_id'");
								if(mysqli_num_rows($result2)>0){
									while($row2 = mysqli_fetch_array($result2)){
										$area_id = $row2['area_id'];
										$gig_type_id = $row2['gig_type_id'];
										$result4 = mysqli_query($connect,"select area.gig_area,gig_type.gig_type_name from area,gig_type where area.area_id='$area_id' and gig_type.gig_type_id='$gig_type_id'");
										if(mysqli_num_rows($result4)>0){
											while($row4 = mysqli_fetch_array($result4)){
												$gig_area = $row4['gig_area'];
												$gig_type_name = $row4['gig_type_name'];
											}
										}
										
										$obj1 = array("gigster_id" => $row2['gigster_id'],
												"gigster_name" => $row2['gigster_name'],
												"gig_name" => $row2['gig_name'],
												//"gigster_phone" => $row2['gigster_phone'],
												"gig_area" => $gig_area,
												"area_id" => $row2['area_id'],
												"gig_type_name" => $gig_type_name,
												"gig_type_id" => $row2['gig_type_id'],
												"address" => $row2['address'],
												"preferred_location" => $row2['preferred_location'],
												"description" => $row2['description'],
												"images" => $row2['images'],
												"videos" => $row2['videos'],
												"reviews" => $row2['reviews'],
												"rating" => $row2['rating'],
												"award_details" => $row2['award_details'],
												"premium" => $row2['premium'],
												"gigs_done" => $row2['gigs_done'],
												"crew_members" => $row2['crew_members']);
										array_push($obj_all,$obj1);
									}
									$status = "success";
									$message = "gigs corresponding to the corresponding area retrieved";
									$response = $obj_all;
								}
								else{
									$status = "failure";
									$message = "no data found for the coeeresponding area";
									$response = null;
								}
							}
							else{
								$status = "failure";
								$message = "search val is not related to area of expertise";
								$response = null;
							}
						}
					}
					else{
						$status = "failure";
						$message = "search val not set";
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
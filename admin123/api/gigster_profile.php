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
			
				case "gigster_profile":
					if(isset($_POST['gigster_name'])){/* && isset($_POST['phone']) && isset($_POST['gigs_done']) && isset($_POST['gig_name']) && isset($_POST['area_expertise']) && isset($_POST['gig_type']) && isset($_POST['preferred_location']) && isset($_POST['address']) && isset($_POST['description']) && isset($_POST['award_details']) && isset($_POST['images']) && isset($_POST['youtube_links'])){*/
						$gigster_id = $_POST['gigster_id'];
						$gigster_name = $_POST['gigster_name'];
						$phone = $_POST['phone'];
						$gigs_done = $_POST['gigs_done'];
						$gig_name = $_POST['gig_name'];
						$area_expertise = $_POST['area_expertise'];
						$gig_type = $_POST['gig_type'];
						$preferred_location = $_POST['preferred_location'];
						$address = $_POST['address'];
						$description = $_POST['description'];
						$award_details = $_POST['award_details'];
						//$images = $_POST['images'];
						$youtube_links = $_POST['youtube_links'];
						$crew_members = $_POST['crew_members'];
						/*$result = mysqli_query($connect,"select area_id from area where gig_area='$area_name'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$area_id = $row['area_id'];
							}
						}
						else{
							$status = "failure";
							$message = "area id cannot be fetched";
							$response = null;
						}
						$result1 = mysqli_query($connect,"select gig_type_id from gig_type where gig_type_name = '$gig_type'");
						if(mysqli_num_rows($result1)>0){
							while($row1 = mysqli_fetch_array($result1)){
								$gig_type_id = $row1['gig_type_id'];
							}
						}
						else{
							$status = "failure";
							$message = "subtype cannot be fetched";
							$response = null;
						}*/
						$result2 = mysqli_query($connect,"UPDATE `gigster_profile` SET `gigster_name`='$gigster_name',`gig_name`='$gig_name',`area_id`='$area_expertise',`gig_type_id`='$gig_type',`address`='$address',`preferred_location`='$preferred_location',`description`='$description',`videos`='$youtube_links',`award_details`='$award_details',`gigs_done`='$gigs_done', `crew_members`='$crew_members',`updated_timestamp`= now() WHERE `gigster_id`='$gigster_id'");
						if($result2){
							$status = "success";
							$message = "profile variables are inserted";
							$response = null;
						}
						else{
							$status = "failure";
							$message = "profile variables not inserted";
							$response = null;
						}
					}
					else{
						$status = "failure";
						$message = "profile variables not set";
						$response = null;
					}
				break;
				
				case "box_fill":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$result = mysqli_query($connect,"select * from gigster_profile where gigster_id = '$gigster_id'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$obj = array(
											'gigster_name' => $row['gigster_name'],
											'created_timestamp' => $row['created_timestamp']);
							}
							$status = "success";
							$response = $obj;
							$message = "gigster details retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "gigster details not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "gigster id not set";
					}
				break;
				
				
				case "file_upload":
					$target_dir = "admin123/images/";
					$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
					$data = $target_file;
					//echo $target_file;

					   if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
						{
							//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							$status = "success";
							$response = $target_file;
							$message = "the file has been uploaded";
							
						}
						else
						 {
							//echo "Sorry, there was an error uploading your file.";
							$status = "failure";
							$response = null;
							$message = "the file has not been uploaded";
						}
						echo $data;
				break;
				
				case "populate";
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$result = mysqli_query($connect,"select gigster_profile.*,gig_login.phone from gigster_profile,gig_login where gigster_profile.gigster_id = '$gigster_id' and gig_login.gigster_id = '$gigster_id'");
						$obj = array();
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$area_id = $row['area_id'];
								$gig_type_id = $row['gig_type_id'];
								$result1 = mysqli_query($connect,"select area.gig_area,gig_type.gig_type_name from area,gig_type where area.area_id='$area_id' and gig_type.gig_type_id='$gig_type_id'");
								if(mysqli_num_rows($result1)>0){
									while($row1 = mysqli_fetch_array($result1)){
										$area_name = $row1['gig_area'];
										$gig_type_name = $row1['gig_type_name'];
									}
									$status = "success";
									$response = null;
									$message = "area name and gig type retrieved";
								}else{
									$area_name = "";
									$gig_type_name = "";
									$status = "failure";
									$response = null;
									$message = "area name and gig type not retrieved";
								}
								$gigster_name = $row['gigster_name'];
								$gigster_phone = $row['phone'];
								$gig_name = $row['gig_name'];
								$area_name = $area_name;
								$area_id = $row['area_id'];
								$gig_type_id = $row['gig_type_id'];
								$gig_type_name = $gig_type_name;
								$address = $row['address'];
								$preferred_location = $row['preferred_location'];
								$description = $row['description'];
								$images = $row['images'];
								$videos = $row['videos'];
								$reviews = $row['reviews'];
								$rating = $row['rating'];
								$award_details = $row['award_details'];
								$premium = $row['premium'];
								$gigs_done = $row['gigs_done'];
								$crew_members = $row['crew_members'];
								$gigster_id = $row['gigster_id'];
											
							}
							$status = "success";
							$response = array("gigster_id" => $gigster_id,
												"gigster_name" => $gigster_name,
												"gig_name" => $gig_name,
												"gigster_phone" => $gigster_phone,
												"area_name" => $area_name,
												"area_id" => $area_id,
												"gig_type_name" => $gig_type_name,
												"gig_type_id" => $gig_type_id,
												"address" => $address,
												"preferred_location" => $preferred_location,
												"description" => $description,
												"images" => $images,
												"videos" => $videos,
												//"reviews" => $reviews,
												//"rating" => $rating,
												"award_details" => $award_details,
												//"premium" => $premium,
												"gigs_done" => $gigs_done,
												"crew_members" => $crew_members);
							$message = "gigster profile retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "gigster profile not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "gigster id not set";
					}
				break;
				
				case "quotation_view":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$obj_all = array();
						$result = mysqli_query($connect,"select * from quotation where gigster_id='$gigster_id'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$obj = array('quotation_id' => $row['quotation_id'],
												'customer_id' => $row['customer_id'],
												'gig_date' => $row['gig_date'],
												'gig_address' => $row['gig_address'],
												'gig_area' => $row['gig_area'],
												'gig_type' => $row['gig_type'],
												'crowd' => $row['crowd'],
												'duration' => $row['duration']);
								array_push($obj_all,$obj);
							}
							$status = "success";
							$response = $obj_all;
							$message = "quotation for the gigster retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "quotation for the gigster not retrieved";
						}
					}
					else{
							$status = "failure";
							$response = null;
							$message = "gigster id is not set";
						}
				break;
				case "quotation_history":
					if(isset($_POST['quotation_id'])){
						$obj_all = array();
						$obj_all1 = array();
						$obj_all_all = array();
						$quotation_id = $_POST['quotation_id'];
						$result = mysqli_query($connect,"select * from quotation_making where quotation_id = '$quotation_id' and customer = '1'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$obj = array('gigster_customer_id' => $row['customer'],
												'amount' => $row['amount'],
												'flag' => $row['flag']);
								array_push($obj_all,$obj);
							}
							$status = "success";
							$response = null;
							$message = "history customer side is retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "history gigster side not retrieved";
						}
						$result4 = mysqli_query($connect,"select * from quotation_making where quotation_id = '$quotation_id' and customer != '1'");
						if(mysqli_num_rows($result4)>0){
							while($row1 = mysqli_fetch_array($result4)){
								$obj1 = array('gigster_customer_id' => $row1['customer'],
												'amount' => $row1['amount'],
												'flag' => $row1['flag']);
								array_push($obj_all1,$obj1);
								}
							$status = "failure";
							$response = null;
							$message = "history gigster side retrieved";
							}
							else{
							$status = "failure";
							$response = null;
							$message = "history gigster side not retrieved";
							}
							//array_push($obj_all_all,$obj_all);
							//array_push($obj_all_all,$obj_all1);
							$obj_all_all = array('customer' => $obj_all, 'gigster' => $obj_all1);
							$status = "success";
							$response = $obj_all_all;
							$message = "history customer and gigster side retrieved";
					}	
						else{
						$status = "failure";
						$response = null;
						$message = "quotation id not set";
					}
				break;
				case "gig_reply_quote":
					if(isset($_POST['quotation_id'])){
						$quotation_id = $_POST['quotation_id'];
						$quote_amount = $_POST['quote_amount'];
						$customer = $_POST['customer'];
						$flag = $_POST['flag'];				
						$result  = mysqli_query($connect,"select * from quotation where quotation_id = '$quotation_id'");
						if(mysqli_num_rows($result)>0){
							while($row2 = mysqli_fetch_array($result)){
								$gigster_id = $row2['gigster_id'];
							}
							$status = "success";
							$response = null;
							$message = "gigster_id retrieved";
							$result1 = mysqli_query($connect,"insert into quotation_making(`quotation_id`,`customer`,`amount`,`flag`,`status`,`created_timestamp`,`quote_disable`)values('$quotation_id','$customer','$quote_amount','$flag','active',now(),'1')");
							if($result1){
							$status = "success";
							$response = null;
							$message = "quotation making row from gigster entered";
							}
							else{
							$status = "failure";
							$response = null;
							$message = "quotation making row from gigster not entered";
							}
						}
						else{
							$status = "failure";
							$response = null;
							$message = "gigster_id not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "variables not set";
					}
				break;
				
				case "quote_button":
					if(isset($_POST['quotation_id'])){
						$quotation_id = $_POST['quotation_id'];
						$quote_disable = '';
						$result = mysqli_query($connect,"select quote_disable,attempt_id from quotation_making where quotation_id = '$quotation_id' order by attempt_id DESC;");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$quote_disable = $row['quote_disable'];
								break;
							}
							$status = "success";
							$response = $quote_disable;
							$message = " send quote button status retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = " send quote button status not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = " quotation id not set";
					}
				
				break;
				
				case "booking_view":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$obj_all = array();
						$result = mysqli_query($connect,"select * from quotation where (gigster_id = '$gigster_id' and flag = 'booked')");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$customer_id = $row['customer_id'];
								$result1 = mysqli_query($connect,"select phone,customer_name from customer_login where customer_id = '$customer_id'");
								if(mysqli_num_rows($result1)>0){
									while($row1 = mysqli_fetch_array($result1)){
										$customer_name = $row1['customer_name'];
										$phone = $row1['phone'];
									}
									$status = "success";
									$response = null;
									$message = "phone number and customer name retrieved";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "phone number and customer name not retrieved";
								}
								$obj = array('quotation_id' => $row['quotation_id'],
												'customer_id' => $row['customer_id'],
												'customer_name' => $customer_name,
												'phone' => $phone,
												'gig_date' => $row['gig_date'],
												'gig_address' => $row['gig_address'],
												'gig_area' => $row['gig_area'],
												'gig_type' => $row['gig_type'],
												'crowd' => $row['crowd'],
												'duration' => $row['duration'],
												'quote_amount' => $row['quote_amount']);
												
								array_push($obj_all,$obj);
							}
							$status = "success";
							$response = $obj_all;
							$message = "Bookings retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "Bookings not retrieved";
						}
					}else{
						$status = "failure";
						$response = null;
						$message = "Gigster id not set";
					}
				break;
				
				case "add_crew_member":
					if(isset($_POST['gigster_id']) && isset($_POST['sub_gigster_name']) && isset($_POST['sub_area_expertise']) && isset($_POST['sub_gig_type'])){
						$gigster_id = $_POST['gigster_id'];
						$sub_gigster_name = $_POST['sub_gigster_name'];
						$sub_area_expertise = $_POST['sub_area_expertise'];
						$sub_gig_type = $_POST['sub_gig_type'];
						$result = mysqli_query($connect,"INSERT INTO `sub_gigsters`(`sub_gigster_id`, `gigster_id`, `sub_gigster_name`, `sub_gig_area_id`, `sub_gig_type_id`, `created_timestamp`) VALUES ('','$gigster_id','$sub_gigster_name','$sub_area_expertise','$sub_gig_type',now())");
						if($result){
							$status = "success";
							$response = null;
							$message = "New crew member inserted";
							$result1 = mysqli_query($connect,"select crew_members from gigster_profile where gigster_id = '$gigster_id'");
							if(mysqli_num_rows($result1)>0){
								while($row1 = mysqli_fetch_array($result1)){
									$new_crew_num = $row1['crew_members'];
								}
								$new_crew_num += 1;
								$result2 = mysqli_query($connect,"update gigster_profile set crew_members = '$new_crew_num' where gigster_id = '$gigster_id'");
								if($result2){
									$status = "success";
									$response = null;
									$message = "crew member number updated in the profile";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "crew member number updated in the profile";
								}
							}
							else{
								$status = "failure";
								$response = null;
								$message = "crew number not retrieved";
							}
						}
						else{
							$status = "failure";
							$response = null;
							$message = "new crew member not inserted";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "add crew members variables not set";
					}
				break;
				
				case "update_crew_member":
					if(isset($_POST['sub_gig_area_id']) && isset($_POST['sub_gig_type_id']) && isset($_POST['sub_gigster_id'])){
							$sub_gigster_id = $_POST['sub_gigster_id'];
							$sub_gigster_name = $_POST['sub_gigster_name'];
							$sub_gig_area_id = $_POST['sub_gig_area_id'];
							$sub_gig_type_id = $_POST['sub_gig_type_id'];
							$result = mysqli_query($connect,"update sub_gigsters set sub_gigster_name = '$sub_gigster_name', sub_gig_area_id = '$sub_gig_area_id', sub_gig_type_id = '$sub_gig_type_id' where sub_gigster_id = '$sub_gigster_id'");
							if($result){
								$status = "success";
								$response = null;
								$message = "crew member details updated";
							}
							else{
								$status = "failure";
								$response = null;
								$message = "crew member details not updated";
							}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "crew member details not set";
					}
					
				break;
				
				case "crew_populate":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$obj_all = array();
						$result = mysqli_query($connect,"select * from sub_gigsters where (gigster_id = '$gigster_id' and status != 'delete')");
						if($result){
							while($row = mysqli_fetch_array($result)){
								$sub_gig_area_id = $row['sub_gig_area_id'];
								$sub_gig_type_id = $row['sub_gig_type_id'];
								$result1 = mysqli_query($connect,"select area.gig_area,gig_type.gig_type_name from area,gig_type where area.area_id='$sub_gig_area_id' and gig_type.gig_type_id='$sub_gig_type_id'");
								if(mysqli_num_rows($result1)>0){
									while($row1 = mysqli_fetch_array($result1)){
										$sub_gig_area_name = $row1['gig_area'];
										$sub_gig_type_name = $row1['gig_type_name'];
									}
									$status = "success";
									$response = null;
									$message = "area name and gig type retrieved";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "area name and gig type not retrieved";
								}
								$obj = array('sub_gigster_name' => $row['sub_gigster_name'],
												'sub_gig_area_name' => $sub_gig_area_name,
												'sub_gig_type_name' => $sub_gig_type_name,
												'image_path' => $row['image_path']);
								array_push($obj_all,$obj);
							}
							$status = "success";
							$response = $obj_all;
							$message = "crew details retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "crew details not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "gigster id not set";
					}
				break;
				
				case "delete_crew_member":
					if(isset($_POST['sub_gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$sub_gigster_id = $_POST['sub_gigster_id'];
						$result = mysqli_query($connect,"update sub_gigsters set status = 'delete' where sub_gigster_id = '$sub_gigster_id'");
						if($result){
							$status = "success";
							$response = null;
							$message = "sub gigster details deleted";
							
							$result1 = mysqli_query($connect,"select crew_members from gigster_profile where gigster_id = '$gigster_id'");
							if(mysqli_num_rows($result1)>0){
								while($row1 = mysqli_fetch_array($result1)){
									$new_crew_num = $row1['crew_members'];
								}
								$new_crew_num -= 1;
								$result2 = mysqli_query($connect,"update gigster_profile set crew_members = '$new_crew_num' where gigster_id = '$gigster_id'");
								if($result2){
									$status = "success";
									$response = null;
									$message = "crew member number updated in the profile";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "crew member number updated in the profile";
								}
							}
							else{
								$status = "failure";
								$response = null;
								$message = "crew number not retrieved";
							}
							
						}
						else{
							$status = "failure";
							$response = null;
							$message = " sub gigster details not deleted";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "sub gigster id not set";
					}
				break;
				
				case "get_crew_names":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$obj_all = array();
						$result = mysqli_query($connect,"select sub_gigster_name,sub_gigster_id from sub_gigsters where (gigster_id = '$gigster_id' and status != 'delete')");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$obj = array('sub_gigster_name' => $row['sub_gigster_name'],
												'sub_gigster_id' => $row['sub_gigster_id']);
								array_push($obj_all,$obj);
							}
							$status = "success";
							$response = $obj_all;
							$message = "crew member names retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "crew member names not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "gigster id not set";
					}
				break;
				
				case "delete_gigster_img":
					if(isset($_POST['gigster_id'])){
						$gigster_id = $_POST['gigster_id'];
						$file_path = $_POST['file_path'];
						$i=0;
						$result = mysqli_query($connect,"select images from gigster_profile where gigster_id = '$gigster_id'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$images = explode(",",$row['images']);
							}
							for($i = 0;$i < sizeof($images);$i++){
								if(($key = array_search($file_path, $images)) !== false) {
									unset($images[$key]);
								}
							}
							$images = join(",",$images);
							$result1 = mysqli_query($connect,"update gigster_profile set images = '$images' where gigster_id = '$gigster_id'");
							if($result1){
								$status = "success";
								$response = null;
								$message = "path updated";
							}
							else{
								$status = "failure";
								$response = null;
								$message = "path not updated";
							}
							$status = "success";
							$response = null;
							$message = "path deleted and updated";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "path not deleted and updated";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "gigster id not set";
					}
				break;
				
				case "sub_gigster_details":
					if(isset($_POST['sub_gigster_id'])){
						$sub_gigster_id = $_POST['sub_gigster_id'];
						$gig_area = "";
						$gig_type_name = "";
						$result = mysqli_query($connect,"select * from sub_gigsters where sub_gigster_id = '$sub_gigster_id'");
						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_array($result)){
								$sub_gig_area_id = $row['sub_gig_area_id'];
								$sub_gig_type_id = $row['sub_gig_type_id'];
								$result1 = mysqli_query($connect,"select area.gig_area, gig_type.gig_type_name from area,gig_type where (area.area_id = '$sub_gig_area_id' and gig_type.gig_type_id = '$sub_gig_type_id')");
								if(mysqli_num_rows($result1)>0){
									while($row1 = mysqli_fetch_array($result1)){
										$gig_area = $row1['gig_area'];
										$gig_type_name = $row1['gig_type_name'];
									}
									$status = "success";
									$response = null;
									$message = "area name type name retrieved";
								}
								else{
									$status = "failure";
									$response = null;
									$message = "area name type name not retrieved";
								}
								
								$obj = array('sub_gigster_name' => $row['sub_gigster_name'],
												'sub_gig_area_id' => $row['sub_gig_area_id'],
												'sub_gigster_id' => $row['sub_gigster_id'],
												'sub_gig_type_id' => $row['sub_gig_type_id'],
												'gig_area' => $gig_area,
												'gig_type_name' => $gig_type_name,
												'image_path' => $row['image_path']);
							}
							$status = "success";
							$response = $obj;
							$message = "crew member details retrieved";
						}
						else{
							$status = "failure";
							$response = null;
							$message = "crew member details not retrieved";
						}
					}
					else{
						$status = "failure";
						$response = null;
						$message = "sub gigster id not set";
					}
				break;
				
				default:
					$status = "failure";
					$response = null;
					$message = "action not matching in switch";
				break;
			}
		}
		else{
			$status = "failure";
			$message = "action not set";
			$response = null;
		}
	}
	else{
		$status = "failure";
		$message = "method is not post";
		$response = null;
	}
	$data = array('status' => $status,
					'message' => $message,
					'response' => $response);
	$data = json_encode($data);
	echo $data;
?>
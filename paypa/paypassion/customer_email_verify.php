<?php
	ob_start();	
	include 'connect.php';
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		if (isset($_POST["action"])){
			//ACTION to be performed on the DB.
			$action = $_POST["action"];
			if(isset($_POST['email'])){
				$email=$_POST['email'];
				switch ($action){
					case "EMAIL_VERIFY":
					//getting the email from the customer 
					$email_list=mysqli_query($connect,"select distinct(email) from customer_login where email='$email'");
					if(mysqli_num_rows($email_list)>0){
						$resp=array();
						$i=0;
						while($row=mysqli_fetch_assoc($email_list))
						{
							
							$email=$row['email'];
							//setting the each values into the respected variables
							$resp[$i]=array('email'=>$email);
							$i++;
						}
						require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
						$msg  = 'Hi User to download our application';
						
						$subj = 'test mail message';
						$to   = $email;
						$from = 'test@laventz.com';
						$name = 'My Name';
						//once the forgot password is clicked it will ask for email id and it will send link to reseting the password 
						function smtpmailer($to, $from, $from_name = 'Example.com', $subject, $body, $is_gmail = true) {
							global $error;
							$mail = new PHPMailer();
							$mail->IsSMTP();
							$mail->SMTPAuth = true; 
							$mail->SMTPDebug  = 1;
							if($is_gmail) {
								$mail->SMTPSecure = 'tsl'; 
								$mail->Host = 'mailout.one.com';
								$mail->Port = 587;  
								$mail->Username = 'test@laventz.com';  
								$mail->Password = 'crazycodez';
								} else {
								$mail->Host = 'mailout.one.com';
								$mail->Username = 'test@laventz.com';  
								$mail->Password = 'crazycodez';
							}
							$mail->IsHTML(true);
							$mail->From="admin@example.com";
							$mail->FromName="Example.com";
							$mail->Sender=$from; // indicates ReturnPath header
							$mail->AddReplyTo($from, $from_name); // indicates ReplyTo headers
							$mail->AddCC('cc@site.com.com', 'CC: to site.com');
							$mail->Subject = $subject;
							$mail->Body = $body;
							$mail->AddAddress($to);
							if(!$mail->Send()){
								$error = 'Mail error: '.$mail->ErrorInfo;
								return true;
								} else{
								$error = 'Message sent!';
								return false;
							}
						}
						smtpmailer($to, $from, $name ,$subj, $msg);
						//$_POST['success_message']= "success";
						$status = "success";
						$response = array("email_list"=>$resp);
						$message =  "Data successfully retrieved.";
						
						
						
						} else {
						//displays  when data not found
						$status = "failure";
						$response = NULL;
						$message =  "No Data Found.";
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
				$message =  "email ID is not set.";
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
	ob_clean();
	$data = array("status"=>$status, "message"=>$message, "response"=>$response);
	$data = json_encode($data);
	echo $data;
	
?>							
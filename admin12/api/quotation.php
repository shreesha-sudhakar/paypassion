<?php
	$con = mysqli_connect('localhost','root','','paypassion') ;
	if(!$con){
		echo "connection error";
	}
	else{
		if(isset($_POST['action']) && isset($_POST['quotation_id']) && isset($_POST['customer_id']) && 
		isset($_POST['quote_amount']) && isset($_POST['gig_date']) && isset($_POST['gig_address']) && 
		isset($_POST['gig_area']) && isset($_POST['gig_type']) && isset($_POST['crowd']) && isset($_POST['duration'])){
			$action = $_POST['action'];
			$quotation_id = $_POST['quotation_id'];
			$customer_id = $_POST['customer_id'];
			$quote_amount = $_POST['quote_amount'];
			$gig_date = $_POST['gig_date'];
			$gigster_id = $_POST['gigster_id'];
			$gig_address = $_POST['gig_address'];
			$gig_area = $_POST['gig_area'];
			$gig_type = $_POST['gig_type'];
			$crowd = $_POST['crowd'];
			$duration = $_POST['duration'];

			$result = mysqli_query($con,"INSERT INTO `quotation`(`quotation_id`, `customer_id`, `gigster_id`, `gig_date`, `gig_address`, `gig_area`, `gig_type`, `crowd`, `duration`, `quote_amount`) VALUES ('$quotation_id','$customer_id','$gigster_id','$gig_date','$gig_address','$gig_area','$gig_type','$crowd','$duration','$quote_amount')");
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					$obj = array(
					'quotation_id' => $row['quotation_id'],
					'customer_id' => $row['customer_id'],
					'quote_amount' => $row['quote_amount'],
					'gig_date' => $row['gig_date'],
					'gigster_id' => $row['gigster_id'],
					'gig_address' => $row['gig_address'],
					'gig_area' => $row['gig_area'],
					'gig_type' => $row['gig_type'],
					'crowd' => $row['crowd'],
					'duration' => $row['duration']);					
				}
				$status = 'success';
				$message = 'row inserted into quotation';
				$response = $obj;
			}
			else{
				$status = 'failure';
				$message = 'row not inserted into quotation';
				$response = null;	
			}
		}
		else{
			$status = 'failure';
			$message = 'values not set';
			$response = null;
		}
		$data = array('status'=>$status,'message'=>$message,'response'=>$response);
		$data = json_encode($data);
		echo $data;
	}
?>
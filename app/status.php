<?php

    ini_set('display_errors', 1);

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../entities/Order.php';

	$data = array();
	$orderObj = new Order();

  	$request_method = getenv('REQUEST_METHOD');
  	/*// Following didn't work
  	$value = $_SERVER('REQUEST_METHOD');
  	*/

	if($request_method == 'POST') {

		// Get complete params of POST request in an array
		$paramList = $_POST;
		print_r($paramList);

		// viewing encoded url
		//$JsonData = json_encode($paramList);
		//$postData = 'JsonData='.urlencode($JsonData);
		//echo $postData."\n";

	    if(isset($_POST['id'])) {
	      echo "Id is Set \n";
	      $data['id'] = $_POST['id'];
	    }
	    else {
	      echo "Id is not set \n";
	    }
	  
	    if(isset($_POST['status'])) {
	      echo "statusId is Set  \n";
	      $data['status'] = $_POST['status'];
	    }
	    else {
	      echo "status is not set \n";
	    }

	    if(isset($_POST['amount'])) {
	      echo "amount is Set  \n";
	      $data['amount'] = $_POST['amount'];
	    }
	    else {
	      echo "amount is not set \n";
	    }

	    if(!empty($data)) {
	      echo "Data displayed from array: ";
	      print_r($data);

	      //removing the following line of code behaves unexpectedly
	      echo json_encode($data);

	      $orderObj->id = $data['id'];
	      $orderObj->status = $data['status'];
	      $orderObj->amount = $data['amount'];
	        
	      echo "\nData displayed from Model object: ";
	      echo json_encode($orderObj);
	    }
  }
?>
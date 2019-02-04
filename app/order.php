<?php

    ini_set('display_errors', 1);

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once '../entities/Order.php';
	require_once '../app/create.php';
	require_once '../app/read.php';

	$data = array();
	$orderObj = new Order();

  	$request_method = getenv('REQUEST_METHOD');
  	//echo $request_method;
  	/*// Following didn't work
  	$value = $_SERVER('REQUEST_METHOD');
  	*/

  	switch($request_method)
  	{
  		case 'GET':
  			// Return status by checking order Id amongst all the parameters passed
  			if(!empty($_GET)) {
  				//echo "if\n";
  				
  				//converting to type JSON
  				$getParams = $_GET;
  				$orderObj->id = $getParams['id'];
			    $orderObj->status = $getParams['status'];
			    $orderObj->amount = $getParams['amount'];
  				
  				$jsonGetResponse = get_status($orderObj); //send params in json format
  				echo $jsonGetResponse;	
  			}
  			else {
  				//echo "else\n";
  				echo "No params received in GET request";
  			}
  			break;

  		case 'POST':
			if(!empty($_POST)) {
				//print_r($_POST);
				//echo "if\n";
  				$postParams = $_POST;
  				
  				//converting to type JSON
  				$orderObj->id = $postParams['id'];
			    $orderObj->status = $postParams['status'];
			    $orderObj->amount = $postParams['amount'];

  				$jsonPostResponse = create_order($orderObj);	//send params in json format
  				echo $jsonPostResponse;	
  			}
  			else {
  				//echo "else\n";
  				echo "No params received in POST request";
  			}
			break;

  		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
  	}

?>
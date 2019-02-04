<?php

ini_set('display_errors', 1);

	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	//include_once '../entities/Order.php';
	
	//$data = array();
	ini_set("allow_url_fopen", true);
	$json = file_get_contents("php://input");
	//$data = json_decode(file_get_contents("php://input"), true);
/*
	$Order->name = $data->id;
	$Order->price = $data->status;
	$Order->description = $data->amount;
*/
/*
if(isset($data))
	echo "true";
else
	echo "false";


*/
if(isset($json))
	echo "true";
else
	echo "false";

/*echo $data->id;	*/
?>
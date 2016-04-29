<?php

	require_once "config.php";
 
	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	$input = json_decode(file_get_contents('php://input'),true);
	 
	echo(print_r($_SERVER));
	echo(print_r($method));
	echo(print_r($request));
	echo(print_r('INPUT'+$input));
	echo(print_r($config));
	
	$response = array();
	
	try {
		$response["status"] = 0;
	} catch (Exception $e) {
		$response["status"] = 1;
		$response["message"] = $e->getMessage();
	}
	
	echo(print_r($response));
	echo json_encode($response);

?>
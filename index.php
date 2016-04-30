<?php

	require_once "autoload.php";
 
	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	$input = json_decode(file_get_contents('php://input'),true);
	
	$response = array();
	
	try { 
		$service = $request[0];
		
		//if (!authenticated()) {throw new Exception("No autenticado")}
		
		switch ($service) {
			case "coins": $data = ($method==="GET") ? getCoins() : "No disponible (aqui se modificaria el valor)"; break;
			default: throw new Exception("No existe el servicio");
		}
		
		$response["status"] = 0;
		$response["data"] = $data;
	} catch (Exception $e) {
		$response["status"] = 1;
		$response["message"] = $e->getMessage();
	}
	
	//header('Content-Type: application/json');
	echo json_encode($response);
	
?>
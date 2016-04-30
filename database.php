<?php

	/**
	* Open connection with the database
	* 
	* @return connection
	*/
	function dbConnect () {
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_COINS_TABLE);
		mysqli_set_charset($conn, 'utf8');
		return $conn;
	}
	
	/**
	* Close existing connection with the database
	* 
	*/
	function dbClose ($conn) {
		mysqli_close($conn);
	}
	
	/**
	* Make a query to database
	* 
	* @return query result
	*/
	function dbQuery ($conn, $query) {
		$result = mysqli_query($conn, $query);
		if (!$result) {
		  //http_response_code(404);
		  //die(mysqli_error($link));
		  throw new Exception(mysqli_error($conn));
		}
		
		return $result;
	}

?>
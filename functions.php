<?php

	require_once "config.php";

	/**
	* Open connection with the database
	* 
	* @return connection
	*/
	function dbConnect () {
		$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_COINS_TABLE);//('localhost', 'root', '', 'coins');
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

	/*markCoin ($year, $country, $currency, $status) {
		
	*/
	
	/**
	* Retrieves all coins stored in the database
	* 
	* @return list of coins
	*/
	function getCoins () {
		$link = dbConnect();
		$result = dbQuery($link, 'SELECT country, year, currency, relative_value, status FROM coins');
		
		$return = array();
		
		while ($row = mysqli_fetch_array($result)) {
			$temp["country"] = $row["country"];
			$temp["year"] = (int) $row["year"];
			$temp["currency"] = $row["currency"];
			$temp["relative_value"] = (int) $row["relative_value"];
			$temp["status"] = (int) $row["status"];
			
			array_push($return, $temp);
		}
		
		dbClose($link);
		
		return $return;
	}

?>
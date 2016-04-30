<?php

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
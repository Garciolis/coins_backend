<?php

	if(file_exists("config.php")) {
		require_once"config.php";
	}
	else {
		die("No existe config.php");
	}
	
	require_once"database.php";
	require_once"functions.php";
	require_once"security.php";

?>
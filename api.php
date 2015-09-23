<?php
	$result = new stdClass();
	require("../data/config.php");;
	$database = new mysqli($config->ip,$config->username,$config->password,$config->database,$config->port);
	
	if($database->connect_error) {
		$result->error = "Connection Error.";
	}else {
		$function = $_GET['function'];
	}
	echo json_encode($result);
?>
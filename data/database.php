<?php 
	class Database {
		var $config;
		var $connction;
		function Database() {
			$this->config = json_decode(file_get_contents("data/config.json"));
		}
		function connect() {
			$conn = new mysqli($this->config->database->ip,$this->config->database->user,$this->config->database->password,$this->config->database->database,$this->config->database->port);
			$this->connection = $conn;
			return $conn->connect_error;
		}
		function get_user_info($id) {
			$output;
			if($this->connect()) {
				die("<h1>Unable to connect to database</h1>");
			}
			$result = $this->connection->query("select user_id,name,username,isAdmin from ".$this->config->tables->users." where user_id='".$id."'");
			if($result->num_rows>0) {
				$output = $result->fetch_assoc();
			}
			$this->connection->close();
			return $output;

		}
	}
?>
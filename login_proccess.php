<html>
	<head></head>
	<body><h1>Proccessing Login</h1></body>
	<hr>
	<p>Click <a href="#">here</a> if you are not redirected after 5 seconds.</p>
	<br>
	<?php
		require('data/database.php');
		session_start(); 
		$database = new Database();
		if($error = $database->connect()) {
			die("<h1>Unable to connect to database</h1><p>".$error."</p>");
		}
		$sql = "select user_id from ".$database->config->tables->users." where username='".$_POST['username']."' and password='".$_POST['password']."';";
		$result = $database->connection->query($sql);
		if($result->num_rows>0) {
			while ($row = $result->fetch_assoc()) {
				$_SESSION['user']=$row['user_id'];
			}
			header("Location: /");
		} else {
			header("Location: /login?error=true");
		}
		$database->connection->close();
		
	?>
</html>
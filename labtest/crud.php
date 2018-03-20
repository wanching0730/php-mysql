<?php

	$servername = "localhost";
	$username = "root";
	$password = "";

	$GLOBALS['conn'] = new mysqli($servername, $username, $password);

	if($GLOBALS['conn']->connect_error) {
		die("Connection failed: " . $GLOBALS['conn']->connect_error);
	} else 
		echo "Connected succesfully <br>";


	$sql = "CREATE DATABASE seconddb";
	if(mysqli_query($GLOBALS['conn'], $sql)) {
		echo "Database created successfully<br><br>";
	} else {
		echo "Error creating database: " . mysqli_error($GLOBALS['conn'] . "<br><br>");
	}

	mysqli_select_db($GLOBALS['conn'], "seconddb");
	echo "Entered DB <br><br>";

	$sql = "CREATE TABLE labtest (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		subject VARCHAR(255),
		message TEXT,
		type CHAR(1),
		posted DATETIME)";
	if($GLOBALS['conn']->query($sql)) {
		echo "Table created successfully";
	} else {
		echo "Error in creating table: " . $GLOBALS['conn']->error;
	}

	if(isset($_POST['submitBtn'])) {
		insertData($_POST['subject'], $_POST['message'], $_POST['type']);
	} else if(isset($_POST['projectBtn'])) {
		retrieveProjects();
	} else {
		retrieveTraffic();
	}

	function insertData($subject, $message, $type) {
		if($subject != null && $message != null && $type != null) {
			$date = date('Y-m-d H:i:s', time());

			$sql = "INSERT INTO labtest (subject, message, type, posted) VALUES ('$subject', '$message', '$type', '$date')";

			if($GLOBALS['conn']->query($sql) == TRUE) {
				$last_id = $GLOBALS['conn']->insert_id;
				echo "New record created successfully! Last inserted ID is: " . $last_id;
			} else {
				echo "Error: " . $GLOBALS['conn']->error;
			}
		} else {
			echo "Please complete all fields";
		}
	}

	function retrieveProjects() {
		$sql = "SELECT * FROM labtest WHERE type='p'";
		$result = $GLOBALS['conn']->query($sql);

		if($result->num_rows >0) {
			while($row = $result->fetch_assoc()) {
				echo "subject: " . $row['subject'] . "<br>Posted date: " . $row['posted'] . "<br>";
			}
		} else {
			echo "0 result found";
		}
	}

	function retrieveTraffic() {
		$sql = "SELECT * FROM labtest WHERE type='t'";
		$result = $GLOBALS['conn']->query($sql);
		
		if($result->num_rows >0) {
			while($row = $result->fetch_assoc()) {
				echo "subject: " . $row['subject'] . "<br>Posted date: " . $row['posted'] . "<br>";
			}
		} else {
			echo "0 result found";
		}
	}

	// mysqli_select_db($GLOBALS['conn'], "seconddb");
	// echo "Entered DB <br><br>";

?>


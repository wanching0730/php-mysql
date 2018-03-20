<?php

		$servername = "localhost";
		$username = "root";
		$password = "";

		//Create connection
		$GLOBALS['conn'] = new mysqli($servername, $username, $password);

		//Check connection
		if($GLOBALS['conn']->connect_error) {
			die("Connection failed: " . $GLOBALS['conn']->connect_error);
		}

		echo "Connected successfully";

		mysqli_select_db($GLOBALS['conn'],"uecs2094_pie");

		echo "Entered DB";

		if(isset($_POST['submit1'])) {
			var_dump($_POST['subject']);
			insertData($_POST['subject'], $_POST['message'], $_POST['type']);
		} else if (isset($_POST['project'])) {
			retrieveProjects();
		} else {
			retrieveTraffics();
		}


		function insertData($subject, $message, $type) {
			if(isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['type'])) {
				$date = date('Y-m-d H:i:s', time());

				$sql = "INSERT INTO announcement (subject, message, type, posted) VALUES ('$subject', '$message', '$type', '$date')";

				if($GLOBALS['conn']->query($sql) === TRUE) {
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
			$sql = "SELECT * FROM announcement WHERE type='p'";
			var_dump($sql);
			$result = $GLOBALS['conn']->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "subject: " .$row['subject']. " Posted Date: " .$row['posted']. "<br>";
				}
			} else {
				echo "0 result found";
			}
		}

		function retrieveTraffics() {
			$sql = "SELECT * FROM announcement WHERE type='t'";
			var_dump($sql);
			$result = $GLOBALS['conn']->query($sql);

			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "subject: " .$row['subject']. " Posted Date: " .$row['posted']. "<br>";
				}
			} else {
				echo "0 result found";
			}
		}

	?>
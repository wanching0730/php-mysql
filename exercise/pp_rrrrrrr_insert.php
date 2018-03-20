<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";

	$GLOBALS['conn'] = new mysqli($servername, $username, $password);

	if($GLOBALS['conn']->connect_error) {
		die("Connection failed: " . $GLOBALS['conn']->connect_error. "<br>");
	} else {
		echo "Connected successfully<br>";
	}

	mysqli_select_db($GLOBALS['conn'], "uecs2094_ptest");

	echo "Entered database<br>";

	if(isset($_POST['staffNo']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {

		$staffNo = $_POST['staffNo'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		if($staffNo != null && $name != null && $email != null && $phone != null) {
			$sql = "INSERT INTO pp_rrrrrrr_staff (staffNo, name, email, phone) VALUES ('$staffNo', '$name', '$email', '$phone')";

			if($GLOBALS['conn']->query($sql) === TRUE) {
				$last_id = $GLOBALS['conn']->insert_id;
				echo "New record created successfully! Last inserted ID is: " . $last_id;
			} else {
				echo "Error in creating new record: " . $GLOBALS['conn']->error;
			}
		} else {
			echo "<script>alert('Please complete this field!');document.location='pp_rrrrrrr.php'</script>";
		}

	} 

?>
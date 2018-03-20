<!DOCTYPE html>
<html>
<head>
	<title>Lab Test</title>

	<style>

		form {
			color: blue;
		}

		#submitBtn {
			color: red;
		}

		#projectBtn, #trafficBtn {
			color: green;
		}

	</style>
</head>
<body>

	<h1>Admin Form</h1>
	<form method="POST" action="crud.php">
		<label for="subject">Subject: </label>
		<input type="text" name="subject">
		<br><br>
		<label for="subject">Message: </label>
		<input type="comment" rows="5" cols="40" name="message">
		<br><br>
		<label for="subject">Type: </label>
		<input type="text" name="type" maxlength="1">

		<input type="submit" name="submitBtn" id="submitBtn" value="Save">
	</form>

	<form method="POST" action="crud.php">
		<br>
		<input type="submit" id="projectBtn" name="projectBtn" value="Project">
		<input type="submit" id="trafficBtn" name="trafficBtn" value="Traffic">
	</form>

</body>
</html>
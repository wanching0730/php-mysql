<!DOCTYPE html>
<html>
<head>
	<title>Exercise</title>

	<style type="text/css">

		h2 {
			text-align: center;
			font-family: Arial;
			font-size: 30px;
		}

		label {
			font-family: Verdana;
			font-size: 18px;
			color: blue;
		}

	</style>
</head>
<body>

	<h2>Staff Registration</h2>
	<form method="POST" action="pp_rrrrrrr_insert.php">

		<label id="lblStaffNo">Staff Number: </label>
		<input type="text" name="staffNo">
		<br><br>
		<label id="lblName">Name: </label>
		<input type="text" name="name">
		<br><br>
		<label id="lblEmail">Email: </label>
		<input type="text" name="email">
		<br><br>
		<label id="lblPhone">Phone: </label>
		<input type="text" name="phone">
		<br><br>
		<input type="submit" name="btnSubmit" value="Save">

	</form>

</body>
</html>
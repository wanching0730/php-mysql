<!DOCTYPE html>
<html>
<head>
	<title>MYSql</title>
</head>
<body>

	<h1>Admin Form</h1>
	<form method="POST" action="crud.php">  
		  Subject: <input type="text" name="subject">
		  <br><br>
		  Message: <input type="comment" rows="5" cols="40" name="message">		 
		  <br><br>
		  Type: <input type="text" name="type" maxlength="1">
		  <br><br>
		 
		  <input type="submit" name="submit1" value="Submit">  
	</form>

	<form action="crud.php" method="post">
		<input type="submit" name="project" value="Project">
		<input type="submit" name="traffic" value="Traffic">
	</form>


</body>
</html>


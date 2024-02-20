<!DOCTYPE html>
<html>
<head>
	<title>Andreas Theodorou</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="get">
		Name: <input type="text" name="name" required><br>
		Email: <input type="email" name="email" required><br>
		Message: <textarea name="text">Your message</textarea><br>
		<input type="submit" name="submit" value="Send message"><br>
	</form>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "school_server";
	
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_GET['submit'])){
			$get_name = $_GET['name'];
			$get_email = $_GET['email'];
			$get_message = $_GET['text'];
			$sql_insert = "INSERT INTO users (user_name, user_email, user_message) VALUES ('$get_name','$get_email','$get_message')";
			$result = mysqli_query($conn, $sql_insert);
			if (!$result) {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			header("Location: fyllo_ergasias_20.php");
			exit();
		}

	?>
</body>
</html>
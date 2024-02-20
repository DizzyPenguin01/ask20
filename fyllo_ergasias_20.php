<!DOCTYPE html>
<html>
<head>
	<title>Andreas Theodorou</title>
	<meta charset="utf-8">
	<style>
		table, td {
			border: 2px solid black;
			border-collapse: collapse;
		}
		thead {
			font-weight: bold;
		}
		tr, td {
			padding: 20px;
		}
	</style>
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "school_server";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_GET['delete'])){
		$delete_row = $_GET['delete'];
		$delete_user = mysqli_query($conn, "DELETE FROM users WHERE id = $delete_row");
	}

	if(isset($_GET['mark_read'])){
		$read_row = $_GET['mark_read'];
		$mark_read = mysqli_query($conn, "UPDATE users SET is_read='1' WHERE id = $read_row");
	}
?>
<form method="get">
	<a href="fyllo_ergasias_20HTML.php">Back to upload</a>
	<p id="demo"></p>
	<table>
		<thead>
			<td>Name</td>
			<td>Email</td>
			<td>Message</td>
			<td>Actions</td>
		</thead>
		<?php
			$sql_select = "SELECT * FROM users";
			$result = mysqli_query($conn, $sql_select);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$name = $row['user_name'];
					$email = $row['user_email'];
					$message = $row['user_message'];
					$id = $row['id'];
					$is_read = $row['is_read'];

					if($is_read != 0){
						echo "
						<tr>
							<td>$name</td>
							<td>$email</td>
							<td>$message</td>
							<td>
								<button type='submit' name='mark_read' value='$id' style='display:none'>Mark Read</button><br>
								<button type='submit' name='delete' value='$id'>Delete</button>
							</td>
						</tr>";
					} else {
						echo "
						<tr>
							<td>$name</td>
							<td>$email</td>
							<td>$message</td>
							<td>
								<button type='submit' name='mark_read' value='$id'>Mark Read</button><br>
								<button type='submit' name='delete' value='$id'>Delete</button>
							</td>
						</tr>";
					}
				}
			} 
			else {
				echo "0 results";
			}
			
			mysqli_close($conn);
		?>
	</table>
</form>
</body>
</html>














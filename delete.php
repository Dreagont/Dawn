<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Dawn";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_GET['delete'])) {
		$username = $_GET['delete'];
		$sql = "DELETE FROM users WHERE username = '$username'";
		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
	if (isset($_GET['deletegenre'])) {
		$genre = $_GET['deletegenre'];
		$sql = "DELETE FROM genres WHERE genrename = '$genre'";
		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}

	if (isset($_GET['deletecomment'])) {
		$comment = $_GET['deletecomment'];
		$sql = "DELETE FROM bogia WHERE commentid = '$comment'";
		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete data from table</title>
	<style>
		* {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
		.container {
			display: flex;
			flex-wrap: wrap;
			height: 100vh;
		}
		.item {
			flex-basis: 50%;
			height: 50%;
			box-sizing: border-box;
			border: 1px solid black;
			padding: 10px;
			justify-content: center;
			align-items: center;
		}
		.btn {
			background-color: green;
			color: yellow !important;
			width: 100px;
			height: 50px;
		}
	</style>
</head>
<body>
	<button class="btn" onclick="location.href='delete.php'">Reload</button>
	<div class="container">
	<div class="item">
		<h1>User Manage</h1>
	<?php
	$sql = "SELECT * FROM `users`";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Action</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td><a href='delete.php?delete=" . $row["username"] . "'>Delete</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo " 0 results";
	}
	?>
	</div>
	<div class="item">
		<h1>Genres Manage</h1>
	<?php
	$sql = "SELECT * FROM `genres`";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<table border='1'><tr><th>Name</th><th>Icon</th><th>Action</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["genrename"] . "</td><td>" . $row["genreicon"] . "</td><td><a href='delete.php?deletegenre=" . $row["genrename"] . "'>Delete</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo " 0 results";
	}
		?>
	</div>
	<div class="item">
		<h1>Comment Manage</h1>
	<?php
	$sql = "SELECT * FROM `bogia`";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<table border='1'><tr><th>Name</th><th>Comment</th><th>Id</th><th>Action</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["username"] . "</td><td>" . $row["comment"] . "</td><td>" . $row["commentid"] . "</td><td><a href='delete.php?deletecomment=" . $row["commentid"] . "'>Delete</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo " 0 results";
	}
	?>
	</div>
	<div class="item">
		<h1>Movie Information Manage</h1>
	<?php
	$sql = "SELECT * FROM `movies`";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<table border='1'><tr><th>Name</th><th>Genre</th><th>Displayname</th><th>Action</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td class = 'name'>" . $row["moviename"] . "</td><td class = 'genre'>" . $row["genre"] . "</td><td class = 'display'>" . $row["displayname"] . "</td><td><a href='delete.php?deletecomment=" . $row["moviename"] . "'>Delete</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo " 0 results";
	}
	?>
	</div>

	
</body>

</html>
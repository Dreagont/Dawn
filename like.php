<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dawn";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$like = $_POST['like'];
$username = $_POST['username'];
$sql = 'UPDATE likemark SET `like`=' . $like . ' WHERE username="' . $username . '"';
$result = mysqli_query($conn, $sql);
header("Location: moviepage.php");
exit();
?>

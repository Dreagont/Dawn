<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dawn";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$mark = $_POST['mark'];
$username = $_POST['username'];
$sql = 'UPDATE likemark SET `mark`=' . $mark . ' WHERE username="' . $username . '"';
$result = mysqli_query($conn, $sql);
$_SESSION['save'] = 'Saved';
if ($mark == 0) {
    unset($_SESSION['save']);
}
echo 'success';
header("Location: moviepage.php");
exit();
?>

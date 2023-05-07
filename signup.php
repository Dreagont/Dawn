<?php
// Khởi động phiên làm việc
session_start();
session_destroy();
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dawn";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Xử lý dữ liệu khi người dùng bấm nút Đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Lấy giá trị từ form đăng nhập
    $username = $_POST["username"];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST['email'];
    $sndpassword = $_POST["sndpassword"];


    $sql = $sql = "SELECT * FROM users WHERE username = '" . $username . "';";
    $result = $conn->query($sql);
    $flag = 1;
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        $flag = 0;
    }

    // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
    if ($password === $sndpassword && $flag == 0) {
        $sql = "INSERT INTO users (username, password, firstname, lastname, email) VALUES ('$username','$password','$firstname','$lastname','$email')";
        $result = $conn->query($sql);
        $sql = "insert into likemark (username) values ('$lastname')";
        $result = $conn->query($sql);
        $_SESSION["signin"] = true;
        $_SESSION["username"] = $username;
        header("location: login.php");
    } else {

        $error = "Confirm password is incorrect";
        if ($flag == 1) {
            $error = "Username is already in registered";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dawn Sign Up</title>
    <link rel="stylesheet" href="login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            background-color: #2C2E47;
            font: 14px sans-serif;
        }
    </style>
</head>

<body>
    <div class="signin-wrapper login-text">
        <h2>Sign Up</h2>
        <p>Enter your information</p>
        <?php
        if (isset($error)) {
            echo "<div class='login-error'>" . $error . "</div>";
        }
        ?>
        <p id="erro"></p>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="input-area" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="input-area" required>
            </div>
            <div class="form-group">
                <label>FirstName</label>
                <input type="text" name="firstname" class="input-area" required>
            </div>
            <div class="form-group">
                <label>LastName</label>
                <input type="text" name="lastname" class="input-area" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="input-area" required>
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input type="text" name="sndpassword" class="input-area" required>
            </div>
            <div class="form-group1">
                <input type="submit" class="login-btn" value="Sign up">
            </div>
        </form>
    </div>
</body>

</html>
<?php
// Khởi động phiên làm việc
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dawn";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Xử lý dữ liệu khi người dùng bấm nút Đăng nhập
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Lấy giá trị từ form đăng nhập
    $username = $_POST["username"];
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."';";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    
    // Nếu tài khoản và mật khẩu đúng, đăng nhập thành công và chuyển hướng tới trang chào mừng
    if($count){
        $_SESSION["loggedin"] = true;
        $sql = "SELECT lastname FROM users WHERE username = '".$username."' and password = '".$password."';";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $row["lastname"];
        header("location: index.php");
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dawn Login</title>
    <link rel="stylesheet" href="login.css">
    <style >
        body{ 
            background-color: #2C2E47;
            font: 14px sans-serif; 
        }
        
    </style>
</head>
<body>
        <div class="login-wrapper login-text">
            <h2>Login</h2>
            <p>Enter your information</p>
            <?php 
            if(isset($error)){
                echo "<div class='login-error'>" . $error . "</div>";
            }
            ?> 
            <p id = "erro"></p>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="input-area" required>
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="input-area" required>
                </div>
                <a href="signup.php" style="float: right; color: #fff">Sign up</a>
                <div class="form-group1">
                    <input type="submit" class="login-btn" value="Login">
                </div>
            </form>
        </div>
</body>
</html>  

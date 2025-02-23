<?php
session_start();
require './includes/config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($res);
        $role = $row['role'];
        if (password_verify($password, $row['pass'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            if ($role == 'admin') {
                header('location: ./admin/studentDisplay.php');
            }
            if ($role == 'student') {
                header('location: ./user/studentdashboard.php');
            }
        } else {
            echo "Password donot match";
        }
    } else {
        echo "No user found";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- <script defer src="../assets/js/login.js"></script> -->
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="./assets/image/student.jpg" alt="Student holding books">
        </div>
        <div class="login-section">
            <h2>Welcome to Dashboard</h2>
            <p>Need an account? <a href="#">Sign Up</a></p>
            <form id="login-form" action="index.php" method="POST">
                <label for="email">Email *</label>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="admin@gmail.com" >
                    <span class="icon">📧</span>
                </div>
                
                <label for="password">Password *</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="" >
                    <span class="icon">🔒</span>
                </div>

                <div class="options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="login">login</button>

                <div class="social-login">
                    <p>OR</p>
                    <div class="social-icons">
                        <button class="google">G+</button>
                        <button class="facebook">f</button>
                        <button class="twitter">T</button>
                        <button class="linkedin">in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

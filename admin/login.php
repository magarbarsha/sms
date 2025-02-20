<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <script defer src="../assets/js/login.js"></script>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="../assets/image/student.jpg" alt="Student holding books">
        </div>
        <div class="login-section">
            <h2>Welcome to Dashboard</h2>
            <p>Need an account? <a href="#">Sign Up</a></p>
            <form id="login-form" action="dashboard.php">
                <label for="email">Email *</label>
                <div class="input-group">
                    <input type="email" id="email" placeholder="admin@gmail.com" required>
                    <span class="icon">📧</span>
                </div>
                
                <label for="password">Password *</label>
                <div class="input-group">
                    <input type="password" id="password" placeholder="" required>
                    <span class="icon">🔒</span>
                </div>

                <div class="options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button><a href="dashboard.php">Login</a></button>

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

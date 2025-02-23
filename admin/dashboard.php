<?php
include '../includes/config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard_style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo" style="text-align:center;">SMS</div>
        <ul class="menu">
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li><a href="./studentdisplay.php">Students</a></li>
            <li><a href="#">Teachers</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">Subjects</a></li>
            <li><a href="#">Invoices</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <div class="search-bar">
                <input type="text" placeholder="Search here...">
            </div>
            <nav class="navbar">
    

    <!-- Profile Dropdown -->
    <div class="profile-dropdown" onclick="toggleMenu()">
        <!-- User Icon -->
        <img src="user-icon.png" alt="User Icon" class="profile-icon">
        <!-- Dropdown Menu -->
        <div id="profileMenu" class="dropdown-menu">
            <a href="#" class="dropdown-item">Login</a>
            <a href="#" class="dropdown-item">Logout</a>
        </div>
    </div>
</nav>  
        </header>

        <section class="cards">
            <div class="card">
                <h3>Students</h3>
                <p>50,055</p>
            </div>
            <div class="card">
                <h3>Awards</h3>
                <p>50+</p>
            </div>
            <div class="card">
                <h3>Departments</h3>
                <p>30+</p>
            </div>
            <div class="card">
                <h3>Revenue</h3>
                <p>$505</p>
            </div>
        </section>

        <section class="charts">
            <div class="chart">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="barChart"></canvas>
            </div>
        </section>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>

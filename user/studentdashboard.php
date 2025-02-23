<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'student') {
    header('location: ../index.php');
    die;
}
require '../includes/config.php';
$sql = "SELECT * FROM students INNER JOIN faculties ON students.faculty_id= faculties.id WHERE students.id= $_SESSION[id]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$address = $row['address'];
$city = $row['city'];
$gurname = $row['gurname'];
$email = $row['email'];
$contact = $row['contact'];
$pass = $row['pass'];
$faculty_id = $row['faculty_id'];
$file_upload = $row['file_upload'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/userdash.css">
    <title>Profile</title>

</head>

<body>



    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i> SMS
            </div>
            <div class="nav-menu">
                <div class="nav-item">
                    <a href="#"><i class="fas fa-home"></i> Home</a>
                </div>
                <div class="nav-item">
                    <a href="#"><i class="fas fa-book-open"></i> Courses</a>
                </div>
                <div class="nav-item">
                    <a href="#"><i class="fas fa-tasks"></i> Assignments</a>
                </div>
                <div class="nav-item">
                    <a href="#"><i class="fas fa-chart-line"></i> Grades</a>
                </div>
                <div class="nav-item">
                    <a href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>
                </div>
                <div class="nav-item">
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="welcome">
                    <h1>Welcome, <?php echo $name; ?>!</h1>
                    <p>Here's your profile overview</p>
                </div>
            </header>

            <div class="profile-container">
                <img src="../uploads/<?php echo $file_upload; ?>" alt="Profile Picture">
                <h2><?php echo $name; ?></h2>
                <p><strong>Address:</strong> <?php echo $address; ?></p>
                <p><strong>City:</strong> <?php echo $city; ?></p>
                <p><strong>Guardian Name:</strong> <?php echo $gurname; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Contact:</strong> <?php echo $contact; ?></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 SMS. All Rights Reserved.</p>
    </div>

</body>

</html>
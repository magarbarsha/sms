<?php
include '../includes/config.php';
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']!= 'admin'){
    header('location: ../index.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard_style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">School SM</div>
        <ul class="menu">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Teachers</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">Subjects</a></li>
            <li><a href="#">Invoices</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2 style="text-align:center; font-size: 2em;">Student Management System</h2>
        <a href="studentinsert1.php" class="add-student-link" style="background-color: blue; color: white;"><i class="fa-solid fa-plus"></i>Add New Student</a>
    <table>
        <tr>
            <th>SN</th>
            <th>name</th>
            <th>adress</th>
            <th>city</th>
            <th>gurname</th>
            <th>email</th>
            <th>contact</th>
            <th>pass</th>
            <th>faculty_id</th>
            <th>file_upload</th>
            <th>action</th>
</tr>
<?php
$sql="SELECT * FROM students";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
$counter=0;
//display the rows returned by the sql query
if($num > 0){
 while($row=mysqli_fetch_assoc($res)){
?>
<tr>
    <td><?php echo ++$counter ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['city'] ?></td>
    <td><?php echo $row['gurname'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['contact'] ?></td>
    <td><?php echo $row['pass'] ?></td>
  
    <td><?php echo $row['faculty_id'] ?></td>
    <td><img src="<?php echo '../uploads/'.$row['file_upload']?>"/></td>
<td><a href="./studentedit.php?id=<?php echo $row['id'] ?>">Edit</a>

<a href="./studentdelete.php?id=<?php echo $row['id'] ?>">Delete</a>
</td>
 </tr>
 <?php }
}
?>
<tr>
    <td></td>
    <td></td>
    <td></td>
</tr>

            </div>

<script src="../assets/js/dashboard.js"></script>
</body>
</html>

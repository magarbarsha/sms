<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['role']!= 'student'){
    header('location: ../index.php');
    die;
}
require '../includes/config.php';
$sql = "SELECT * FROM students INNER JOIN faculties ON students.faculty_id= faculties.id WHERE students.id= $_SESSION[id]";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$address=$row['address'];
$city=$row['city'];
$gurname=$row['gurname'];
$email=$row['email'];
$contact=$row['contact'];
$pass=$row['pass'];
$faculty_id=$row['faculty_id'];
$file_upload=$row['file_upload'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        <label>username:</label>
        <input type="text" name="name" placeholder="enter your name" id=""><br><br>
        <label>address:</label>
        <input type="text" name="address" placeholder="enter your address" id=""><br><br>
        <label>city</label>
        <input type="text" name="city" placeholder="enter your city" id=""><br><br>
        <label>Gaurdain name:</label>
        <input type="text" name="gurname" placeholder="enter your gaurdain name" id=""><br><br>

        <select name="faculty_id" id="">
            <?php
            if($num>0){
                while($row=mysqli_fetch_assoc($res)){?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['faculty_name']; ?></option>

              <?php  }
            }
            ?>
            
        </select>
        <input type="file" name="file_upload" id=""><br><br>
        <label>email:</label>
        <input type="email" name="email" placeholder="enter your email" id=""><br><br>
        <label>contact info:</label>
        <input type="number" name="contact" placeholder="enter your number" id=""><br><br>
        <label>password</label>
        <input type="password" name="pass" placeholder="enter your password" id=""><br><br>
        <input type="submit" name="submit" value="submit" id=""><br>
        
    </form>

</body>
</html>
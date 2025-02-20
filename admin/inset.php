<?php
$host="localhost";
$username="root";
$password="";
$db_name="sms";
$conn=mysqli_connect($host,$username,$password,$db_name);
if($conn){
    echo "connection established";
}
else{
    echo "connection failed";
}
if(isset($_POST['upload'])){
    
    $faculty_name=$_POST['faculty_name'];

$sql="INSERT INTO faculties (faculty_name) values ('$faculty_name')";
$res=mysqli_query($conn,$sql);
if($res){
    echo "data inserted succesfully";
}
else{
echo "data insert failed";
}
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label>faculty_name:</label>
        <input type="text" name="faculty_name" id="">
        <input type="submit" name="upload" value="upload">
</form>
</body>
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
    echo "connection  failed";
}
$id=$_GET['id'];
$sql="DElETE FROM students WHERE id= $id";
$res=mysqli_query($conn,$sql);
?>

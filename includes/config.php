<?php
$hostname="localhost";
$username="root";
$password="";
$db_name="sms";
$conn=mysqli_connect($hostname,$username,$password,$db_name);
if(!$conn){
 
    echo "failed connection";
}
?>
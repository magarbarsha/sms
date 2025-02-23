<?php
include('../includes/config.php');
$sql="SELECT *FROM faculties";
$res=mysqli_query($conn,$sql);
if($res){
    header('location: ../studentdisplay.php');
}
$num=mysqli_num_rows($res);
if(isset($_POST['submit'])){

    // print_r($_POST); die;
    
    $name=$_POST['name'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $gurname=$_POST['gurname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $pass=$_POST['pass'];
    $hashed_pass=password_hash($pass, PASSWORD_DEFAULT);
    $faculty_id = $_POST['faculty_id'];
   $file_name=$_FILES['file_upload'];
   $file_name = $_FILES['file_upload']['name'];
    $file_tmp_name = $_FILES['file_upload']['tmp_name'];
    $file_size = $_FILES['file_upload']['size'];

    $upload_dir = '../uploads/';

    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $file_with_timestamp = $timestamp . '.' . $file_ext;
    $file_with_timestamp = "P".$timestamp . '.' . $file_ext;//profile picture ko lagi file namse dena lai yesasri garne

    $upload_path = $upload_dir . $file_with_timestamp;


    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    if (!in_array(strtolower($file_ext), $allowed_types)) {
        echo "Invalid file type. Only JPG, PNG, GIF, and PDF are allowed.";
    } else {
        if (move_uploaded_file($file_tmp_name, $upload_path)) {
            $sql = "INSERT into students (name,address,faculty_id,city,gurname,email,contact,pass,file_upload) VALUES ('$name', '$address',$faculty_id,'$city','$gurname','$email', '$contact','$hashed_pass','$file_with_timestamp')";

            if(mysqli_query($conn, $sql)){
                echo "Data inserted Successfully.";
                header('Location: ./studentdisplay.php');
            }else{
                echo "Failed";
            }
        } else {
            echo "There was an error uploading the file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
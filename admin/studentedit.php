<?php
include '../includes/config.php';
$id = $_GET['id'];
$select = "SELECT * FROM students WHERE id = $id";
$selres = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($selres);

$name = $row['name'];
$address=$row['address'];
$city=$row['city'];
$gurname=$row['gurname'];
$email = $row['email'];
$contact = $row['contact'];
$faculty_id = $row['faculty_id'];
$file_upload=$row['file_upload'];


$sql = "SELECT * FROM faculties";

$res = mysqli_query($conn, $sql);
$num = mysqli_num_rows($res);

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gurname = $_POST['gurname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
   
    $faculty_id = $_POST['faculty_id'];
  
    



    if (empty($_FILES['file_upload']['name'])) {
        $updatequery = "UPDATE `students` SET `name`='$name',`address`='$address',`city`='$city',`gurname`='$gurname',`faculty_id`='$faculty_id',`email`='$email',`contact`='$contact' WHERE id = $id";

        $res = mysqli_query($conn, $updatequery);
        if($res){
            echo 'success';
            header('Location: ./studentDisplay.php');
        }
        else{
            echo "failed";
        }
    } else {

        $file_name = $_FILES['file_upload']['name'];
        $file_tmp_name = $_FILES['file_upload']['tmp_name'];
        $file_size = $_FILES['file_upload']['size'];

        $upload_dir = '../uploads/';

        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $timestamp = time();
        $file_with_timestamp = $timestamp . '.' . $file_ext;


        $upload_path = $upload_dir . $file_with_timestamp;


        $allowed_types = ['jpg', 'jpeg', 'png'];
        if (!in_array(strtolower($file_ext), $allowed_types)) {
            echo "Invalid file type. Only JPG, PNG, GIF, and PDF are allowed.";
        } else {
            if (move_uploaded_file($file_tmp_name, $upload_path)) {
                $updatequery = "UPDATE `students` SET `name`='$name',`address`='$address',`city`='$city',`gurname`='$gurname',`faculty_id`='$faculty_id',`email`='$email',`contact`='$contact', `file_upload` = '$file_with_timestamp' WHERE id = $id";

                if (mysqli_query($conn, $updatequery)) {
                    $pp_photo_old = $row['file_upload']; // Ensure $pp_photo_old is defined
                    unlink("{$upload_dir}{$pp_photo_old}");
                    echo "Data updated Successfully.";
                    header('Location: ./studentdisplay.php');
                } else {
                    echo "Failed";
                }
            } else {
                echo "There was an error uploading the file.";
            }
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
    <!-- <?php include './nav.php' ?> -->
    <main class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Full name" id=""><br>
            <input type="text" name="address" value="<?php echo $address ?>" placeholder="Enter your address" id=""><br>
            <input type="text" name="city" value="<?php echo $city ?>" placeholder="City" id=""><br>
            <input type="text" name="gurname" value="<?php echo $gurname ?>" placeholder="Gaurdain name" id=""><br>
            <input type="text" value="<?php echo $email ?>" name="email" placeholder="abc@gmail.com" id=""><br>
            <input type="text" name="contact" value="<?php echo $contact ?>" placeholder="98********" id=""><br>
            <select name="faculty_id" id="">
                <option value="" disabled>Select Faculty</option>
                <?php
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $faculty_id ? "selected" : ""); ?>><?php echo $row['faculty_name']; ?></option>
                <?php }
                }
                ?>

            </select><br>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>"> 
            <input type="file" name="file_upload" placeholder="Choose your photo" id=""><br>
          
            <!-- <input type="password" name="password" placeholder="Password" id=""><br> -->
            <input type="submit" value="Update" name="update">
        </form>
    </main>
</body>

</html>
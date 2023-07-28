<?php
session_start();
/*Array
(
    [name] => John
    [email] => jh@gmail.com
    [phone] => 08768619628
    [age] => 21
    [gender] => Male
    [ch] => Array
        (
            [0] => Bengali
            [1] => English
        )

    [city] => Delhi
    [password] => 123
) */

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$city = $_POST['city'];

$languege = $_POST['ch'];
$password = $_POST['password'];

$known_lang = implode(',', $languege);

$enc_pass = password_hash($password,PASSWORD_DEFAULT);

$imageName = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];
$imageType = $_FILES['image']['type'];

$upd_location='uploads/';
$new_name=$upd_location.time()."-".rand(1000,9999)."-".$imageName;




move_uploaded_file($imageTemp,$new_name);

$conn =  new mysqli('localhost','root','', 'center_miniproject');


if($conn->connect_error) die($conn->connect_error);
else{
    $sql= "INSERT INTO `student` ( `name`, `email`, `phone`, `age`, `gender`, `language`, `city`, `password`,`image`) VALUES ('{$name}','{$email}','{$phone}','{$age}','{$gender}','{$known_lang}','{$city}','{$enc_pass}','{$new_name}')";

    $conn->query($sql);

    $affected_rows=$conn->affected_rows;

    if($affected_rows==1){
        // echo"<script>
        //     alert('Data Saved Successfully');
        //     window.location.href='signup.php';
        // </script>";
        $_SESSION['message']= 'Data Saved Successfully';
    }else{
        // echo "<script>
        //     alert('Data Not Saved');
        //     window.location.href='signup.php';
        // </script>";
        $_SESSION['message'] = 'Data Not Saved';

    }
    header('location:signup.php');

}


$conn->close();


// print('<pre>');
// print_r($_FILES);

// $imageName = $_FILES['image']['name'];
// $imageTemp = $_FILES['image']['tmp_name'];




?>
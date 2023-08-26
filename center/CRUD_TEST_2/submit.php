<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$ph = $_POST['ph'];
$age = $_POST['age'];
$psw = password_hash($_POST['psw'],PASSWORD_DEFAULT);


$image_name=$_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];

$location="images/".$image_name;
move_uploaded_file($image_tmp_name,$location);

include('db.config.php');

$sql= "INSERT INTO `user`( `name`, `email`, `phone`, `age`, `image`, `password`) VALUES ('$name','$email','$ph','$age','$location','$psw')";

$conn->query($sql);

$aff=$conn->affected_rows;

if($aff){
    $_SESSION['message']="Data Saved";
}else{
    $_SESSION['message'] = "Data not Saved";

}

header('location:signup.php');







?>
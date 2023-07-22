<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$password = $_POST['password'];

//encrypt the password.
$hash_password=password_hash($password,PASSWORD_DEFAULT);

$conn = mysqli_connect('localhost', 'root', '', 'ajax_crud') or die('Connection Failed');
$sql= "INSERT INTO player (name, email, phone, age, gender, city,password) VALUES ('{$name}','{$email}','{$phone}','{$age}','{$gender}','{$city}','{$hash_password}')";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>
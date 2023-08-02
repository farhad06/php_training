<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$id = $_POST['id'];

$imageName = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];

$upd_location = 'uploads/';
$new_name = $upd_location . time() . "-" . rand(1000, 9999) . "-" . $imageName;


if ($imageError != 0) {
    $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age', `gender`='$gender' WHERE `id`=$id";
} else {
    move_uploaded_file($imageTemp, $new_name);
    $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age',`gender`='$gender',`image`='$new_name' WHERE `id`=$id";
}
$conn =  new mysqli('localhost', 'root', '', 'center_miniproject');

$conn->query($sql);
$res = $conn->affected_rows;

if ($res) {
    $_SESSION['SUCCESS_MSG'] = 'Data Updated Successfully';
} else {
    $_SESSION['ERROR_MSG'] = 'Data not Updated';
}
header('location:index.php', "Refresh: 0");
$conn->close();






?>
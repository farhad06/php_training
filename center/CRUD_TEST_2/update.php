<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$ph = $_POST['ph'];
$age = $_POST['age'];
$psw = password_hash($_POST['psw'],PASSWORD_DEFAULT);
$id =$_POST['id'];


$image_name=$_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];


$location="images/".$image_name;

include('db.config.php');

$sql="";

if($imageError!=0){
    $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`phone`='$ph',`age`='$age' WHERE `id`=$id";
}else{
    move_uploaded_file($image_tmp_name, $location);
    $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`phone`='$ph',`age`='$age',`image`='$location'  WHERE `id`=$id";
}



$conn->query($sql);

$aff=$conn->affected_rows;

if($aff){
    $_SESSION['message']="Data Updated";
}else{
    $_SESSION['message'] = "Data not Updated";

}

header('location:index.php');

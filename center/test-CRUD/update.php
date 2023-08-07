<?php
session_start();
$carname=$_POST['c_name'];
$m_country = $_POST['m_country'];
$horse_power = $_POST['horse_power'];
$cc = $_POST['cc'];
$c_color = $_POST['c_color'];
$id = $_POST['id'];


$imageName=$_FILES['image']['name'];
$imageTmpName=$_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];

$location="uploads/". $imageName;

include('db.config.php');
$sql="";
if ($imageError != 0){
    $sql = "UPDATE `car` SET `b_name`='$carname',`m_country`='$m_country',`hp`='$horse_power',`cc`='$cc',`c_color`='$c_color' WHERE `id`=$id";
}else{
    move_uploaded_file($imageTmpName, $location);

    $sql= "UPDATE `car` SET `b_name`='$carname',`m_country`='$m_country',`hp`='$horse_power',`cc`='$cc',`c_color`='$c_color',`image`='$location' WHERE `id`=$id";
}

$conn->query($sql);

$res=$conn->affected_rows;

if($res){
    $_SESSION['MESSAGE']="Details Updated";
}else{
    $_SESSION['MESSAGE'] = "Details Not Updated";

}
header('location:show.php');

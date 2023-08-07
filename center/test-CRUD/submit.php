<?php
session_start();
$carname=$_POST['c_name'];
$m_country = $_POST['m_country'];
$horse_power = $_POST['horse_power'];
$cc = $_POST['cc'];
$c_color = $_POST['c_color'];

$imageName=$_FILES['image']['name'];
$imageTmpName=$_FILES['image']['tmp_name'];

$location="uploads/". $imageName;

include('db.config.php');

move_uploaded_file($imageTmpName,$location);

$sql= "INSERT INTO `car`(`b_name`, `m_country`, `hp`, `cc`, `c_color`, `image`) VALUES ('$carname','$m_country','$horse_power','$cc','$c_color','$location')";

$conn->query($sql);

$res=$conn->affected_rows;

if($res){
    $_SESSION['MESSAGE']="Details Submitted";
}else{
    $_SESSION['MESSAGE'] = "Details Not Submitted";

}
header('location:show.php');

?>
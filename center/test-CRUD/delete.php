<?php 
session_start();
$id=$_GET['id'];

include("db.config.php");
$select_img="SELECT `image` FROM `car` WHERE `id`=$id";
$img_path = mysqli_fetch_assoc($conn->query($select_img));
$img_name = $img_path['image'];

$sql = "DELETE FROM `car` WHERE `id`=$id";
$conn->query($sql);

$res=$conn->affected_rows;
if ($res) {
    unlink($img_name);
    $_SESSION['MESSAGE'] = "Details Deleted";
} else {
    $_SESSION['MESSAGE'] = "Details Not Deleted";
}
header('location:show.php');




?>
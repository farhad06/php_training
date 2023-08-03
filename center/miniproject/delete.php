<?php
session_start();
$id = $_GET['id'];

$conn =  new mysqli('localhost', 'root', '', 'center_miniproject');

if ($conn->connect_error) die($conn->connect_error);
else {
    $select_img = "SELECT `image` FROM `student` WHERE `id`=$id";
    $img_path = mysqli_fetch_assoc($conn->query($select_img));
    $img_name = $img_path['image'];
    $sql = "DELETE from `student` WHERE `id`=$id";

    $conn->query($sql);
    $res = $conn->affected_rows;

    if ($res) {
        unlink($img_name);
        $_SESSION['SUCCESS_MSG'] = 'Data Deleted Successfully';
    } else {
        $_SESSION['ERROR_MSG'] = 'Data not Updated';
    }

    header('location:index.php', 'Refresh:0');

    $conn->close();
}
?>
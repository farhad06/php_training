<?php
$name = $_POST['name'];
$imageName = $_FILES['image']['name'];
$imageTempName = $_FILES['image']['tmp_name'];
$folder = 'Uploads/' . $imageName;

$conn = new mysqli('localhost', 'root', '', 'ajax_crud');

if ($conn->connect_error) {
    die($conn->connect_error);
} else {
    $sql = "INSERT INTO ajax_image_upload  (name,image_name) VALUES ('{$name}','{$imageName}')";
    $conn->query($sql);
    if (move_uploaded_file($imageTempName, $folder)) {
        echo 1;
    } else {
        echo 0;
    }
}

$conn->close();




?>
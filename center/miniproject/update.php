<?php
#start session
session_start();

#fetch all the form data from edit.php page
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$id = $_POST['id'];

#fetch all the image data from edit.php page
$imageName = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];

#innitiate the upload location
$upd_location = 'uploads/';

#create random image name
$new_name = $upd_location . time() . "-" . rand(1000, 9999) . "-" . $imageName;

$sql="";
#when user update his/her data without image
if ($imageError != 0) {
    $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age', `gender`='$gender' WHERE `id`=$id";
#when user update his/her data with image
} else {
    #upload the image in upload file that is present my project
    move_uploaded_file($imageTemp, $new_name);
    $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age',`gender`='$gender',`image`='$new_name' WHERE `id`=$id";
}

#database connection
$conn =  new mysqli('localhost', 'root', '', 'center_miniproject');

#run query
$conn->query($sql);
#check any row effected or not
$res = $conn->affected_rows;

#print result
if ($res) {
    $_SESSION['SUCCESS_MSG'] = 'Data Updated Successfully';
} else {
    $_SESSION['ERROR_MSG'] = 'Data not Updated';
}

#redirect to index page with refresh index page
header('location:index.php', "Refresh: 0");

#close the database connection
$conn->close();
?>
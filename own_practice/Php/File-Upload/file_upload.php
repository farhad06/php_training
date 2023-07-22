<?php
// print("<pre>");
// print_r($_POST);
// print("<pre>");
//print_r($_FILES);

$fileName=$_FILES['image']['name'];
$fileType=$_FILES['image']['type'];
$fileTemp=$_FILES['image']['tmp_name'];
$fileSize=$_FILES['image']['size'];

if($fileType=='image/png' || $fileType=='image/jpg'||$fileType=='image/jpeg'||$fileType=='image/gif' ){
move_uploaded_file($fileTemp,'Images/'.$fileName);
echo "<script>alert('Image Uploaded')</script>";
}else{
    echo "<script>alert('File Type Not Supported')</script>";
}
//header('Location:http://127.0.0.1/php_tranning/own_practice/Php/File-Upload/index.html')



?>
<?php
/*Array
(
    [name] => John
    [email] => jh@gmail.com
    [phone] => 08768619628
    [age] => 21
    [gender] => Male
    [ch] => Array
        (
            [0] => Bengali
            [1] => English
        )

    [city] => Delhi
    [password] => 123
) */

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$city = $_POST['city'];

$languege = $_POST['ch'];
$password = $_POST['password'];

$known_lang = implode(',', $languege);

$enc_pass = password_hash($password,PASSWORD_DEFAULT);
$imageName = $_FILES['image']['name'];
$imageTemp = $_FILES['image']['tmp_name'];
$imageType = $_FILES['image']['type'];

//$imgName = "IMG_".random_int(11111,99999).$imageType;
// $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
// $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
// $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
move_uploaded_file($imageTemp,'uploads/'.$imageName);

$conn =  new mysqli('localhost','root','', 'center_miniproject');


if($conn->connect_error) die($conn->connect_error);
else{
    $sql= "INSERT INTO `student` ( `name`, `email`, `phone`, `age`, `gender`, `language`, `city`, `password`,`image`) VALUES ('{$name}','{$email}','{$phone}','{$age}','{$gender}','{$known_lang}','{$city}','{$enc_pass}','{$imageName}')";

    $conn->query($sql);

    $affected_rows=$conn->affected_rows;

    if($affected_rows==1){
        echo"<script>
            alert('Data Saved Successfully');
            window.location.href='signup.php';
        </script>";
    }else{
        echo "<script>
            alert('Data Not Saved');
            window.location.href='signup.php';
        </script>";
    }

}


$conn->close();


// print('<pre>');
// print_r($_FILES);

// $imageName = $_FILES['image']['name'];
// $imageTemp = $_FILES['image']['tmp_name'];




?>
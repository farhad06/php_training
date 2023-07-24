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

$conn =  new mysqli('localhost','root','', 'center_miniproject');

if($conn->connect_error) die($conn->connect_error);
else{
    $sql= "INSERT INTO `student` ( `name`, `email`, `phone`, `age`, `gender`, `language`, `city`, `password`) VALUES ('{$name}','{$email}','{$phone}','{$age}','{$gender}','{$known_lang}','{$city}','{$enc_pass}')";

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


$conn->close()





?>
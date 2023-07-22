<?php
session_start(); 
$u_name = $_POST['name'];
$password = $_POST['psw'];
define('USER_NAME','admin');
define('PASSWORD','Admin@123');
if ($u_name == USER_NAME && $password == PASSWORD) {
    //echo "You Successfully Login";
    $_SESSION['USER'] = $u_name;
    header('location:welcome.php');
} else {
    //echo "Wrong User Name or Password!";
    header('location:password_validation.php?error=true');
}






?>
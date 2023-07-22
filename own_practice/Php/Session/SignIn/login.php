<?php 
session_start();
$user_name=$_POST['user_name'];
$password=$_POST['password'];
define('USERNAME','admin');
define('PASSWORD','admin@123');
if($user_name==USERNAME && $password==PASSWORD){
    //echo "You Successfully Login";
    $_SESSION['USER']=$user_name;
    header('location:welcome.php');
}else{
    //echo "Wrong User Name or Password!";
    header('location:index.php?error=true');

}
?>
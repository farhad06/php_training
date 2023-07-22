<?php 
$name=$_POST['sname'];
$address=$_POST['saddress'];
$class=$_POST['class'];
$phone=$_POST['sphone'];
$conn=mysqli_connect('localhost','root','','crud') or die("Connection failed");
$sql="INSERT INTO student ( sname, saddress, sclass, sphone) VALUES ('{$name}','{$address}','{$class}','{$phone}') ";
$result=mysqli_query($conn,$sql) or die("Unsuccessful.");
header('Location: http://127.0.0.1/php_tranning/own_practice/Projects/CRUD/index.php');
mysqli_close($conn);










?>
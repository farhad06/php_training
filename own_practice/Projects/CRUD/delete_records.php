<?php 
$stu_id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','crud') or die("Connection failed");
$sql="DELETE FROM student WHERE sid={$stu_id}";
$result=mysqli_query($conn,$sql) or die("Unsuccessful.");
header('Location: http://127.0.0.1/php_tranning/own_practice/Projects/CRUD/index.php');
mysqli_close($conn);

?>
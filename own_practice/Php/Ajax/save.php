<?php 
$name=$_POST['name'];
$age=$_POST['age'];

$conn=new mysqli('localhost','root','','ajax_crud');

if ($conn->connect_error)  die ($conn->connect_error);
else{
$sql="INSERT INTO test (name,age) VALUES ('{$name}','{$age}')";
if($conn->query($sql)){
    echo 1;
}else{
    echo 0;
}


}
$conn->close();
// $conn = mysqli_connect('localhost', 'root', '', 'ajax_crud') or die('Connection Failed');
// $sql = "INSERT INTO test (name,age) VALUES ('{$name}','{$age}')";
// if (mysqli_query($conn, $sql)) {
//     echo 1;
// } else {
//     echo 0;
// }



?>
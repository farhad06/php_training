<?php 
$conn = new mysqli('localhost','root','','php_center');
if($conn->connect_error) die($conn->connect_error);
else{
    $sql = "SELECT * FROM team_list";
    $res = $conn->query($sql);

    //$data = mysqli_fetch_all($res,MYSQLI_ASSOC);
    $data = mysqli_fetch_assoc($res);
    print("<pre>");
    print_r($data);
    //var_dump($data);
    
}





?>
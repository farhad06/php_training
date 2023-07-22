<?php 
$conn=new mysqli('localhost','root','','php_center');
if($conn->connect_error){
    die($conn->connect_error);
}else{
    $sql='SELECT * FROM team_list';

    $res=$conn->query($sql);

    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);
    //echo gettype($output);
    // print('<pre>');
    // print_r($output);

    echo json_encode($output);
}
$conn->close();
?>
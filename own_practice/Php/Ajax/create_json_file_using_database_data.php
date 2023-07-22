<?php 
$conn=new mysqli('localhost','root','','php_center');
if($conn->connect_error){
    die($conn->connect_error);
}else{
    $sql='SELECT * FROM team_list';

    $res=$conn->query($sql);

    $output=mysqli_fetch_all($res,MYSQLI_ASSOC);

    $jsonData= json_encode($output);
    $file_name= 'json-file-using-db-data'.date('d-m-Y').'.json';
    if(file_put_contents('JSON-Files/'.$file_name,$jsonData)){
        echo $file_name." created successfully!";
    }else{
        echo "Can't create JSON file";
    }
}
$conn->close();
?>








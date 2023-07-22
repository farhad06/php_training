<?php 
require('../inc/db_config.php');
require('../inc/essential.php');
adminLogIN();
if(isset($_POST['get_general_data'])){
    $query= "SELECT * FROM settings WHERE sr_no=?";
    $values=[1];
    $res=select($query,$values,"i");
    $data=mysqli_fetch_assoc($res);
    $json_data=json_encode($data);
    echo $json_data;
}

/*$query = "SELECT * FROM settings WHERE sr_no=?";
$values = [1];
$res = select($query, $values, "i");
$data = mysqli_fetch_assoc($res);
$json_data = json_encode($data);
echo $json_data;
*/







?>
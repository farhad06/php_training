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
if(isset($_POST['upload_general_data'])){
    $form_data= filteration($_POST);
    $q= "UPDATE `settings` SET `site_title`=?,`site_about`=?  WHERE `sr_no`=?";
    $values=[$form_data['site_title'],$form_data['site_about'],1];
    $res=update($q,$values,"ssi");
    echo $res;

}

if(isset($_POST['update_shutdown'])){
    $form_data= ($_POST['update_shutdown'] == 0) ?1:0;
    $q = "UPDATE `settings` SET `shutdown`=?  WHERE `sr_no`=?";
    $values = [$form_data, 1];
    $res = update($q, $values, "ii");
    echo $res;

}

if(isset($_POST['get_contact_data'])){
    $query = "SELECT * FROM `contact_details` WHERE sr_no=?";
    $values = [1];
    $res = select($query, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;

}


?>
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

if(isset($_POST['update_contact_details'])){
    $form_data = filteration($_POST);
    $q = "UPDATE `contact_details` SET `address`=?,`gmap`=?,`phone`=?,`mail`=?,`fb`=?,`insta`=?,`tw`=?,`iframe`=? WHERE `sr_no`=?";
    $values = [$form_data['address'], $form_data['gmap'], $form_data['phone_no'], $form_data['mail'], $form_data['facebook'], $form_data['instagram'], $form_data['twitter'], $form_data['iframe'], 1];
    $res = update($q, $values, "ssssssssi");
    echo $res;

}

if(isset($_POST['add_member'])){

    $form_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);

    if($img_r == 'inv_img'){
        echo $img_r;
    }else if ($img_r == 'inv_size'){
        echo $img_r;
    }else if($img_r == 'upd_failed'){
        echo $img_r;
    }else{
        $q= "INSERT INTO `member_details`(`name`, `picture`) VALUES (?,?)";
        $values=[$form_data['name'],$img_r];
        $res=insert($q,$values,'ss');
        echo $res;
    }
}


?>
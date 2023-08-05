<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essential.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['save_info'])) {
    $form_data = filteration($_POST);
    session_start();

    $u_exist = select("SELECT * FROM `user_cred` WHERE `phone`=? AND `id`!=? LIMIT 1", [$form_data['phone'], $_SESSION['USER_ID']], 'ss');

    if (mysqli_num_rows($u_exist) != 0) {
        echo 'phone_already';
        exit;
    }

    $query = "UPDATE `user_cred` SET `name`=?,`phone`=?,`address`=?,`pin`=?,`dob`=? WHERE `id`=?";
    $values = [$form_data['name'], $form_data['phone'], $form_data['address'], $form_data['pin'], $form_data['dob'], $_SESSION['USER_ID']];

    if (update($query, $values, 'ssssss')) {
        $_SESSION['USER_NAME'] = $form_data['name'];
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['update_profile_picture'])) {
    session_start();
    $img = uploadImage($_FILES['profile'], USERS_FOLDER);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    } else if ($img == 'inv_size') {
        echo 'inv_size';
        exit;
    }

    $u_exist = select("SELECT `profile` FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['USER_ID']], 's');
    $u_fetch = mysqli_fetch_assoc($u_exist);

    deleteImage($u_fetch['profile'], USERS_FOLDER);

    $query = "UPDATE `user_cred` SET `profile`=? WHERE `id`=?";
    $values = [$img, $_SESSION['USER_ID']];

    if (update($query, $values, 'ss')) {
        $_SESSION['USER_PICTURE'] = $img;
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['update_password'])) {
    session_start();
    $form_data = filteration($_POST);

    if($form_data['pass']!=$form_data['cpass']){
        echo 'miss_match';
        exit;
    }

    $enc_pass = password_hash($form_data['pass'], PASSWORD_BCRYPT);
    $query = "UPDATE `user_cred` SET `password`=? WHERE `id`=?";
    $values = [$enc_pass, $_SESSION['USER_ID']];

    if(update($query,$values,'ss')){
        echo 1;
    }else{
        echo 0;
    }





}

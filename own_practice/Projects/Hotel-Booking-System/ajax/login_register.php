<?php
//session_start();
require('../admin/inc/db_config.php');
require('../admin/inc/essential.php');

if(isset($_POST['add_user'])){
    $data = filteration($_POST);

    //match password and confirm password

    if($data['pass']!=$data['cpass']){
        echo 'password_missmatch';
        exit;
    }

    //check user exist or not 
    $u_exist=select("SELECT * FROM `user_cred` WHERE `email`=? OR `phone`=? LIMIT 1",[$data['email'],$data['phone']],'ss');

    if(mysqli_num_rows($u_exist)!=0){
        $u_exist_fetch=mysqli_fetch_assoc($u_exist);
        echo($u_exist_fetch['email'] == $data['email']) ? 'email_alredy':'phone_already';
        exit;
    }

    //upload user image 
    $img=uploadImage($_FILES['profile'],USERS_FOLDER);

    if($img == 'inv_img'){
        echo 'inv_img';
        exit;
    }else if($img == 'upd_failed'){
        echo 'upd_failed';
        exit;

    }else if($img == 'inv_size'){
        echo 'inv_size';
        exit;
    }

    //send user email for email varification

    //create password hash
     $enc_pass=password_hash($data['pass'],PASSWORD_BCRYPT);

     $query= "INSERT INTO `user_cred`(`name`, `email`, `phone`, `profile`, `address`, `pin`, `dob`, `password`) VALUES (?,?,?,?,?,?,?,?)";
     $values=[$data['name'], $data['email'], $data['phone'],$img, $data['address'], $data['pin'], $data['dob'],$enc_pass];

     if(insert($query,$values,'sssssiss')){
        echo 1;
     }else{
        echo 'insert_failed';
     }

}

if(isset($_POST['user_login'])){
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=?  LIMIT 1", [$data['email_log']], "s");


    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email_mob';
    }else{
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if($u_fetch['status']==0){
            echo 'inactive';
        }else{
            if(!(password_verify($data['pass_log'],$u_fetch['password']))){
                echo 'inv_pass';
            }else{
                session_start();
                $_SESSION['USER_LOGIN'] = true;
                $_SESSION['USER_ID'] = $u_fetch['id'];
                $_SESSION['USER_NAME'] = $u_fetch['name'];
                $_SESSION['USER_PICTURE'] = $u_fetch['profile'];
                $_SESSION['USER_PHONE'] = $u_fetch['phone'];
                echo 1;


            }
        }


    }

}




?>
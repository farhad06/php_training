<?php
require('../inc/db_config.php');
require('../inc/essential.php');
adminLogIN();

if(isset($_POST['add_room'])){
    $features = filteration(json_decode($_POST['features']));
    $facilitise = filteration(json_decode($_POST['facilities']));
    $form_data = filteration($_POST);

    $flag=0;

    $qu = "INSERT INTO `room`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
    $values = [$form_data['name'], $form_data['area'], $form_data['price'], $form_data['quantity'], $form_data['adult'], $form_data['children'], $form_data['description']];

    if(insert($qu,$values,'siiiiis')){
        $flag=1;
    }

    $room_id=mysqli_insert_id($conn);
    ########################################################################################
    $insert_faci = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

    if($stmt=mysqli_prepare($conn,$insert_faci)){
        foreach($facilitise as $f){
            mysqli_stmt_bind_param($stmt,'ii',$room_id,$f);
            mysqli_stmt_execute($stmt);

        }
        mysqli_stmt_close($stmt);

    }else{
        $flag = 0;
        die('Query Not Prepaired');
        
    }
    #############################################################################################
    $insert_features= "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $insert_features)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, 'ii',$room_id,$f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query Not Prepaired');
        
    }

    ###############################################################################################
    if($flag){
        echo 1;
    }else{
        echo 0;
    }

}





?>
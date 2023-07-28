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
    ######################### Insert Facilities table #############################
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
    ######################### Insert Features Table#########################
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

if(isset($_POST['get_all_rooms'])){
    $res = selectAll('room');
    $i=1;
    $data="";

    while($row = mysqli_fetch_assoc($res)){
        if($row['status']==1){
            $status="<button onclick='change_status($row[id],0)' class='btn btn-sm rounded-pill btn-success text-light shadow-none'>Active</button>";
        }else{
            $status = "<button onclick='change_status($row[id],1)' class='btn btn-sm rounded-pill btn-warning text-light shadow-none'>In Active</button>";
        }
        $data.= "
            <tr class='align-middle'>
               <td>$i</td>
               <td>$row[name]</td>
               <td>$row[area]</td>
               <td>
               <span class='badge rounded-pill lg-light text-dark'>
                Adult:$row[adult]
               </span>
               <br>
               <span class='badge rounded-pill lg-light text-dark'>
                Children:$row[children]
               </span>
               </td>
               <td>$row[price]</td>
               <td>$row[quantity]</td>
               <td>$status</td>
               <td>
               <button type='button' onclick='edit_room($row[id])' class='btn btn-sm btn-success shadow-none mb-sm-2 mb-lg-0' data-bs-toggle='modal' data-bs-target='#editroom'><i class='bi bi-pencil-square fs-5'></i>
               </button>
               <button type='button' onclick=\"room_id_name($row[id],'$row[name]')\" class='btn btn-sm btn-info shadow-none' data-bs-toggle='modal' data-bs-target='#addroomimage'><i class='bi bi-image fs-5'></i>
               </button>
               </td>
            </tr>

        ";
        $i++;
    }
    echo $data;
}

if(isset($_POST['change_status'])){
    $form_data = filteration($_POST);
    $q= "UPDATE `room` SET `status`=? WHERE `id`=?";
    $values = [$form_data['value'],$form_data['change_status']];
    if(update($q,$values,'ii')){
        echo 1;
    }else{
        echo 0;
    }
}

if(isset($_POST['get_room'])){
    $form_data = filteration($_POST);
    $res_room = select("SELECT * FROM `room` WHERE `id`=?",[$form_data['get_room']],'i');
    $res_faci = select("SELECT * FROM `room_facilities` WHERE `room_id`=?", [$form_data['get_room']], 'i');
    $res_feat = select("SELECT * FROM `room_features` WHERE `room_id`=?", [$form_data['get_room']], 'i');

    $roomdata = mysqli_fetch_assoc($res_room);
    $features=[];
    $facilities=[];

    if(mysqli_num_rows($res_faci)>0){
        while($row=mysqli_fetch_assoc($res_faci)){
            array_push($facilities,$row['facilities_id']);
        }
    }


    if (mysqli_num_rows($res_feat) > 0) {
        while ($row = mysqli_fetch_assoc($res_feat)) {
            array_push($features, $row['features_id']);
        }
    }

    $data=['roomdata'=>$roomdata,'facilities'=>$facilities,'features'=>$features];

    $data=json_encode($data,JSON_PRETTY_PRINT);
    echo $data;



}

if (isset($_POST['submit_edit_room'])) {
    $features = filteration(json_decode($_POST['features']));
    $facilitise = filteration(json_decode($_POST['facilities']));
    $form_data = filteration($_POST);

    $flag = 0;

    $q = "UPDATE `room` SET `name`=?,`area`=?,`price`=?,`quantity`=?,`adult`=?,`children`=?,`description`=? WHERE `id`=?";
    $values = [$form_data['name'], $form_data['area'], $form_data['price'], $form_data['quantity'], $form_data['adult'], $form_data['children'], $form_data['description'], $form_data['room_id']];

    if (update($q, $values, 'siiiiisi')) {
        $flag = 1;
    }

    $del_feature = delete("DELETE FROM `room_features` WHERE `room_id`=?",[$form_data['room_id']],'i');
    $del_faci = delete("DELETE FROM `room_facilities`WHERE `room_id`=?", [$form_data['room_id']], 'i');

    if(!($del_feature && $del_faci)){
        $flag=0;
    }


    //$room_id = mysqli_insert_id($conn);
    ######################### Insert Facilities table #############################
    $insert_faci = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $insert_faci)) {
        foreach ($facilitise as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $form_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag=1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query Not Prepaired');
    }
    ######################### Insert Features Table#########################
    $insert_features = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";

    if ($stmt = mysqli_prepare($conn, $insert_features)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $form_data['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag=1;
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('Query Not Prepaired');
    }

    ###############################################################################################
    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['add_room_image'])) {

    $form_data = filteration($_POST);
    $img_r = uploadImage($_FILES['room_image'], ROOMS_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `rooms_image`(`room_id`, `image`) VALUES (?,?)";
        $values = [$form_data['room_id'],$img_r];
        $res = insert($q, $values, 'is');
        echo $res;
    }
}

if (isset($_POST['room_id_name'])) {
    $form_data = filteration($_POST);
    $res = select("SELECT * FROM `rooms_image` WHERE `room_id`=?",[$form_data['room_id_name']],'i');
    
    while ($row = mysqli_fetch_assoc($res)) {
        $path= ROOM_IMAGE_PATH;
        echo <<<data
                <tr class='align-middle'>
                    <td><img src=$path$row[image] class='img-fluid'></td>
                    <td>$row[thumb]</td>
                    <td><button type="button" onclick='delete_room_image($row[sr_no],$row[room_id])' class="btn btn-sm rounded-pill btn-danger shadow-none"> Delete
                </button></td>
                </tr>
            data;
    }
}

if (isset($_POST['delete_room_image'])) {
    $form_data = filteration($_POST);
    $values = [$form_data['image_id'], $form_data['room_id']];

    $pre_sql = "SELECT * FROM `rooms_image` WHERE `sr_no`=? AND `room_id`=?";
    $res = select($pre_sql, $values, 'ii');
    $row = mysqli_fetch_assoc($res);

    if (deleteImage($row['image'], ROOMS_FOLDER)) {
        $q = "DELETE FROM `rooms_image` WHERE `sr_no`=? AND `room_id`=?";
        $res = delete($q, $values, 'ii');
        echo $res;
    } else {
        echo 0;
    }
}





?>
<?php
require('../inc/db_config.php');
require('../inc/essential.php');
adminLogIN();
if(isset($_POST['get_all_users'])){
    //$res = select("SELECT * FROM `user_cred` WHERE `remove`=?",[0],'i');
    $res=selectAll("user_cred");
    $i=1;
    $data="";

    while($row = mysqli_fetch_assoc($res)){
        if($row['status']==1){
        $status="<button onclick='change_status($row[id],0)' class='btn shadow-none'><i class='bi bi-check-circle-fill' style='font-size:35px; color:green;'></i></button>";
        }else{
        $status = "<button onclick='change_status($row[id],1)' class='btn shadow-none'><i class='bi bi-x-circle-fill' style='font-size:35px; color:red;'></i></button>";
        }
        $data.= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[dob]</td>
            <td>$status</td>
            <td>$row[created]</td>
            <td>
                <button type='button' onclick='remove_user($row[id])' class='btn shadow-none'><i class='bi bi-trash3-fill' style='font-size:35px; color:red;'></i>
                </button>
            </td>
        </tr>

        ";
        $i++;
        }
        echo $data;
}

if (isset($_POST['change_status'])) {
    $form_data = filteration($_POST);
    $q = "UPDATE `user_cred` SET `status`=? WHERE `id`=?";
    $values = [$form_data['value'], $form_data['change_status']];
    if (update($q, $values, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['remove_user'])) {
    $form_data = filteration($_POST);
    
    $res = delete("DELETE FROM `user_cred` WHERE `id`=?", [$form_data['remove_user']], 'i');
    
    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['search_user'])) {
    //$res = select("SELECT * FROM `user_cred` WHERE `remove`=?",[0],'i');
    $form_data = filteration($_POST);
    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";
    $res = select($query,["%$form_data[name]%"],'s');
    $i = 1;
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['status'] == 1) {
            $status = "<button onclick='change_status($row[id],0)' class='btn shadow-none'><i class='bi bi-check-circle-fill' style='font-size:35px; color:green;'></i></button>";
        } else {
            $status = "<button onclick='change_status($row[id],1)' class='btn shadow-none'><i class='bi bi-x-circle-fill' style='font-size:35px; color:red;'></i></button>";
        }
        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[dob]</td>
            <td>$status</td>
            <td>$row[created]</td>
            <td>
                <button type='button' onclick='remove_user($row[id])' class='btn shadow-none'><i class='bi bi-trash3-fill' style='font-size:35px; color:red;'></i>
                </button>
            </td>
        </tr>

        ";
        $i++;
    }
    echo $data;
}
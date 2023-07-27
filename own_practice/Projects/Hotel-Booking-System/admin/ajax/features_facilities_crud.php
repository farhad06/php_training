<?php
require('../inc/db_config.php');
require('../inc/essential.php');
adminLogIN();

if(isset($_POST['add_features'])){
$form_data = filteration($_POST);
$q= "INSERT INTO `features`( `name`) VALUES (?)";
$values=[$form_data['name']];
$res=insert($q,$values,'s');
echo $res;
}

if (isset($_POST['get_features'])) {
    $res = selectAll("features");
    $sl_no = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        
        echo <<<data
                <tr>
                    <td>$sl_no</td>
                    <td>$row[name]</td>
                    <td><button type="button" onclick="detele_features($row[id])" class="btn btn-sm rounded-pill btn-danger shadow-none"> Delete
                </button></td>
                </tr>
            data;
        $sl_no++;

    }
}

if (isset($_POST['detele_features'])) {
    $form_data = filteration($_POST);
    $values = [$form_data['detele_features']];
    $q = "DELETE FROM `features` WHERE id=?";
    $res = delete($q, $values, 'i');
    echo $res;
}

if (isset($_POST['add_facility'])) {

    $form_data = filteration($_POST);

    $img_r = uploadSVGImage($_FILES['icon'], FACILITIES_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `facilities`(`name`, `icon`, `description`) VALUES (?,?,?)";
        $values = [$form_data['name'], $img_r,$form_data['description']];
        $res = insert($q, $values, 'sss');
        echo $res;
    }
}

if (isset($_POST['get_facilities'])) {
    $res = selectAll("facilities");
    $sl_no = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $path= FACILITIES_IMAGE_PATH;
        echo <<<data
                <tr>
                    <td>$sl_no</td>
                    <td>$row[name]</td>
                    <td><img src='$path$row[icon]' heigth='50px' width='50px'></td>
                    <td>$row[description]</td>
                    <td>
                    <button type="button" onclick="detele_facilities($row[id])" class="btn btn-sm rounded-pill btn-danger shadow-none"> Delete
                    </button>
                    </td>
                </tr>
            data;
        $sl_no++;
    }
}

if (isset($_POST['detele_facilities'])) {
    $form_data = filteration($_POST);
    $values = [$form_data['detele_facilities']];

    $pre_sql = "SELECT * FROM `facilities` WHERE id=?";
    $res = select($pre_sql, $values, 'i');
    $row = mysqli_fetch_assoc($res);

    if (deleteImage($row['icon'], FACILITIES_FOLDER)){
        $q = "DELETE FROM `facilities` WHERE id=?";
        $res = delete($q, $values, 'i');
        echo $res;
    } else {
        echo 0;
    }
}


?>
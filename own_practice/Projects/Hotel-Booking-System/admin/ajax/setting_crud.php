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

if(isset($_POST['get_management_data'])){
    $res=selectAll("member_details");
    while($row=mysqli_fetch_assoc($res)){
        $path= ABOUT_IMAGE_PATH;

    echo <<<data

            <div class="col-md-2 mb-3">
                <div class="card bg-dark text-white">
                  <img src="$path$row[picture]" class="card-img">
                    <div class="card-img-overlay text-end">
                    <button type="button" onclick="detele_member_data($row[sr_no])" class="btn btn-sm btn-danger shadow-none">
                  <i class="bi bi-x-octagon me-1"></i>Delete
                </button>
                    </div>
                  <p class="card- text text-center px-3 py-2">{$row['name']}</p>
                </div>
            </div>

        data;
    }
}


if(isset($_POST['detele_member_data'])){
    $form_data = filteration($_POST);
    $values = [$form_data['detele_member_data']];

    $pre_sql = "SELECT * FROM `member_details` WHERE sr_no=?";
    $res=select($pre_sql,$values,'i');
    $row=mysqli_fetch_assoc($res);

    if(deleteImage($row['picture'], ABOUT_FOLDER)){
        $q= "DELETE FROM `member_details` WHERE sr_no=?";
        $res=delete($q,$values,'i');
        echo $res;

    }else{
        echo 0;
    }



}


?>
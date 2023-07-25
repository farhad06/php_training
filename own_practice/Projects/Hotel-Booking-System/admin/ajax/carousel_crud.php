<?php 
require('../inc/db_config.php');
require('../inc/essential.php');
adminLogIN();

if(isset($_POST['add_image'])){


    $img_r = uploadImage($_FILES['picture'], CAROUSEL_FOLDER);

    if($img_r == 'inv_img'){
        echo $img_r;
    }else if ($img_r == 'inv_size'){
        echo $img_r;
    }else if($img_r == 'upd_failed'){
        echo $img_r;
    }else{
        $q= "INSERT INTO `carousel` (`picture`) VALUES (?)";
        $values=[$img_r];
        $res=insert($q,$values,'s');
        echo $res;
    }
}

if(isset($_POST['get_image'])){
    $res=selectAll("carousel");
    while($row=mysqli_fetch_assoc($res)){
        $path= CAROUSEL_IMAGE_PATH;

    echo <<<data

            <div class="col-md-3 mb-3">
                <div class="card bg-dark text-white">
                  <img src="$path$row[picture]" class="card-img">
                    <div class="card-img-overlay text-end">
                        <button type="button" onclick="detele_image($row[sr_no])" class="btn btn-sm btn-danger shadow-none">
                            <i class="bi bi-x-octagon me-1"></i>Delete
                        </button>
                    </div>
                    
                </div>
                
            </div>

        data;
    }
}


if(isset($_POST['detele_image'])){
    $form_data = filteration($_POST);
    $values = [$form_data['detele_image']];

    $pre_sql = "SELECT * FROM `carousel` WHERE sr_no=?";
    $res=select($pre_sql,$values,'i');
    $row=mysqli_fetch_assoc($res);

    if(deleteImage($row['picture'], CAROUSEL_FOLDER)){
        $q= "DELETE FROM `carousel` WHERE sr_no=?";
        $res=delete($q,$values,'i');
        echo $res;

    }else{
        echo 0;
    }



}

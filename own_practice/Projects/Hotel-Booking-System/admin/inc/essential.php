<?php
//file path for frontend development
define('SITE_URL', 'http://127.0.0.1/php_tranning/own_practice/Projects/Hotel-Booking-System/');
define('ABOUT_IMAGE_PATH',SITE_URL.'images/about/');
//file path for Backend Development
define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT']. '/php_tranning/own_practice/Projects/Hotel-Booking-System/images/');
define('ABOUT_FOLDER','about/');

function adminLogIN()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        redirect('index.php');
        exit;
    }
    //session_regenerate_id(true);
    
}
function redirect($url)
{
    echo "<script>
            window.location.href='$url'
         </script>";
         exit;
}
function alert($type,$msg){
    $bs_class=($type=='success') ?"alert-success":"alert-danger";
    echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong>$msg</strong>.
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            alert;
}

function uploadImage($image,$folder){
    $valid_mime=['image/jpg','image/jpeg','image/png','image/webp'];
    $image_mime=$image['type'];
     if(!in_array($image_mime,$valid_mime)){
        return 'inv_img'; //invalid image type
     }else if(($image['size']/(1024*1024))>2){
        return 'inv_size'; //invalid size grater than 2mb
     }else{
        $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
        $rname='IMG_'.random_int(11111,99999).".$ext";
        $img_path= UPLOAD_IMAGE_PATH.$folder.$rname;

        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }else{
            return 'upd_failed';
        }
     }
}


function deleteImage($image,$folder){
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        return true;
    }else{
        return false;
    }
}






?>
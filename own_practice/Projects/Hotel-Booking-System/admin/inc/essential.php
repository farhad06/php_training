<?php

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






?>
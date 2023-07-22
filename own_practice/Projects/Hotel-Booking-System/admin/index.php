<?php 
session_start();
require('inc/db_config.php');
require('inc/essential.php');

if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)){
    redirect('dashboard.php');
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require_once('inc/links.php'); ?>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="login-form bg-white text-center rounded shadow overflow-hidden">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input type="text" name="admin_name" class="form-control shadow-none text-center" placeholder="Admin Name" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="admin_pass" class="form-control shadow-none text-center" placeholder="Enter Password" required>
                </div>
                <button type="submit" name="login" class="btn text-white shadow-none custom-bg">LOGIN</button>
            </div>
        </form>
    </div>
    <?php

    if (isset($_POST['login'])) {

        $form_data = filteration($_POST);
        $query = "SELECT * FROM `admin_cred` WHERE `admin_name` =? AND `admin_pass`=?";
        $values = [$form_data['admin_name'], $form_data['admin_pass']];
        $datatypes = "ss";
        $res = select($query, $values, $datatypes);
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminID'] = $row['sr_no'];
            redirect('dashboard.php');
        } else {
            alert('error', 'Login Failed Due to Wrong Credintial!');
        }
    }
    
    
    
    ?>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form text-center overflow-hidden rounded shadow bg-white">
            <h4 class="text-center bg-dark text-light py-3">LOG IN FORM</h4>
            <div class="p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <!-- <label>Name/Email</label> -->
                        <input type="text" name="u_name" class="form-control shadow-none rounded" placeholder="Enter Name/Email" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <!-- <label>Password</label> -->
                        <input type="password" name="u_pass" class="form-control shadow-none rounded" placeholder="Enter Password" autocomplete="off">
                    </div>
                    <?php
                    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                        echo "<section class='text-danger'  id='responseMsg'> 
                                    $_SESSION[message]</section>";
                        unset($_SESSION['message']);
                    }
                    if (isset($_SESSION['no_user']) && !empty($_SESSION['no_user'])) {
                        echo "<section class='text-danger' id='responseMsg'> 
                                    $_SESSION[no_user]</section>";
                        unset($_SESSION['no_user']);
                    }
                    ?>
                    <span class="text-dark">New User?<a href="signup.php" class="text-decoration-none">&nbsp;Sing In</a></span>
                    <div>
                        <button class="btn btn-dark shadow-none mt-2" name="login">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['u_pass'];

        $conn =  new mysqli('localhost', 'root', '', 'center_miniproject');
        //$veri_pass = password_verify($u_pass,);

        if ($conn->connect_error) die($conn->connect_error);
        else {
           $sql = "SELECT * FROM `student` WHERE (`email`='$u_name' OR `phone`='$u_name')";
            $res = $conn->query($sql);
            $rows = $res->fetch_assoc();
            if (!(password_verify($u_pass, $rows['password']))) {
                $_SESSION['message'] = "Wrong Credential.";
                header("location:index.php");
            } else if (mysqli_num_rows($res) == 0) {
                $_SESSION['no_user'] = "User not Exist";
                header("location:index.php");
            } else {

                $_SESSION['active_user'] = $rows['name'];
                $_SESSION['active_id'] = $rows['id'];
                $_SESSION['active_role'] = $rows['role'];
                $_SESSION['ip'] = $_SERVER['REMOTE-ADDR'];
                date_default_timezone_set('Asia/Kolkata');
                $_SESSION['time'] = date('d-m-y h:i:sA'); 
                header("location:show.php");
            }
        }
    }



    ?>

</body>

</html>
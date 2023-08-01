<?php
require('inc/essential.php');
require('inc/db_config.php');
adminLogIN();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashboard</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <?php
    $total_query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(`sr_no`) as total_query FROM `contact_us`"));
    $is_stutdown = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `shutdown` FROM `settings`"));
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="d-flex text-align-center justify-content-between mb-4">
                    <h5>Dashboard</h5>
                    <?php 
                    if($is_stutdown['shutdown']){
                        echo <<< msg
                            <h6 class="badge bg-danger px-3 py-2 rounded">Shut Down mode is active now</h6>
                        msg;
                    }
                    ?>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>New Booking</h6>
                                <h1 class="mt-2 mb-0">5</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Review & Rating</h6>
                                <h1 class="mt-2 mb-0">6</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="user_queries.php" class="text-decoration-none">
                            <div class="card text-center text-primary p-3">
                                <h6>User Query</h6>
                                <h1 class="mt-2 mb-0"><?php echo $total_query['total_query']; ?></h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Booking Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto">
                        <option value="1">Past 30 Days</option>
                        <option value="2">Past 90 Days</option>
                        <option value="3">Past 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Total Booking</h6>
                                <h1 class="mt-2 mb-0">3</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Active Booking</h6>
                                <h1 class="mt-2 mb-0">2</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-primary p-3">
                                <h6>Cancell Booking</h6>
                                <h1 class="mt-2 mb-0">0</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>User Query , Rating Reviews</h5>
                    <select class="form-select shadow-none bg-light w-auto">
                        <option value="1">Past 30 Days</option>
                        <option value="2">Past 90 Days</option>
                        <option value="3">Past 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>New Registration</h6>
                                <h1 class="mt-2 mb-0">3</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Queries</h6>
                                <h1 class="mt-2 mb-0">2</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-primary p-3">
                                <h6>Reviews</h6>
                                <h1 class="mt-2 mb-0">0</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                $total_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(`id`) as total_user FROM `user_cred`"));
                $total_active_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(`id`) as active_user FROM `user_cred` WHERE `status`=1"));
                $total_inactive_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(`id`) as inactive_user FROM `user_cred` WHERE `status`=0"));
                ?>
                <h5>User</h5>
                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <a href="users.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Total User</h6>
                                <h1 class="mt-2 mb-0"><?php echo $total_user['total_user']; ?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Active</h6>
                                <h1 class="mt-2 mb-0"><?php echo $total_active_user['active_user']; ?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-danger p-3">
                                <h6>Inactive User</h6>
                                <h1 class="mt-2 mb-0"><?php echo $total_inactive_user['inactive_user']; ?></h1>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
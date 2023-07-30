<?php
require('inc/essential.php');
require('inc/db_config.php');
require('inc/links.php');

adminLogIN();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Users</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Users</h3>
                <!--Room Start-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <input type="text" class="form-control shadow-none w-25 ms-auto" placeholder="Search User" oninput="search_user(this.value)">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="min-width:1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">DOB</th>
                                        <!-- <th scope="col">Verified</th> -->
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Room End-->
            </div><!--col-lg-10 div End-->
        </div><!--row div End-->
    </div><!--Container Fluid div End-->

    <?php require_once('inc/scripts.php'); ?>
    <script src="js/users.js"></script>
</body>

</html>
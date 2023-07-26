<?php
require('inc/essential.php');
require('inc/db_config.php');
require('inc/links.php');

adminLogIN();
//update message
if (isset($_GET['seen'])) {
    $form_data = filteration($_GET);

    if ($form_data['seen'] == 'all') {
        $q = "UPDATE `contact_us` SET `seen`=?";
        $values = [1];

        if (update($q, $values, 'i')) {
            echo "<script>alert('Message All Read Successfully.');
            window.location.href='user_queries.php';
            </script>";
        } else {
            echo "<script>alert('Message Not Read!');</script>";
        }
    } else {
        $q = "UPDATE `contact_us` SET `seen`=?  WHERE `sr_no`=?";
        $values = [1, $form_data['seen']];

        if (update($q, $values, 'ii')) {
            echo "<script>alert('Message Read Successfully.');
            window.location.href='user_queries.php';
            </script>";
        } else {
            echo "<script>alert('Message Not Read!');</script>";
        }
    }
}
//delete message
if (isset($_GET['del'])) {
    $form_data = filteration($_GET);

    if ($form_data['del'] == 'all') {
        $q = "DELETE FROM `contact_us`";
        if (mysqli_query($conn,$q)) {
            echo "<script>alert('Message All Deleted Successfully.');
            window.location.href='user_queries.php';</script>";
        } else {
            echo "<script>alert('Message Not Delete!');</script>";
        }
    } else {
        $q = "DELETE FROM `contact_us` WHERE `sr_no`=?";
        $values = [$form_data['del']];

        if (delete($q, $values, 'i')) {
            echo "<script>alert('Message Deleted Successfully.');
            window.location.href='user_queries.php';</script>";
        } else {
            echo "<script>alert('Message Not Delete!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -User Queries</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">User Queries</h3>
                <!--User Queries-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href='?seen=all' class='btn btn-sm rounded-pill btn-primary text-nowrap'><i class="bi bi-check2-all"></i> Mark all Read</a>
                            <a href='?del=all' class='btn btn-sm rounded-pill btn-danger text-nowrap'><i class="bi bi-trash"></i> Delete All</a>
                        </div>
                        <div class="table-responsive-md" style="height: 450px;overflow-y:scroll;">
                            <table class="table table-striped table-hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `contact_us` ORDER BY `sr_no` DESC";
                                    $data = mysqli_query($conn, $q);
                                    $sl_no = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $seen = "";
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary text-nowrap'>Mark as Read</a>";
                                        }
                                        $seen
                                            .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                        echo <<< query
                                        <tr>
                                            <td>$sl_no</td>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[subject]</td>
                                            <td>$row[message]</td>
                                            <td>$row[date]</td>
                                            <td>$seen</td>

                                        </tr>
                                      query;

                                        $sl_no++;
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="row" id="carousel-data">
                        </div> -->
                    </div>
                </div>
                <!--User Queries End-->
            </div><!--col-lg-10 div End-->
        </div><!--row div End-->
    </div><!--Container Fluid div End-->

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
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
        if (mysqli_query($conn, $q)) {
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
    <title>Admin Panel -Features & Facilities</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Features & Facilities</h3>
                <!--Features-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#features">
                                <i class="bi bi-plus-square"></i>&nbsp;Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 450px;overflow-y:scroll;">
                            <table class="table table-striped table-hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="row" id="carousel-data">
                        </div> -->
                    </div>
                </div>
                <!--Features-->
                <!--Falilities-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Falilities</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#facilities">
                                <i class="bi bi-plus-square"></i>&nbsp;Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 450px;overflow-y:scroll;">
                            <table class="table table-striped table-hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">

                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="row" id="carousel-data">
                        </div> -->
                    </div>
                </div>
            </div><!--col-lg-10 div End-->
        </div><!--row div End-->
    </div><!--Container Fluid div End-->

    <!--Features Modal Form-->
    <div class="modal fade" id="features" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="features_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Features</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="features_name" class="form-control shadow-none" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label fw-bold">Picture</label>
                            <input type="file" name="member_picture" id="member_picture_input"
                                class="form-control shadow-none" accept=".jpg,.jpeg,.png,.webp" required>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Features Modal End-->
    <!--Facilities Modal Form-->
    <div class="modal fade" id="facilities" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Add Facilities</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="file" name="facility_icon" class="form-control shadow-none" accept=".svg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea  name="facility_description"  class="form-control shadow-none" rows="3" required style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Facilities Modal End-->

    <?php require_once('inc/scripts.php'); ?>
    <script src="js/features_facilities.js"></script>
</body>

</html>
<?php
require('inc/essential.php');
require('inc/links.php');

adminLogIN();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Carousel</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Carousel</h3>
                <!--Carousel Image-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Image</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#carouselImage">
                                <i class="bi bi-plus-square"></i>&nbsp;Add
                            </button>
                        </div>
                        <!--Show Carousel Images-->
                        <div class="row" id="carousel-data">
                            <!--Here Show all the data fetch from 'management_team' table-->
                        </div>
                        <!--Show Carousel Images End-->
                    </div>
                </div>
                <div class="modal fade" id="carouselImage" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_image_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add Image</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="member_name" id="member_name_input" class="form-control shadow-none" required>
                                    </div> -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="carousel_image" id="carousel_image_input" class="form-control shadow-none" accept=".jpg,.jpeg,.png,.webp" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" onclick="carousel_image.value=''">Cancel</button>
                                    <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Carousel Image End-->
            </div><!--col-lg-10 div End-->
        </div><!--row div End-->
    </div><!--Container Fluid div End-->
    <!--Here 'settings.js' file contains all the ajax functions-->
    <script src="js/carousel.js"></script>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
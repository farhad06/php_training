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
    <title>Admin Panel-Settings</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Settings</h3>
                <!-- General Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#generalSetting">
                                <i class="bi bi-pencil-square"></i>Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>
                <!--General setting Form-->
                <div class="modal fade" id="generalSetting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_settings_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_input" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site About</label>
                                        <textarea class="form-control shadow-none" name="site_about" rows="6" id="site_about_input" style="resize: none;" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" onclick="site_title.value=general_data.site_title,site_about.value=general_data.site_about">Cancel</button>
                                    <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Shut Down Settings-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input class="form-check-input shadow-none" type="checkbox" id="shutdown-btn" onchange="update_shutdown(this.value)">
                                </form>
                            </div>
                        </div>
                        <p class="card-text" style="color:red;">No customer can't be book hotel when Shutdown Mode is turned on.</p>
                    </div>
                </div>
                <!--Contact US Settings-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Contact Settings</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#contactSetting">
                                <i class="bi bi-pencil-square"></i>Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone</h6>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-inbound-fill"></i>
                                        <span id="phone_no"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Mail</h6>
                                    <p class="card-text">
                                        <i class="bi bi-envelope-paper-fill"></i>
                                        <span id="mail"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <!-- <p class="card-text" id="social_links"></p> -->
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span id="facebook"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="instagram"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-twitter me-1"></i>
                                        <span id="twitter"></span>
                                    </p>

                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iframe</h6>
                                    <iframe loading="lazy" class="p-2 border w-100" id="iframe"></iframe>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact Details Form-->
                <div class="modal fade" id="contactSetting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contact_details_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Contact Details</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address</label>
                                                    <textarea type="text" name="address" id="address_input" class="form-control shadow-none" required rows="1" style="resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Contact US</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-geo-fill"></i></span>
                                                        <input type="text" name="gmap" id="gmap_input" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <!-- <label class="form-label">Phone (With Country Code)</label> -->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-inbound-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="phone" id="phone_input" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <!-- <label class="form-label">Mail</label> -->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><!--<i class="bi bi-envelope-at-fill"></i>-->
                                                            <i class="bi bi-envelope-paper-fill"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="mail" id="mail_input" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Media Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="facebook" id="facebook_input" required>
                                                    </div>
                                                    <!--Here I change twitter as instagram and instagram as twitter because some code change and later I see that code is changed. I can not change this because I want to avoid change. So there name=instagram&id=instagram_input for twitter and vice versa  -->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="instagram" id="instagram_input" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" class="form-control shadow-none" name="twitter" id="twitter_input" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iframe</label>
                                                    <textarea type="text" name="iframe" id="iframe_input" class="form-control shadow-none" required rows="3" style="resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" onclick="contact_input_data_value(contact_data)">Cancel</button>
                                    <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Management Team-->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">Management Team</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#managementTeam">
                                <i class="bi bi-plus-square"></i>&nbsp;Add
                            </button>
                        </div>
                        <!--Show Management Team Images-->
                        <div class="row" id="team-data">
                            <!--Here Show all the data fetch from 'management_team' table-->
                        </div>
                        <!--Show Management Team Images End-->
                    </div>
                </div>
                <div class="modal fade" id="managementTeam" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="management_team_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Management Team</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="member_name" id="member_name_input" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="member_picture" id="member_picture_input" class="form-control shadow-none" accept=".jpg,.jpeg,.png,.webp" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" onclick="member_name.value='',member_picture.value=''">Cancel</button>
                                    <button type="submit" class="btn text-white custom-bg shadow-none" onclick="">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Management Team End-->
            </div><!--col-lg-10 div End-->
        </div><!--row div End-->
    </div><!--Container Fluid div End-->
    <!--Here 'settings.js' file contains all the ajax functions-->
    <script src="js/setting.js"></script>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
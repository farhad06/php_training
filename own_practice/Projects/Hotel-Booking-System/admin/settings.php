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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#generalSetting">
                                <i class="bi bi-pencil-square"></i>Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold" >Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text"  id="site_about"></p>
                    </div>
                </div>
                <div class="modal fade" id="generalSetting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_input"  class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" >Site About</label>
                                        <textarea class="form-control shadow-none" name="site_about" rows="6" id="site_about_input" style="resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" id="site_about">Cancel</button>
                                    <button type="button" class="btn text-white custom-bg shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let general_data;
        function get_general_data(){
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');

            let site_title_input = document.getElementById('site_title_input');
            let site_about_input = document.getElementById('site_about_input');
            
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/setting_crud.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

            xhr.onload=function(){
                general_data=JSON.parse(this.responseText);
                //console.log(general_data);
                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                site_title_input.value = general_data.site_title;
                site_about_input.value = general_data.site_about;

            }
            xhr.send('get_general_data');



        }
        window.onload = function () {
            get_general_data();
        }

    /* $(document).ready(function(){
        console.log("Page Ready");
        $.ajax({
            url:"ajax/setting_crud.php",
            type:"POST",
            success:function(data){
                console.log(data);
                g_data=JSON.parse(data);
                console.log(g_data);

                $('#site_title').text(g_data.site_title);
                $('#site_about').text(g_data.site_about);

            }
        });
    });*/
    </script>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -PROFILE</title>
    <?php require('inc/links.php'); ?>
    <style>
        .h-line {
            width: 150px;
            margin: 0 auto;
            height: 1.7px;

        }

        /* .pop:hover {
             border-top-color: var(--teal) !important; 
            border-top-color: #279e8c !important;
            transform: scale(1.03);
            transition: all 0.3s;
        } */
    </style>
</head>

<body class="bg-light">

    <?php require_once('inc/header.php'); ?>
    <?php
    if (!(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true)) {
        redirect('index.php');
    }
    $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['USER_ID']], 's');
    if (mysqli_num_rows($u_exist) == 0) {
        redirect('index.php');
    }
    $u_fetch = mysqli_fetch_assoc($u_exist);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold h-font text-center">Profile</h2>
                <div class="h-line bg-dark"></div>
                <div style="font-size: 15px;">
                    <a href="index.php" class="text-decoration-none text-secondary">Home</a>
                    <span> > </span>
                    <a href="rooms.php" class="text-decoration-none text-secondary">ROOMS</a>
                </div>
            </div>
            <div class="col-12 mb-4 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form id="info_form">
                        <h5 class="mb-3 fw-bold">Basic Information</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="<?php echo $u_fetch['name']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phone" value="<?php echo $u_fetch['phone']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control shadow-none" value="<?php echo $u_fetch['dob']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pin Code</label>
                                <input type="number" name="pin" value="<?php echo $u_fetch['pin']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-8 mb-4">
                                <label class="form-label">Address</label>
                                <textarea type="text" name="address" rows="1" style="resize: none;" class="form-control shadow-none" required><?php echo $u_fetch['address']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn text-white custom-bg shadow-none">Save Changes</button>
                    </form>

                </div>
            </div>
            <div class="col-4 mb-4 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form id="profile_picture_form">
                        <h5 class="mb-3 fw-bold">Profile Picture</h5>
                        <img src="<?php echo USERS_IMAGE_PATH . $u_fetch['profile'] ?>" class="mb-3" width="100%" height="300px">
                        <label class="form-label">New Picture</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.webp" name="new_profile_picture" class="form-control shadow-none mb-3" required>
                        <button type="submit" class="btn text-white custom-bg shadow-none mb-1">Save Changes</button>
                    </form>

                </div>
            </div>
            <div class="col-8 mb-4 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form id="change_password_form">
                        <h5 class="mb-3 fw-bold">Change Password</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none" name="pass" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control shadow-none" name="cpass" required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-white custom-bg shadow-none mb-1">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        let info_form = document.getElementById('info_form');

        info_form.addEventListener('submit', function(e) {
            e.preventDefault();
            save_info();
        });

        function save_info() {
            let data = new FormData();

            data.append('save_info', '');
            data.append('name', info_form.elements['name'].value);
            data.append('phone', info_form.elements['phone'].value);
            data.append('dob', info_form.elements['dob'].value);
            data.append('pin', info_form.elements['pin'].value);
            data.append('address', info_form.elements['address'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'phone_already') {
                    alert_msg('error', 'Phone Number alredy exists.')
                } else if (this.responseText == 1) {
                    alert_msg('success', 'Profile Updated');
                    location.reload(true); //reload the current page
                } else if (this.responseText == 0) {
                    alert_msg('success', 'No Changes Made.')
                }


            }
            xhr.send(data);


        }
        let profile_picture_form = document.getElementById('profile_picture_form');

        profile_picture_form.addEventListener('submit', function(e) {
            e.preventDefault();
            update_profile_picture();
        });

        function update_profile_picture() {
            let data = new FormData();

            data.append('update_profile_picture', '');
            data.append('profile', profile_picture_form.elements['new_profile_picture'].files[0]);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {

                if (this.responseText == 'inv_img') {
                    alert_msg('error', 'Only JPG JPEG and PNG format allowed.');
                } else if (this.responseText == 'inv_size') {
                    alert_msg('error', 'Please Upload File Less than 2mb.');
                } else if (this.responseText == 'upd_failed') {
                    alert_msg('error', 'Image Upload Failded');
                } else if (this.responseText == 'insert_failed') {
                    alert_msg('error', 'Insertion Failed');
                } else {
                    alert_msg('success', 'You successfully Updated Your Profile Picture.');
                    location.reload(true);


                }

            }
            xhr.send(data);
        }

        let change_password_form = document.getElementById('change_password_form');

        change_password_form.addEventListener('submit', function(e) {
            e.preventDefault();
            update_password();
        });

        function update_password() {
            let data = new FormData();

            data.append('update_password', '');
            data.append('pass', change_password_form.elements['pass'].value);
            data.append('cpass', change_password_form.elements['cpass'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/profile.php", true);

            xhr.onload = function() {
                if (this.responseText == 'miss_match') {
                    alert_msg('error', 'Password and Confirm Does not matched.')
                } else if (this.responseText == 0) {
                    alert_msg('error', 'Password Updated Falied.');
                    //location.reload(true); //reload the current page
                } else  {
                    alert_msg('success', 'Password Changed Successfully.');
                    change_password_form.reset();
                }


            }
            xhr.send(data);

        }
    </script>
    <?php require_once('inc/footer.php'); ?>
</body>

</html>
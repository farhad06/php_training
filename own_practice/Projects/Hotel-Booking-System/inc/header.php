    <?php
    require('admin/inc/db_config.php');
    require('admin/inc/essential.php');

    $setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $setting_r = mysqli_fetch_assoc(select($setting_q, $values, 'i'));

    if ($setting_r['shutdown']) {
        echo <<< alertbar
    <div class='bg-danger text-center text-light p-2 fw-bold'>
        <i class="bi bi-exclamation-triangle"></i>
        Bookings are Temporary Closed
        <i class="bi bi-exclamation-triangle"></i>
     </div>
    alertbar;
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top" id="nav-bar">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Taj Bengal</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="rooms.php
                        ">Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    //session_destroy();
                    if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true) {
                        $path = USERS_IMAGE_PATH;
                        echo <<<dropdown
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                           Welcome Mr. $_SESSION[USER_NAME]
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-lg-end">
                                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                            <li><a class="dropdown-item" href="booking.php">Booking</a></li>
                                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                        </ul>
                                    </div>

                            dropdown;
                    } else {
                        echo <<< button
                                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login
                                </button>
                                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#registrationModal">
                                Register
                               </button>
                            button;
                    }

                    ?>
                    <!-- Button trigger modal -->
                </div>
            </div>
        </div>
    </nav>
    <!-- login modal start -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login_form_id">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email_log" id="email_log_inp" class="form-control shadow-none">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass_log" id="pass_log_inp" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="javascript:void(0)" class="text-decoration-none text-secondary">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login modal end -->
    <!-- Register Modal Start -->
    <div class="modal fade" id="registrationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register_form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class=" bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your Details Should be Match with your's ID.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Picture</label>
                                    <input type="file" accept=".jpg,.jpeg,.png,.webp" name="profile" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" name="address" rows="1" required style="resize: none;"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pin</label>
                                    <input type="number" class="form-control shadow-none" name="pin" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control shadow-none" name="dob" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none" name="pass" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-none" name="cpass" required>
                                </div>
                                <div class="text-center my-1">
                                    <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Modal End -->
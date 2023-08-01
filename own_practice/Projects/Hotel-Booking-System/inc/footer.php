    <?php
    #select all data from contact details table
    $contact_q = "SELECT * FROM `contact_details` WHERE sr_no=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));

    #select all data from setting table
    $about_q = "SELECT * FROM `settings` WHERE sr_no=?";
    $values = [1];
    $about_r = mysqli_fetch_assoc(select($about_q, $values, 'i'));
    ?>
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-4"> <?php echo $about_r['site_title']; ?></h3>
                <p style="text-align: justify;">
                    <?php echo $about_r['site_about']; ?>
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
                <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Room</a><br>
                <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
                <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Follow US</h5>
                <a href="<?php echo  $contact_r['tw']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark" target="_blank">
                    <i class="bi bi-twitter me-1"></i>&nbsp;Twitter

                </a> <br>
                <a href="<?php echo  $contact_r['fb']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark" target="_blank">
                    <i class="bi bi-facebook me-1"></i>&nbsp;Facebook

                </a> <br>
                <a href="<?php echo  $contact_r['insta']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark" target="_blank">
                    <i class="bi bi-instagram me-1"></i>&nbsp;Instagram

                </a><br>
                <a href="javascript:void(0);" class="d-inline-block  text-decoration-none text-dark" target="_blank">
                    <i class="bi bi-youtube me-1"></i>&nbsp;Youtube

                </a> <br>
            </div>
        </div>

    </div>
    <!--Footer End-->
    <h6 class="text-center bg-dark text-white p-3 m-0">Design and Developed By Farhad &copy; reserved</h6>
    <!-- Bootstrape 5 JS Bundal CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        //this function is used for active links for current page
        function setActive() {
            let navbar = document.getElementById('nav-bar');
            let a_tag = navbar.getElementsByTagName('a');

            for (i = 0; i < a_tag.length; i++) {
                let file = a_tag[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if (document.location.href.indexOf(file_name) >= 0) {
                    a_tag[i].classList.add('active');
                }
            }

        }
        setActive();

        function alert_msg(type, msg, position = 'body') {
            let bs_class = (type == 'success') ? "alert-success" : "alert-danger";
            let element = document.createElement('div');
            element.innerHTML = `
                <div class="alert ${bs_class} alert-dismissible fade show " role="alert" id='response_msg'>
                    <strong>${msg}</strong>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
        `;

            if (position == 'body') {
                document.body.append(element);
                element.classList.add('custom-alert');
            } else {
                document.getElementById(position).appendChild(element);
            }

            setTimeout(removeAlert, 2000);

        }

        function removeAlert() {
            document.getElementsByClassName('alert')[0].remove();
        }

        let register_form = document.getElementById('register_form');

        register_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_user()

        });

        function add_user() {
            let data = new FormData();

            data.append('name', register_form.elements['name'].value);
            data.append('email', register_form.elements['email'].value);
            data.append('phone', register_form.elements['phone'].value);
            data.append('profile', register_form.elements['profile'].files[0]);
            data.append('address', register_form.elements['address'].value);
            data.append('pin', register_form.elements['pin'].value);
            data.append('dob', register_form.elements['dob'].value);
            data.append('pass', register_form.elements['pass'].value);
            data.append('cpass', register_form.elements['cpass'].value);
            data.append('add_user', '');


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);

            xhr.onload = function() {
                var myModal = document.getElementById('registrationModal');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 'password_missmatch') {
                    alert_msg('error', 'Password Mismatched!');
                } else if (this.responseText == 'email_alredy') {
                    alert_msg('error', 'Email Already exists');
                } else if (this.responseText == 'phone_already') {
                    alert_msg('error', 'Phone Number already exists');
                } else if (this.responseText == 'inv_img') {
                    alert_msg('error', 'Only JPG JPEG and PNG format allowed.');
                } else if (this.responseText == 'inv_size') {
                    alert_msg('error', 'Please Upload File Less than 2mb.');
                } else if (this.responseText == 'upd_failed') {
                    alert_msg('error', 'Image Upload Failded');
                } else if (this.responseText == 'insert_failed') {
                    alert_msg('error', 'Insertion Failed');
                } else {
                    alert_msg('success', 'You successfully registered.');
                    register_form.reset();


                }

            }
            xhr.send(data);
        }

        let login_form_id = document.getElementById('login_form_id');

        login_form_id.addEventListener('submit', function(e) {
            e.preventDefault();
            user_login();
        });

        function user_login() {
            let data = new FormData();

            data.append('email_log', login_form_id.elements['email_log'].value);
            data.append('pass_log', login_form_id.elements['pass_log'].value);
            data.append('user_login', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                var myModal = document.getElementById('loginModal');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                //console.log(this.responseText);
                if (this.responseText == 'inv_email_mob') {
                    alert_msg('error', 'Invalid Email or Password!');
                } else if (this.responseText == 'inactive') {
                    alert_msg('error', 'Account Suspendent ! Contact Admin');
                } else if (this.responseText == 'inv_pass') {
                    alert_msg('error', 'Invalid Password.');
                } else {
                    window.location = window.location.pathname;
                    //login_form_id.reset();
                }

            }
            //xhr.send('user_login=' + email_log + '&pass_log=' + email_log);
            xhr.send(data);


        }

        function ckeckLogInForBooking(status,r_id){
            if(status){
                window.location.href = "confirm_booking.php?id="+r_id;
            }else{
                alert_msg('error','Please Login to book room.')
            }
        }
    </script>
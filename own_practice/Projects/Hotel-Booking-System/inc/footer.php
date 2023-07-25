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

            for(i=0;i<a_tag.length;i++){
                let file = a_tag[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if(document.location.href.indexOf(file_name)>=0){
                    a_tag[i].classList.add('active');
                }
            }

        }
        setActive();
    </script>
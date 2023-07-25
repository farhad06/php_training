<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -HOME</title>
    <?php require('inc/links.php'); ?>
    <!-- Swiper JS CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!--Link External Connon Css File-->
    <style>
        .avibility-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;

        }
    </style>
</head>

<body class="bg-light">

    <?php require_once('inc/header.php'); ?>
    <!-- Swiper Start -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                $carousel_img = selectAll('carousel');
                //print_r($about_r);
                while ($row = mysqli_fetch_assoc($carousel_img)) {
                    $path = CAROUSEL_IMAGE_PATH;
                    echo <<< data
                        <div class="swiper-slide">
                            <img src="$path$row[picture]" class="w-100 d-block" />
                        </div>
                    data;
                }
                ?>
                <!-- <div class="swiper-slide">
                    <img src="images/carousel/1.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/2.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/3.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/4.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/5.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/6.png" class="w-100 d-block" />
                </div> -->

            </div>
        </div>
    </div>
    <!-- Swiper Start -->
    <!-- Booking Avibility Form start-->
    <div class="container avibility-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Aviability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-In</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Booking Avibility Form  end-->

    <!-- our rooms start-->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Our Rooms</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="images/rooms/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Simple Room</h5>
                        <h6 class="mb-4"> <span>&#8377;</span> 200 per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Heater
                            </span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adult
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Children
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="images/rooms/2.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Simple Room</h5>
                        <h6 class="mb-4"> <span>&#8377;</span> 200 per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Heater
                            </span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adult
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Children
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width:350px;margin: auto;">
                    <img src="images/rooms/3.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Simple Room</h5>
                        <h6 class="mb-4"> <span>&#8377;</span> 200 per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Heater
                            </span>
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adult
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Children
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark shadow-none fw-bold rounded-0">More Rooms >>></a>

            </div>
        </div>
    </div>
    <!-- our rooms end-->
    <!-- our facalities start-->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Our Facilities</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="images/facilities/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="images/facilities/ac.svg" width="80px">
                <h5 class="mt-3">AC</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="images/facilities/room-hiter.svg" width="80px">
                <h5 class="mt-3">Room Hiter</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="images/facilities/tv.svg" width="80px">
                <h5 class="mt-3">TV</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
                <img src="images/facilities/IMG_96423.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="" class="btn btn-sm btn-outline-dark shadow-none fw-bold rounded-0">More Facilities >>></a>

        </div>
    </div>

    <!-- our facalities end-->

    <!--Our Testomonials Start-->
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Testimonials</h2>
    <div class="container">
        <div class="swiper swiper-testiminials">
            <div class="swiper-wrapper md-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/facilities/wifi.svg" width="30px">
                        <h6 class="m-0 ms-3">Random User-1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, ea? At natus labore ipsum necessitatibus placeat id deserunt illo nihil!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/facilities/wifi.svg" width="30px">
                        <h6 class="m-0 ms-3">Random User-1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, ea? At natus labore ipsum necessitatibus
                        placeat id deserunt illo nihil!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/facilities/wifi.svg" width="30px">
                        <h6 class="m-0 ms-3">Random User-1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, ea? At natus labore ipsum necessitatibus
                        placeat id deserunt illo nihil!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="col-lg-12 text-center mt-5">
        <a href="" class="btn btn-sm btn-outline-dark shadow-none fw-bold rounded-0">Know More >>></a>

    </div>

    <!--Our Testomonials End-->

    <!--Reach US Start-->
    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE sr_no=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    // print("<pre>");
    // print_r($contact_r);
    ?>
    <h2 class="mt-5 mb-4 pt-4 text-center fw-bold h-font">Reach US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe height="320px" class="w-100 rounded" src="<?php echo  $contact_r['iframe']; ?>" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 mb-4 rounded">
                    <h5>Call US</h5>
                    <a href="tel:+<?php echo  $contact_r['phone']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-telephone-inbound-fill"></i></span>&nbsp;+<?php echo  $contact_r['phone']; ?></a>
                    <h5>Mail US</h5>
                    <a href="mailto:<?php echo  $contact_r['mail']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-envelope-paper-fill"></i></span> &nbsp;<?php echo  $contact_r['mail']; ?></a>
                </div>
                <div class="bg-white p-4 mb-4 rounded">
                    <h5>Follow US</h5>
                    <a href="<?php echo  $contact_r['tw']; ?>" class="d-inline-block mb-3" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i>&nbsp;Twitter
                        </span>
                    </a> <br>
                    <a href="<?php echo  $contact_r['fb']; ?>" class="d-inline-block mb-3" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>&nbsp;Facebook
                        </span>
                    </a> <br>
                    <a href="<?php echo  $contact_r['insta']; ?>" class="d-inline-block" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>&nbsp;Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Reach US end-->

    <!--Footer Start-->
    <?php require_once('inc/footer.php'); ?>
    <!-- Swiper-JS JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false
            }
        });
        var swiper = new Swiper(".swiper-testiminials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
                //clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }

            }
        });
    </script>

</body>

</html>
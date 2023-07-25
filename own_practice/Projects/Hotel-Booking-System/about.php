<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -ABOUT US</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
    <style>
        .h-line {
            width: 150px;
            margin: 0 auto;
            height: 1.7px;

        }

        .box {
            border-top-color: #2ec1ac !important;
        }

        .pop:hover {
            /* border-top-color: var(--teal) !important; */
            /* border-top-color: #279e8c !important; */
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>

<body class="bg-light">

    <?php require_once('inc/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About US</h2>
        <div class="h-line bg-dark"></div>
        <p class="mt-3 text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, esse? Debitis aliquid officiis ipsum. Repellat expedita odio laboriosam <br> molestiae rem possimus minima magni ab error,aliquam porro ex soluta totam impedit et praesentium voluptas nisi voluptates dolor hic, est odit.
        </p>
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4">
                <h3 class="mb-3">Lorem ipsum dolor sit</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore atque minus, eveniet quos magnam ducimus.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore atque minus, eveniet quos magnam ducimus.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore atque minus, eveniet quos magnam ducimus.
                </p>
            </div>
            <div class="col-lg-6 col-md-5 mb-4">
                <img src="images/about/about.jpg" class="w-100">

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 px-4 mb-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box pop">
                    <img src="images/about/hotel.svg" width="70px">
                    <h4 class="mt-3">100+ Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 px-4 mb-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box pop">
                    <img src="images/about/customers.svg" width="70px">
                    <h4 class="mt-3">300+ Customer</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 px-4 mb-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box pop">
                    <img src="images/about/rating.svg" width="70px">
                    <h4 class="mt-3">160+ Rating</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 px-4 mb-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box pop">
                    <img src="images/about/staff.svg" width="70px">
                    <h4 class="mt-3">250+ Staff</h4>
                </div>
            </div>
        </div>
    </div>
    <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mt-5">
            <?php
            $about_r = selectAll('member_details');
            //print_r($about_r);
            while ($row = mysqli_fetch_assoc($about_r)) {
                $path= ABOUT_IMAGE_PATH;
                echo <<< data
                        <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                            <img src="$path$row[picture]" class="w-100">
                            <h5 class="mt-2">$row[name]</h5>
                        </div>
                    data;
            }
            ?>
                <!-- <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2">Random User</h5>
                </div>
                <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2 mb-2">Random User</h5>
                </div>
                <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2">Random User</h5>
                </div>
                <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2">Random User</h5>
                </div>
                <div class="swiper-slide bg-white text-center rounded overflow-hidden">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2">Random User</h5>
                </div> -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

    <?php require_once('inc/footer.php'); ?>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
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
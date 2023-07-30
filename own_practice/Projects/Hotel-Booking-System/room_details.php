<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -ROOM</title>
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
    if (!isset($_REQUEST['id'])) {
        redirect('rooms.php');
    }

    $data = filteration($_REQUEST);
    $room_res = select("SELECT * FROM `room` WHERE `id`=? AND `status`=? AND `remove`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold h-font text-center"><?php echo $room_data['name']; ?></h2>
                <div class="h-line bg-dark"></div>
                <div style="font-size: 15px;">
                    <a href="index.php" class="text-decoration-none text-secondary">Home</a>
                    <span> > </span>
                    <a href="rooms.php" class="text-decoration-none text-secondary">ROOMS</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 rounded">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $room_img = ROOM_IMAGE_PATH . "9.jpg";
                        $image_q = mysqli_query($conn, "SELECT * FROM `rooms_image` WHERE `room_id`='$room_data[id]'");
                        if (mysqli_num_rows($image_q) > 0) {
                            $active_class = 'active';
                            while ($image_res = mysqli_fetch_assoc($image_q)) {
                                $room_img = ROOM_IMAGE_PATH . $image_res['image'];
                                echo <<<image
                                            <div class="carousel-item $active_class">
                                                <img src="$room_img" class="d-block w-100">
                                            </div>
                                        image;
                                $active_class = "";
                            }
                        } else {
                            echo <<<image
                                        <div class="carousel-item active">
                                            <img src="$room_img" class="d-block w-100">
                                         </div>
                                      image;
                        }

                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <?php
                        ### Price Section ######
                        echo <<< price
                            <h4> <span>&#8377;</span> $room_data[price] per night</h4>
                        price;
                        ### Rating Section ######
                        echo <<< rating
                         <div class="rating mb-3">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        rating;
                        ### Room Features Section ######
                        $room_fea = mysqli_query($conn, "SELECT f.name FROM `features`  f INNER JOIN  `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id='$room_data[id]' ");

                        $features_data = "";
                        while ($fea_row = mysqli_fetch_assoc($room_fea)) {
                            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fea_row[name]</span>";
                        }

                        echo <<<features
                                <div class="features mb-3">
                                    <h6 class="mb-1">Features</h6>
                                    $features_data
                                </div>
                        features;
                        ### Room Facilities Section #######
                        $room_faci = mysqli_query($conn, "SELECT f.name FROM `facilities`  f INNER JOIN  `room_facilities` rfaci ON f.id = rfaci.facilities_id WHERE rfaci.room_id='$room_data[id]'");

                        $facilities_data = "";
                        while ($faci_row = mysqli_fetch_assoc($room_faci)) {
                            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$faci_row[name]</span>";
                        }

                        echo <<<facilities
                                <div class="facilities mb-3">
                                    <h6 class="mb-1">Facilities</h6>
                                    $facilities_data   
                                </div>
                        facilities;
                        ### Room Guests Section #######
                        echo <<<guests
                            <div class="guests mb-3">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[adult] Adult
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Children
                                    </span>
                                </div>
                        guests;
                        ### Room Area Section #######
                        echo <<<area
                             <div class="guests mb-3">
                                    <h6 class="mb-1">Area</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[area] Sq.ft
                                    </span>
                                </div>
                        area;
                        ### Room Quentity Section #######
                        echo <<<quantity
                             <div class="guests mb-3">
                                    <h6 class="mb-1">Quantity</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[quantity]
                                    </span>
                                </div>
                        quantity;
                        ### Book button
                        $book_btn = "";
                        if (!$setting_r['shutdown']) {
                            $book_btn = "<a href='' class='btn  w-100 text-white custom-bg shadow-none mb-1'>Book Now</a>";
                        }
                        echo $book_btn;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 px-4 mt-4">
                <div class="mb-5">
                    <h5>Description</h5>
                    <p>
                        <?php echo $room_data['description']; ?>
                    </p>
                </div>
                <div>
                    <h5 class="mb-3">Reviews & Rating</h5>
                    <div>
                        <div class="profile d-flex align-items-center mb-2">
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
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php require_once('inc/footer.php'); ?>
</body>

</html>
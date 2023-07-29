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
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filter</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3" style="font-size: 18px;">Check Avaibility</h5>
                                <label class="form-label ">Check-In</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-Out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Facility One</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Facility Two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Facility Three</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label ">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label ">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-12 px-4 ">
                <?php 
                $room_res=select("SELECT * FROM `room` WHERE `status`=? AND `remove`=?",[1,0],'ii');
                // print('<pre>');
                // print_r($room_res);
                while($room_data=mysqli_fetch_assoc($room_res)){

                    ############################################################################
                    //get features of room
                    $room_fea=mysqli_query($conn, "SELECT f.name FROM `features`  f INNER JOIN  `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id='$room_data[id]' ");

                    $features_data="";
                    while($fea_row=mysqli_fetch_assoc($room_fea)){
                        $features_data.= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                    $fea_row[name] </span>";
                    }
                    //echo $features_data;
                    ##################################################################################

                    //get facilities of room
                    $room_faci = mysqli_query($conn, "SELECT f.name FROM `facilities`  f INNER JOIN  `room_facilities` rfaci ON f.id = rfaci.facilities_id WHERE rfaci.room_id='$room_data[id]'");

                    $facilities_data = "";
                    while ($faci_row = mysqli_fetch_assoc($room_faci)) {
                        $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$faci_row[name]</span>";
                    }
                    //echo $facilities_data;
                    ##################################################################################
                    //get thumbnil image 
                    $rooms_thumb = ROOM_IMAGE_PATH."9.jpg";
                    $thumb_q = mysqli_query($conn, "SELECT * FROM `rooms_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");
                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res=mysqli_fetch_assoc($thumb_q);
                        $rooms_thumb=ROOM_IMAGE_PATH.$thumb_res['image'];
                    }
                    ####################################################################################
                    //print Room card
                    echo <<< data
                            <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="$rooms_thumb" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3">$room_data[name]</h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                        
                                    </div>
                                    <div class="guests">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                             $room_data[adult] Adult
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                             $room_data[children] Children
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6 class="mb-4"> <span>&#8377;</span> $room_data[price] per night</h6>
                                    <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                                </div>
                            </div>
                        </div>
                    data;

                }
                
                
                
                ?>
                
                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room</h5>
                            <div class="features mb-3">
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
                            <div class="facilities mb-3">
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
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adult
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Children
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4"> <span>&#8377;</span> 200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room</h5>
                            <div class="features mb-3">
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
                            <div class="facilities mb-3">
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
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adult
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Children
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4"> <span>&#8377;</span> 200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <?php require_once('inc/footer.php'); ?>
</body>

</html>
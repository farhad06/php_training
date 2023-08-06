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

    <?php
    require_once('inc/header.php');
    $checkin_default = '';
    $checkout_default = '';
    $adult_default = '';
    $children_default = '';
    if (isset($_GET['check_avalibality'])) {
        $form_data = filteration($_GET);
        $checkin_default = $form_data['checkin'];
        $checkout_default = $form_data['checkout'];
        $adult_default = $form_data['adult'];
        $children_default = $form_data['children'];
    }
    ?>
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
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3 d-flex align-items-center justify-content-between" style="font-size: 18px;">
                                    <span>Check Avaibility</span>
                                    <button class="btn btn-sm text-secondary shadow-none d-none" id="chk_ava_btn" onclick="check_ava_clear()">Reset</button>
                                </h5>
                                <label class="form-label ">Check-In</label>
                                <input type="date" value="<?php echo $checkin_default ?>" class="form-control shadow-none mb-3" id="checkin" onchange="check_ava_fil()">
                                <label class="form-label">Check-Out</label>
                                <input type="date" value="<?php echo $checkout_default ?>" class="form-control shadow-none" onchange="check_ava_fil()" id="checkout">
                            </div>
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3" style="font-size: 18px;">
                                    <span>Facilities</span>
                                    <button class="btn btn-sm text-secondary shadow-none d-none" id="faci_ava_btn" onclick="faci_clear()">Reset</button>
                                </h5>
                                <?php
                                $faci_q = selectAll('facilities');
                                while ($faci_f = mysqli_fetch_assoc($faci_q)) {
                                    echo <<< data
                                            <div class="mb-2">
                                                <input type="checkbox" onclick="fetch_room()" name="faci" value="$faci_f[id]" id="$faci_f[id]" class="form-check-input shadow-none me-1">
                                            <label class="form-check-label" for="$faci_f[id]">$faci_f[name]</label>
                                            </div>
                                        data;
                                }
                                ?>
                                <!-- <div class="mb-2">
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
                                </div> -->
                            </div>
                            <div class="border bg-light p-3 mb-3 rounded">
                                <h5 class="mb-3" style="font-size: 18px;">
                                    <span>Guests</span>
                                    <button class="btn btn-sm text-secondary shadow-none d-none" id="guest_ava_btn" onclick="guest_ava_clear()">Reset</button>
                                </h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label ">Adults</label>
                                        <input type="number" id="adults" class="form-control shadow-none" min="1" value="<?php echo $adult_default ?>" oninput="guest_filter()">
                                    </div>
                                    <div>
                                        <label class="form-label ">Children</label>
                                        <input type="number" value="<?php echo $children_default ?>" id="children" class="form-control shadow-none" min="1" oninput="guest_filter()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-12 px-4" id="room_data">



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
    <script>
        let room_data = document.getElementById('room_data');
        let checkout = document.getElementById('checkout');
        let checkin = document.getElementById('checkin');
        let chk_ava_btn = document.getElementById('chk_ava_btn');

        let guest_ava_btn = document.getElementById('guest_ava_btn');
        let children = document.getElementById('children');
        let adults = document.getElementById('adults');

        let faci_ava_btn = document.getElementById('faci_ava_btn');



        function fetch_room() {

            let check_ava = JSON.stringify({
                checkin: checkin.value,
                checkout: checkout.value
            });

            let guests = JSON.stringify({
                adults: adults.value,
                children: children.value
            });

            let faci_list = {
                "facilities": []
            };
            let get_facilities = document.querySelectorAll('[name="faci"]:checked');
            if (get_facilities.length > 0) {
                get_facilities.forEach((facility) => {
                    faci_list.facilities.push(facility.value);
                });
                faci_ava_btn.classList.remove('d-none');
            } else {
                faci_ava_btn.classList.add('d-none');

            }

            faci_list = JSON.stringify(faci_list);

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "ajax/room.php?fetch_room&check_ava=" + check_ava + "&guests=" + guests + "&faci_list=" + faci_list, true);

            xhr.onprogress = function() {
                room_data.innerHTML = `<div class="spinner-border text-info mb-3 d-block mx-auto" id="loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>`;

            }

            xhr.onload = function() {
                room_data.innerHTML = this.responseText;
            }
            xhr.send();
        }

        function check_ava_fil() {
            if (checkin.value != '' && checkout.value != '') {
                fetch_room();
                chk_ava_btn.classList.remove('d-none');
            }

        }

        function check_ava_clear() {
            checkin.value = '';
            checkout.value = '';
            fetch_room();
            chk_ava_btn.classList.add('d-none');
        }

        function guest_filter() {
            if (children.value > 0 || adults.value > 0) {
                fetch_room();
                guest_ava_btn.classList.remove('d-none');

            }

        }

        function guest_ava_clear() {
            children.value = '';
            adults.value = '';
            fetch_room();
            guest_ava_btn.classList.add('d-none');
        }

        function faci_clear() {
            let get_facilities = document.querySelectorAll('[name="faci"]:checked');
            if (get_facilities.length > 0) {
                get_facilities.forEach((facility) => {
                    facility.checked = false;
                });
                faci_ava_btn.classList.add('d-none');
            }
            fetch_room();

        }


        fetch_room();
    </script>
</body>

</html>
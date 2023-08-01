<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -CONFIRM BOOKING</title>
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
    /*
    check room id is present or not in url.
    check shutdown mode is on or off.
    check user logged in or not.
     */
    if (!isset($_REQUEST['id']) || $setting_r['shutdown'] == true) {
        redirect('rooms.php');
    } else if (!(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true)) {
        redirect('rooms.php');
    }

    $data = filteration($_REQUEST);
    $room_res = select("SELECT * FROM `room` WHERE `id`=? AND `status`=? AND `remove`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);

    $_SESSION['ROOM'] = [
        'id' => $room_data['id'],
        'name' => $room_data['name'],
        'price' => $room_data['price'],
        'payment' => null,
        'avilable' => false
    ];

    $user_res = select("SELECT * FROM `user_cred` WHERE `id`=?  LIMIT 1", [$_SESSION['USER_ID']], "i");
    $user_data = mysqli_fetch_assoc($user_res);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold h-font text-center">Confirm Booking</h2>
                <div class="h-line bg-dark"></div>
                <div style="font-size: 15px;">
                    <a href="index.php" class="text-decoration-none text-secondary">Home</a>
                    <span> > </span>
                    <a href="rooms.php" class="text-decoration-none text-secondary">Rooms</a>
                    <span> > </span>
                    <a href="" class="text-decoration-none text-secondary">Confirm</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 rounded">
                <?php

                $rooms_thumb = ROOM_IMAGE_PATH . "9.jpg";
                $thumb_q = mysqli_query($conn, "SELECT * FROM `rooms_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");
                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $rooms_thumb = ROOM_IMAGE_PATH . $thumb_res['image'];
                }

                echo <<<data
                        <div class='card p-3 shadow-sm rounded'>
                            <img src="$rooms_thumb" class="img-fluid rounded mb-3">
                            <h5 class='mb-1'>$room_data[name]</h5>
                            <h6><span>&#8377;</span> $room_data[price] per night</h6>
                        </div>

                data;
                ?>
            </div>
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="" id="booking_form">
                            <h6 class="mb-3 fw-bold text-center">Booking Details </h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control shadow-none" required value="<?php echo $user_data['name']; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control shadow-none" required value="<?php echo $user_data['phone']; ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Addess</label>
                                    <textarea type="text" name="address" class="form-control shadow-none" required rows="2" style="resize: none;"><?php echo $user_data['address']; ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check In</label>
                                    <input type="date" name="checkin" class="form-control shadow-none" required onchange="checkAvilability()">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check Out</label>
                                    <input type="date" name="checkout" class="form-control shadow-none" required onchange="checkAvilability()">
                                </div>
                                <div class="col-12">
                                    <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <h6 class="mb-3 text-danger" id="pay_info">Provide Check-In & Check-Out Date!</h6>
                                    <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php require_once('inc/footer.php'); ?>
    <script>
        let booking_form = document.getElementById('booking_form');
        let info_loader = document.getElementById('info_loader');
        let pay_info = document.getElementById('pay_info');

        function checkAvilability() {
            let checkin_val = booking_form.elements['checkin'].value;
            let checkout_val = booking_form.elements['checkout'].value;

            pay_info.classList.add('d-none');
            pay_info.classList.replace('text-dark', 'text-danger');
            info_loader.classList.remove('d-none');

            booking_form.elements['pay_now'].setAttribute('disabled', 'true');

            if (checkin_val != '' && checkout_val != '') {
                let data = new FormData();

                data.append('check_in', checkin_val);
                data.append('check_out', checkout_val);
                data.append('checkAvilability', '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/confirm_booking_crud.php", true);

                xhr.onload = function() {
                    let data = JSON.parse(this.responseText);
                    if (data.status == 'check_in_out_equal') {
                        pay_info.innerText = 'You can not check-out on same date.';
                    } else if (data.status == 'check_out_earliar') {
                        pay_info.innerText = 'Check out date is erliar than check in date.';

                    } else if (data.status == 'check_in_earliar') {
                        pay_info.innerText = 'Check in date is erliar than todays date.';
                    } else {
                        pay_info.innerHTML = "No.of.Days: " + data.days + "<br>Total Amount to pay: " + data.payment;
                        pay_info.classList.replace('text-danger', 'text-dark');
                        booking_form.elements['pay_now'].removeAttribute('disabled');

                    }
                    pay_info.classList.remove('d-none');
                    info_loader.classList.add('d-none');



                }
                xhr.send(data);
            }

        }
    </script>
</body>

</html>
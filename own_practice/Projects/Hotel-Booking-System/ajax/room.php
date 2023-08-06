<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essential.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_GET['fetch_room'])) {
    //check checkin and checkout 
    $che_ava = json_decode($_GET['check_ava'], true);
    if ($che_ava['checkin'] != '' && $che_ava['checkout']) {
        $today_date = new DateTime(date('Y-m-d'));
        $checkin_date = new DateTime($che_ava['checkin']);
        $checkout_date = new DateTime($che_ava['checkout']);

        if ($checkin_date == $checkout_date) {
            echo "<h2 class='text-center text-danger'>Check In and Out date are Equal.</h2>";
            exit;
        } else if ($checkout_date < $checkin_date) {
            echo "<h2 class='text-center text-danger'>Invalid Date</h2>";
            exit;
        } else if ($checkin_date < $today_date) {
            echo "<h2 class='text-center text-danger'>Invalid Date</h2>";
            exit;
        }
    }
    #check guest
    $guests = json_decode($_GET['guests'], true);
    $adults = ($guests['adults'] != '') ? $guests['adults'] : 0;
    $children = ($guests['children'] != '') ? $guests['children'] : 0;

    $count_rooms = 0;
    $output = "";

    $setting_q = "SELECT * FROM `settings` WHERE `sr_no`=1";
    $values = [1];
    $setting_r = mysqli_fetch_assoc(mysqli_query($conn, $setting_q));

    $room_res = select("SELECT * FROM `room` WHERE `adult`>=? AND `children`>=? AND `status`=? AND `remove`=?", [$adults, $children,1, 0], 'iiii');
    #get facility data from room.php page
    $facility_list = json_decode($_GET['faci_list'],true);
    
    while ($room_data = mysqli_fetch_assoc($room_res)) {
        $faci_count = 0;
        //get facilities of room
        $room_faci = mysqli_query($conn, "SELECT f.name,f.id FROM `facilities`  f INNER JOIN  `room_facilities` rfaci ON f.id = rfaci.facilities_id WHERE rfaci.room_id='$room_data[id]'");

        $facilities_data = "";
        while ($faci_row = mysqli_fetch_assoc($room_faci)) {
            if (in_array($faci_row['id'], $facility_list['facilities'])) {
                $faci_count++;
            }
            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$faci_row[name]</span>";
        }

        if (count($facility_list['facilities']) != $faci_count) {
            continue;
        }

        ############################################################################
        //get features of room
        $room_fea = mysqli_query($conn, "SELECT f.name FROM `features`  f INNER JOIN  `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id='$room_data[id]' ");

        $features_data = "";
        while ($fea_row = mysqli_fetch_assoc($room_fea)) {
            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fea_row[name] </span>";
        }

        ##################################################################################
        //get thumbnil image 
        $rooms_thumb = ROOM_IMAGE_PATH . "9.jpg";
        $thumb_q = mysqli_query($conn, "SELECT * FROM `rooms_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");
        if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $rooms_thumb = ROOM_IMAGE_PATH . $thumb_res['image'];
        }
        ####################################################################################
        $book_btn = "";
        if (!$setting_r['shutdown']) {
            $login = 0;
            if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true) {
                $login = 1;
            }
            $book_btn = "<button onclick='ckeckLogInForBooking($login,$room_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
        }
        //print Room card
        $output .= "
                <div class='card mb-4 border-0 shadow'>
                <div class='row g-0 p-3 align-items-center'>
                    <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                        <img src='$rooms_thumb' class='img-fluid rounded'>
                    </div>
                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                        <h5 class='mb-3'>$room_data[name]</h5>
                        <div class='features mb-3'>
                            <h6 class='mb-1'>Features</h6>
                            $features_data
                        </div>
                        <div class='facilities mb-3'>
                            <h6 class='mb-1'>Facilities</h6>
                            $facilities_data
                            
                        </div>
                        <div class='guests'>
                            <h6 class='mb-1'>Guests</h6>
                            <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                    $room_data[adult] Adult
                            </span>
                            <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                    $room_data[children] Children
                            </span>
                        </div>
                    </div>
                    <div class='col-md-2 text-center'>
                        <h6 class='mb-4'> <span>&#8377;</span> $room_data[price] per night</h6>
                        $book_btn
                        <a href='room_details.php?id=$room_data[id]' class='btn btn-sm w-100 btn-outline-dark shadow-none'>More Details</a>
                    </div>
                </div>
            </div>
        ";
        $count_rooms++;
    }
    if ($count_rooms > 0) {
        echo $output;
    } else {
        echo "<h2 class='text-center text-danger'>No Room Found</h2>";
    }
}

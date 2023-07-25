<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL TAJ -CONTACT US</title>
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
        <h2 class="fw-bold h-font text-center">Contact US</h2>
        <div class="h-line bg-dark"></div>
        <p class="mt-3 text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, esse? Debitis aliquid officiis ipsum. Repellat expedita odio laboriosam <br> molestiae rem possimus minima magni ab error,aliquam porro ex soluta totam impedit et praesentium voluptas nisi voluptates dolor hic, est odit.
        </p>
    </div>
    <div class="container">
        <?php
        $contact_q = "SELECT * FROM `contact_details` WHERE sr_no=?";
        $values = [1];
        $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'))
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 px-4 mb-5">
                <div class="bg-white rounded shadow p-4">
                    <iframe height="320px" class="w-100 rounded mb-4" src="<?php echo  $contact_r['iframe']; ?>" loading="lazy"></iframe>
                    <h5>Address</h5>
                    <a href="<?php echo  $contact_r['gmap']; ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i>&nbsp;Eco-Space , Action Area-II , New Town ,Kolkata
                    </a>
                    <h5 class="mt-4">Call US</h5>
                    <a href="tel:+<?php echo  $contact_r['phone']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-telephone-inbound-fill"></i></span>&nbsp;+<?php echo  $contact_r['phone']; ?></a>
                    <h5 class="mt-1">Mail US</h5>
                    <a href="mailto:<?php echo  $contact_r['mail']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-envelope-paper-fill"></i></span> &nbsp;<?php echo  $contact_r['mail']; ?></a>
                    <h5 class="mt-1">Follow US</h5>
                    <a href="<?php echo  $contact_r['tw']; ?>" class="d-inline-block text-dark fs-5 me-2" target="_blank">
                        <i class="bi bi-twitter me-1"></i>
                    </a>
                    <a href="<?php echo  $contact_r['fb']; ?>" class="d-inline-block text-dark fs-5 me-2" target="_blank">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="<?php echo  $contact_r['insta']; ?>" class="d-inline-block text-dark fs-5" target="_blank">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4 mb-5">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg shadow-none mt-3">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('inc/footer.php'); ?>
</body>

</html>
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
        <div class="row">
            <div class="col-lg-6 col-md-6 px-4 mb-5">
                <div class="bg-white rounded shadow p-4">
                    <iframe height="320px" class="w-100 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.79810511767!2d88.48798487421969!3d22.586653232457245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a020ac7b088374f%3A0x744b574c82e9efeb!2sEcospace%2C%20Premises%20-%2011F%2F12%2C%20Campus%20-%202B%2C%20Action%20Area%20II%2C%20Newtown%2C%20New%20Town%2C%20West%20Bengal%20700156!5e0!3m2!1sen!2sin!4v1689681175826!5m2!1sen!2sin" loading="lazy"></iframe>
                    <h5>Address</h5>
                    <a href="https://goo.gl/maps/vitxAyjqEG8aj5xF9" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i>&nbsp;Eco-Space , Action Area-II , New Town ,Kolkata
                    </a>
                    <h5 class="mt-4">Call US</h5>
                    <a href="tel:+919603879645" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-telephone-inbound-fill"></i></span>&nbsp;+91&nbsp;9603879645</a>
                    <h5 class="mt-1">Mail US</h5>
                    <a href="mailto:hoteltajkolkata@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><span><i class="bi bi-envelope-at-fill"></i></span> &nbsp;hoteltajkolkata@gmail.com</a>
                    <h5 class="mt-1">Follow US</h5>
                    <a href="" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                    </a>
                    <a href="" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                    </a> 
                    <a href="" class="d-inline-block text-dark fs-5">
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
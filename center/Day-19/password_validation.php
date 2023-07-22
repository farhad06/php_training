<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="modal-header">
            <h1>Log In Form</h1>
        </div>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="psw" id="psw" class="form-control" onkeyup="passwordPolicy()" autocomplete="off">
                <section id="passwordPolicy" style="color:red;"></section>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="c_psw" id="c_psw" class="form-control" onkeyup="matchPassword()" autocomplete="off">
                <section id="errPsw" style="color:red;"></section>
            </div>
            <div class="form-group">
                <input type="checkbox" id="showpass" onclick='showPassword()'>&nbsp;Show Password
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id='btn'>Login</button>
            </div>
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo "<div class='alert alert-danger' id='invaidMsg'>Invaid Name or Password!</div>";
        }
        if (isset($_GET['logout'])) {
            echo "<div class='alert alert-success' id='logoutMsg'>You Successfully logged out.</div>";
        }
        if (isset($_GET['auth'])) {
            echo "<div class='alert alert-warning' id='unothorize'>Unothorized access!</div>";
        }

        ?>

    </div>

    <script>
        $(document).ready(function() {
            $('#logoutMsg').fadeOut(10000);
            $('#invaidMsg').fadeOut(10000);
            $('#unothorize').fadeOut(10000);

        });

        function showPassword() {
            var x = document.getElementById('psw');
            var y = document.getElementById('c_psw');
            var check = document.getElementById('showpass');

            /*if (x.type === "password" && y.type === "password") {
                x.type = y.type = "text";

            } else {
                x.type = y.type = "password";

            }*/
            if (check.checked) {
                x.type = y.type = 'text';
            } else {
                x.type = y.type = 'password';
            }
        }

        function matchPassword() {
            var password = document.getElementById('psw').value;
            var C_password = document.getElementById('c_psw').value;

            if (password == C_password) {
                document.getElementById('btn').disabled = false;
                document.getElementById('errPsw').innerHTML = "";
                document.getElementById('c_psw').classList.remove('is-invalid');
            } else {
                document.getElementById('btn').disabled = true;
                document.getElementById('errPsw').innerHTML = "Password and Confirm Password are not matched!";
                document.getElementById('c_psw').classList.add('is-invalid');
            }

        }

        function passwordPolicy() {
            var password = document.getElementById('psw').value;
            var passRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;
            if (passRegEx.test(password)) {
                document.getElementById('passwordPolicy').innerHTML = "";
                document.getElementById('btn').disabled = false;
                document.getElementById('psw').classList.remove('is-invalid');
            } else {
                document.getElementById('passwordPolicy').innerHTML =
                    ` 
                Password must Contains atleast 
                <ul> 
                <li>One Upper Case.</li> 
                <li>One Lower Case.</li> 
                <li>One Special Char.</li>
                <li>One Digit.</li> 
                <li>Min 8 ,Max:15 Chars Long.</li> 
                </ul> 
                `;
                document.getElementById('btn').disabled = true;
                document.getElementById('psw').classList.add('is-invalid');
            }
        }
        //prevent cut copy paste
        $(document).ready(function() {
            $(this).bind('cut copy paste', function(e) {
                alert('This action is not allowed in this page.');
                e.preventDefault();
            });
            //prevent right click 
            $(this).on('contextmenu', function() {
                alert('This action is not allowed Here');
                return false;
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION['USER'])) {
        ?>
            <div style="float: right;">
                <?php echo 'Welcome Mr.  ' . $_SESSION['USER']; ?>
                <a href="logout.php">Logout</a>
            </div>
        <?php } else {
            header('location:password_validation.php?auth=false');
        }

        ?>
        <script>
            $(document).ready(function() {
                console.log('Loaded');
                var count = 0;
                setInterval(function() {
                    if (count == 30) {
                        window.location.href = 'logout.php';

                    }
                    count++;
                    //console.log(count);
                }, 1000);
                //if user can press any key from key board count set to zero(0)
                $(this).keypress(function() {
                    count = 0;
                });
                //if user can move mouse in this page count set to zero(0)
                $(this).mousemove(function() {
                    count = 0;
                });
            });
        </script>
    </div>
</body>

</html>
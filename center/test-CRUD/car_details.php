<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="modal-header">
            <h1>Car Details Form</h1>
        </div>
        <div style="float: right;">
        <?php
            session_start();
            if(isset($_SESSION['MESSAGE'])){
                echo $_SESSION['MESSAGE'];
                unset($_SESSION['MESSAGE']);
            }
        ?>

        </div>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Car Name</label>
                <input type="text" name="c_name" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Manufacture Country</label>
                <input type="text" name="m_country" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Horse Power</label>
                <input type="text" name="horse_power" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">CC</label>
                <input type="text" name="cc" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Car Color</label>
                <input type="text" name="c_color" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Car Image</label>
                <input type="file" name="image" class="form-control shadow-none">
            </div>
            <div>
                <button type="submit" class="btn btn-primary shadow-none">SUBMIT</button>
            </div>
        </form>
    </div>

</body>

</html>
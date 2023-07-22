<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        #display-image{
            border: 2px solid pink;
            margin: 5px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="save_image.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn  btn-outline-warning">Save</button>

            </div>
        </form>
        <div id="display-image">
            <!-- this code is used to show images from databases -->
            <?php
            $conn = new mysqli('localhost', 'root', '', 'ajax_crud');

            if ($conn->connect_error) {
                die($conn->connect_error);
            } else {
                $sql = "SELECT * FROM image_table";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    //print('<pre>');//print_r($row);
            ?>
                    <img src="Images/<?php echo $row['image_path']; ?>" height="150px" width="150px">
            <?php
                }
            }

            $conn->close();


            ?>
        </div>
    </div>
</body>

</html>
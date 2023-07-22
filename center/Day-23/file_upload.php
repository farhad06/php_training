<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="modal-header" style="justify-content: center;">
            <h1>Image Upload</h1>
        </div>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <span>*</span>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <span>*</span>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            // print("<pre>");
            // print_r($_POST);
            // print_r($_FILES);

            $imageName = $_FILES['image']['name'];
            $imageType = $_FILES['image']['type'];
            $imageTemp = $_FILES['image']['tmp_name'];
            $imageSize = $_FILES['image']['size'];
            if ($imageType == 'image/png' || $imageType == 'image/jpg' || $imageType == 'image/jpeg') {
                if ($imageSize <= 500000) {
                    move_uploaded_file($imageTemp, 'uploads/' . $imageName);
                    echo "<div class='alert alert-success'>Image Uploaded Successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Image Size Upto 500Kb.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Image Type Must be (.png or .jpg or .jpeg).</div>";
            }
        }
        ?>
        <section>
            <img src="<?php echo "uploads/" . $imageName; ?>" width="350px" height="250px" style="margin-top:12px">
        </section>
    </div>
</body>

</html>
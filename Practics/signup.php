<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" form-control" name="gender" value="Female">Female
            </div>
            <div class="form-group">
                <label for="">City</label>
                <select name="city" id="">
                    <option value="">Choose City</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Surat">Surat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="psw">
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-info">Save</button>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $city = $_POST['city'];
            $psw = password_hash($_POST['psw'],PASSWORD_DEFAULT);

            $img_name=$_FILES['image']['name'];
            $img_temp=$_FILES['image']['tmp_name'];

            $upload_location='Uploads/';
            $new_img_name = $upload_location.time()."-".rand(1000,9999)."-".$img_name;

    
            move_uploaded_file($img_temp,$new_img_name);

            $conn = new mysqli('localhost', 'root', '', 'center_miniproject');

            if ($conn->connect_errno) die($conn->connect_error);
            else {
                $sql = "INSERT INTO `partics` (`name`, `email` ,`phone`, `gender`, `city`, `image`, `password`) VALUES ('{$name}','{$email}','{$phone}','{$gender}','{$city}','{$new_img_name}','{$psw}')";
                $conn->query($sql);
            }
        }
        $conn->close();



        ?>
    </div>
</body>

</html>
<?php
session_start();

$id = $_REQUEST['id'];
$conn =  new mysqli('localhost', 'root', '', 'center_miniproject');
if ($conn->connect_error) die($conn->connect_error);
else {
    $sql = "SELECT * FROM `student` WHERE `id`=$id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    //print_r($row);
    //echo $row['name'];
    //$languages=explode(',',$row['language']);
    //print_r($languages);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header text-center">
                <h3>Please Fill the Form To <strong>Update</strong> your's Details</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" required value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" name="phone" class="form-control" required value="<?php echo $row['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="number" name="age" class="form-control" required value="<?php echo $row['age']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Gender:</label> &nbsp;
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Male" <?php if($row['gender']=='Male') {echo 'checked';}?>>Male
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Female" <?php if($row['gender']=='Female') {echo 'checked';}?>>Female
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="Other" <?php if($row['gender']=='Other') {echo 'checked';}?>>Other
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" onchange="preImg()">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="mt-1">Old Image</span>
                                <section><img src="<?php echo $row['image']; ?>" height="68px" width="68px"></section>
                            </div>
                            <div class="col-md-2">
                                <span class="mt-1">New Image</span>
                                <section id="prev_img"></section>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        // $lang1 = $_POST['ch'];
        // $lang = implode(',',$lang1);


        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $imageError = $_FILES['image']['error'];

        $upd_location = 'uploads/';
        $new_name = $upd_location . time() . "-" . rand(1000, 9999) . "-" . $imageName;



        if ($imageError != 0) {
            $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age', `gender`='$gender' WHERE `id`=$id";
        } else {
            move_uploaded_file($imageTemp, $new_name);
            $sql = "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`='$age',`gender`='$gender',`image`='$new_name' WHERE `id`=$id";
        }

        $conn->query($sql);
        $res = $conn->affected_rows;

        if ($res) {
            $_SESSION['SUCCESS_MSG'] = 'Data Updated Successfully';
        } else {
            $_SESSION['ERROR_MSG'] = 'Data not Updated';
        }
        header('location:index.php', "Refresh: 0");
        $conn->close();
    }
    ?>
    <script>
        function preImg() {
            //console.log(event.target);
            let preImg = URL.createObjectURL(event.target.files[0]);
            //console.log(preImg);
            document.getElementById('prev_img').innerHTML = "<img src='" + preImg + "' height='68px' width='68px'>";

        }
    </script>

</body>

</html>
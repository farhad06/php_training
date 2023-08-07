<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <!-- <a href="signup.php" class="text-decoration-none"><button type="button" class="btn btn-primary shadow-none" style="margin-top: 12px;">
                    + ADD
                </button></a> -->
        </div>
        <?php
        if (isset($_SESSION['SUCCESS_MSG']) && !empty($_SESSION['SUCCESS_MSG'])) {
            echo "<div class='alert alert-success' style='float:right;' id='responseMsg'> 
                $_SESSION[SUCCESS_MSG]</div>";
            unset($_SESSION['SUCCESS_MSG']);
        }
        if (isset($_SESSION['ERROR_MSG']) && !empty($_SESSION['ERROR_MSG'])) {
            echo "<div class='alert alert-danger' style='float:right;' id='responseMsg'> 
                $_SESSION[ERROR_MSG]</div>";
            unset($_SESSION['ERROR_MSG']);
        }
        ?>
        <div style="float: right;">
            <?php
            if(isset($_SESSION['active_user'])){
                echo<<<data
                     <div>
                     Welcome $_SESSION[active_user]
                     <a class='btn btn-sm btn-outline-danger' href='logout.php'>Logout</a>
                     </div> 
                data;
            } 
            
            ?>
        </div>
        <div class="fw-bold text-center">
            <h1><u>USER DATA</u></h1>
        </div>
        <div class="tabel-responsive"><!--style="overflow-y: scroll; height:550px;"-->
            <table class="table">
                <thead class="sticky-top thead-dark">
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Language Known</th>
                        <th scope="col">City</th>
                        <th scope="col">Profile Picture</th>
                        <th scope="col" colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn =  new mysqli('localhost', 'root', '', 'center_miniproject');
                    if ($conn->connect_error) die($conn->connect_error);
                    else {
                        if($_SESSION['active_role'] =='admin'){
                            $sql = "SELECT * FROM `student`";
                            
                        }else{
                            $sql = "SELECT * FROM `student` WHERE `id`=". $_SESSION['active_id']; 
                        }
                        $res = $conn->query($sql);
                        if (mysqli_num_rows($res) > 0) {
                            $sl_no = 1;
                            while ($row = $res->fetch_assoc()) {
                                echo <<< data
                                        <tr>
                                            <td>$sl_no</td>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[phone]</td>
                                            <td>$row[gender]</td>
                                            <td>$row[age]</td>
                                            <td>$row[language]</td>
                                            <td>$row[city]</td>
                                            <td><img src=$row[image] height='80px' width='100px'></td>
                                            <td>
                                            <a href='edit.php?id=$row[id]' class='text-decoration-none'><button class='btn btn-sm  btn-success mb-1'>Update</button></a>
                                            </td>
                                            <td>
                                            <a href='delete.php?id=$row[id]' class='text-decoration-none'><button class='btn btn-sm btn-danger' onclick="return confirm('Are You Sure ! Want to delete it?');">Delete</button></a>
                                            </td>
                                        </tr>
                                    data;

                                $sl_no++;
                            }
                        } else {
                            echo "No Data Found";
                        }
                    }

                    ?>
                </tbody>
            </table>

        </div>

    </div>
    <script>
        setTimeout(removeResponseMsg, 3000);

        function removeResponseMsg() {
            document.getElementById('responseMsg').remove();
        }
    </script>

</body>

</html>
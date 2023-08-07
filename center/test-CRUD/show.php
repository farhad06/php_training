<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h2>CAR DETAILS</h2>
            <a href="car_details.php"><button class="btn btn-link shadow-none text-decoration-none">Add Details</button></a>
        </div>
        <div style="float: right;">
            <?php
            if (isset($_SESSION['MESSAGE'])) {
                echo $_SESSION['MESSAGE'];
                unset($_SESSION['MESSAGE']);
            }
            ?>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Car Name</th>
                        <th>Manuf. Country Name</th>
                        <th>Horse Power</th>
                        <th>CC</th>
                        <th>Color</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("db.config.php");
                    $sql = "SELECT * FROM `car`";

                    $res = $conn->query($sql);
                    $i = 1;
                    while ($row = $res->fetch_assoc()) {
                        echo <<< data
                            <tr>
                                <td>$i</td>
                                <td>$row[b_name]</td>
                                <td>$row[m_country]</td>
                                <td>$row[hp]</td>
                                <td>$row[cc]</td>
                                <td>$row[c_color]</td>
                                <td><img src=$row[image] width='68px' height='69px'></td>
                                <td>
                                <a href='edit.php?id=$row[id]'><button class='btn btn-sm btn-success  shadow-none'>Update</button></a>
                                <a href='delete.php?id=$row[id]'><button class='btn btn-sm btn-danger  shadow-none' onclick="return confirm('Are You Sure ! Want to delete it?');">Delete</button></a>
                                </td>
                            </tr>
                        data;
                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
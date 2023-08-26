<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div>
            <h1 class="text-center fs-35"><em>User Data</em></h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                <?php
                include('db.config.php');
                $sql = "SELECT * FROM `user`";

                $res = $conn->query($sql);

                while ($row = $res->fetch_assoc()) {
                    echo <<< data
                        <tr>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[age]</td>
                            <td>
                            <img src="$row[image]" height="68px" width="68px">
                            </td>
                            <td>
                            <a href="edit.php?id=$row[id]"><button class="btn btn-sm btn-success shadow-none">UPDATE</button></a>
                            <a href="delete.php?id=$row[id]"><button onclick="return confirm('Are you Want to delete it?');" class="btn btn-sm btn-danger shadow-none">DELETE</button></a>
                            </td>
                        </tr>
                data;
                }

                ?>

            </table>
        </div>
    </div>
</body>

</html>
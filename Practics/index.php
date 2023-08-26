<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="icon" href="./Uploads/php.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="fw-bold text-center">
            <h1><u>USER DATA</u></h1>
        </div>
        <div class="tabel-responsive">
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn =  new mysqli('localhost', 'root', '', 'center_miniproject');
                    if ($conn->connect_error) die($conn->connect_error);
                    else {
                        $sql = "SELECT * FROM `student`";
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
                                            <td><img src='center/miniproject/'$row[image] height='80px' width='100px'></td>
                                            <td>
                                            <a href='update.php?id=$row[id]' class='text-decoration-none'><button class='btn btn-sm  btn-success mb-1'>Update</button></a>
                                            <a href='' class='text-decoration-none'><button class='btn btn-sm btn-danger'>Delete</button></a>
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

</body>

</html>
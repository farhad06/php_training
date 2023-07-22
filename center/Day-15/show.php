<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $lang = $_POST['lang'];
    $password = $_POST['psw'];
    $lang_known = implode(',', $lang);
    ?>
    <div class="container">
        <h2>Records</h2>
        <!-- <p>The .table-striped class adds zebra-stripes to a table:</p> -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Languages</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $age; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $lang_known; ?></td>
                    <td><?php echo $password; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-info" href="home_task.php">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
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
        <?php
        $search = $_POST['search'];
        $conn = mysqli_connect('localhost', 'root', '', 'ajax_crud') or die('Connection Failed');
        $sql = "SELECT * FROM player WHERE name LIKE '%{$search}%'";
        $result = mysqli_query($conn, $sql);
        //$output="";
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <!-- <th>ID</th> -->
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>CITY</th>
                        <th colspan="2">Action</th>

                    </tr>
                </thead>
                <?php
                $slNumber = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $slNumber ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><button type="button" class="btn btn-sm btn-success">Edit</butt>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger" id="delete-btn" data-id=<?php echo $row['id']; ?>>Delete</button></td>

                        </tr>
                    </tbody>

                <?php
                    $slNumber++;
                } ?>
            </table>
        <?php
        } else {
            echo "<h1>Record Not Found</h1>";
        }

        ?>
    </div>

</body>

</html>
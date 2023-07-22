<?php
require('inc/essential.php');
adminLogIN();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashboard</title>
    <?php require_once('inc/links.php'); ?>
</head>

<body class="bg-light">
<?php require('inc/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            </div>
        </div>
    </div>

    <?php require_once('inc/scripts.php'); ?>
</body>

</html>
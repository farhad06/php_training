<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h1 class="text-center"><em><strong>Registration Form</strong></em></h1>
        </div>
        <div>
            <?php 
            session_start();
            if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" name="ph" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Age</label>
                <input type="text" name="age" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="psw" class="form-control shadow-none">
            </div>
            <div>
                <button class="btn btn-primary shadow-none">SUBMIT</button>
            </div>
        </form>
    </div>

</body>

</html>
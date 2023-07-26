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
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-info">Save</button>
            </div>
        </form>
        <?php 
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email = $_POST['email'];

            $conn=new mysqli('localhost','root','', 'center_miniproject');

            if($conn->connect_errno) die($conn->connect_error);
            else{
                $sql= "INSERT INTO `partics` (`name`, `email`) VALUES ('{$name}','{$email}')";
                $conn->query($sql);
            }



        }
        
        
        
        ?>
    </div>
</body>

</html>
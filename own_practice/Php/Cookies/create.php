<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <form action="" method="post">
            <tr>
            <td>Name:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td></td>
            <td><button name='submit'>Submit</button></td>
        </tr>
        </form>
    </table>
    <?php 
         if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            setcookie('USER_NAME',$name,time()+20);
            setcookie('USER_EMAIL', $email, time() + 20);
            setcookie('USER_PHONE', $phone, time() + 20);
            echo "Cookies Created Successfully";
            echo "<a href='view.php'>View</a>";




         }
    
    
    
    ?>
</body>

</html>
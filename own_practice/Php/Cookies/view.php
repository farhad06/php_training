<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- this line used to refreash this particular page automatically after 20 sec -->
    <meta http-equiv="refresh" content="20">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_COOKIE['USER_NAME']) &&(isset($_COOKIE['USER_EMAIL']))  && (isset($_COOKIE['USER_PHONE']))) {
        echo "WELCOME " . $_COOKIE['USER_NAME']." Your Email is ==> ". $_COOKIE['USER_EMAIL'].' Phone is: ==>  '. $_COOKIE['USER_PHONE'];
        echo "<a href='delete.php'>Delete</a>";


        } else{
            echo "Cookies Deleted or Expired.";
        }  
    
    
    ?>
    
</body>
</html>
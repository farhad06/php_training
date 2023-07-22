<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   echo "<h1>Hello World!</h1>";
    $age=18;
    if ($age>=18){
        echo"You'r eligible for vote.<br>";

    }else{
        echo"You'r not eligible for vote.<br>";
    }
    //switch statement

    $op='/';
    switch($op) {
        case '+':
                echo"Choose Addition";
                break;
        case '-':
                echo"Choose Substraction";
                break;
        default:
                echo "Wrong" ;      
    }

    //loops
    //for loop
    echo"<h2>Using For loop.</h2>";
    for($i=0;$i<=10;$i++){
        echo "The numbers are $i <br>";
    }

    //while loop
    echo"<h2>Using While loop.</h2>";
    $i=1;
    while ($i<=10){
        echo "The numbers are $i <br>";
        $i++;
    }

    //do whileloop
    echo"<h2>Using do while loop.</h2>";
    $i=1;
    do{
       echo "The numbers are $i <br>";
        $i++;  
    }while($i<=10)


   ?>
</body>
</html>
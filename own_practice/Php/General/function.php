<?php 
//normal function
function first_function(){
    echo "Hello PHP.<br>";
}
first_function();

first_function();

first_function();
//function with parameter
function sum($a,$b){
    echo $a+$b;
    echo "<br>";
}
 sum(10,50);
//function with return values
function multi($m,$n){
    return $m*$n;
}

$res=multi(10,5);
echo $res;
echo "<br>";
//variable function
//type-1
function namePrint($name){
    echo"Hello $name <br>";
}
$printName='namePrint';
$printName('Bob');

//type-2

$sum=function($num1,$num2){
    echo $num1+$num2;
};
$sum(12,14);



?>
<?php 
//create class
class Car{
    //properties
    public $brand='BMW';
    public $color;

    //functions
    public function behavior(){
        echo "Car run on road";
    }
}

#$car = new Car();
//$car->brand='BMW';
echo "Car brand is: ". $car->brand."<br>";

$car->color='Gray';
echo "Car color is: " . $car->color . "<br>";
$car->behavior();
?>
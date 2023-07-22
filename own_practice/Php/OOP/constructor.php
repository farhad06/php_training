<?php 
class Car{
    public $brand;
    public $color;
    //constructor
    public function __construct($brand,$color){
        $this->brand=$brand;
        $this->color=$color;
    }

    public function getColor(){
        echo "Color of the Car is: ".$this->color;
    }
    public function getBrand()
    {
        echo "Brand of the Car is: " . $this->brand;
    }
}

$myCar = new Car('Lambergini','White');


$myCar->getBrand();
echo "<br>";
$myCar->getColor();





?>
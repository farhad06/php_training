<?php 
class calculation{
    static $number=105;
    public function getNumber(){
        //echo $this->number; 
        echo self::$number;
    }
}

$cal = new calculation();

//echo $cal->number;

echo calculation::$number;

$cal->getNumber();




?>
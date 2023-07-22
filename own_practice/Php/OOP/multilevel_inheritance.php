<?php 
class Player{
    public $name='Hardik';
    function field(){
        echo "A player can feilding in field.";
    }
}

class Bat extends Player{
    function bat(){
        echo "A player can Bat.";
    }
}

class Bowl extends Bat{
    function bowl(){
        echo "A player can Bowl.";
    }
}

$obj= new Bowl();
echo "Player name is: ".$obj->name."<br>";
$obj->field();
echo "<br>";
$obj->bat();
echo "<br>";
$obj->bowl();



?>
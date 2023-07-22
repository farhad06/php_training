<?php 
class Bird{
    function properties(){
        echo "Bards are fly in the sky.";
    }
}

class Ostrich extends Bird{
    function food(){
        echo "They eat fruit";
    }
}

$bird= new Ostrich();

$bird->food();
$bird->properties();

?>

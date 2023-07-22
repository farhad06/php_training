<?php 
class Animal{
    function name(){
        echo "All Mammal,Birds,Reptile are Animal";
    }
}

class Mammal extends Animal{
    function cow(){
        echo "Cow is a Mammal";
    }
}

class Birds extends Animal{
    function crow(){
        echo "Crow is a Bird";
    }
}

class Reptile extends Animal{
    function snake(){
        echo "Snake is a Reptile";
    }
}

$animal = new Reptile();

$bird= new Birds();

$animal->name();
echo"<br>";
//$animal->cow();
echo "<br>";
$animal->snake();
echo "<br>";
$bird->name();
echo "<br>";
$bird->crow();










?>
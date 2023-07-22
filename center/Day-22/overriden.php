<?php 
class Animal{
    public function makeSound(){
        echo "Animal make sound";
    }
}
class Dog extends Animal{
    public function makeSound()
    {
        echo "Dog Braks";
    }
}


$animal = new Animal();
$dog = new Dog();

$dog->makeSound();
echo "<br>";

$animal->makeSound();
?>
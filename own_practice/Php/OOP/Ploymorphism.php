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
class Cat extends Animal
{
    public function makeSound()
    {
        echo "Cat Meows";
    }
}

$animal = new Animal();
$dog = new Dog();
$cat = new Cat();

$animal->makeSound();
echo"<br>";
$dog->makeSound();
echo "<br>";
$cat->makeSound();



?>
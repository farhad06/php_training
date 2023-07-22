<?php 
trait example{
    public function getName(){
        echo "Hi,I am from Hello Trait.";
    }

    public function add(){
        echo "This function Add two numbers.";
    }
}

trait example1{
    public function division(){
        echo "This function used to divide two numbers.";
    }
}

class A{
    use example,example1; 
}

class B{
    use example;
}

$parent=new A();
$parent->getName();
print('<br>');
$parent->add();
print('<br>');
$parent->division();
print('<br>');


$classB=new B();
$classB->getName();
echo"<br>";
$classB->add();
















?>
<?php
/* 
#class and object
class A{
    public $x=10;

    public function hello(){
        echo 'This is form class A.';
    }
}

$obj=new A;

echo $obj->x."<br>";
echo $obj->hello();



#interface

interface inter{
    public function hello();
    const num=10;
}

class B implements inter{
    public function hello(){
        echo 'This is from Interface Inter';
    }

    
}

$obj = new B;

echo $obj->hello()."<br>";
echo B::num;


#constructor
class calculation{
    public $a = 0;
    public $b = 0;

    public function __construct($num1,$num2){
        $this->a=$num1;
        $this->b = $num2;

    }

    public function showValue(){
        echo 'The value of A and B are: '.$this->a." ".$this->b;
    }

}

$obj= new calculation(10,20);

$obj->showValue();

*/

?>
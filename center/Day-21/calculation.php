<?php 
class Calculator{
    private $num1=0;
    private $num2=0;

    public function setValue($a,$b){
        $this->num1=$a;
        $this->num2=$b;
    }

    public function add(){
        return ($this->num1 + $this->num2);
    }
    public function sub()
    {
        return ($this->num1 - $this->num2);
    }
    public function multi()
    {
        return ($this->num1 * $this->num2);
    }
    public function div()
    {
        return ($this->num1 / $this->num2);
    }
}

$cal=new Calculator;

$cal->setValue(10,3);

$add=$cal->add();
$sub = $cal->sub();

$multi = $cal->multi();

$div = $cal->div();


echo "Addition is: ".$add."<br>"."Substraction is: ".$sub."<br>"."Multiplication is: ".$multi."<br>"."Division is: ".$div;





?>
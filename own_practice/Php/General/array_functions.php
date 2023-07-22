<?php
//count
$n=[1,23,4,5,6];
for($i=0;$i<count($n);$i++){
    echo $n[$i]."\t";
}
echo"<hr>";
//sizeof
echo "The Size of Array is: ".sizeof($n);
echo"<hr>";
//is_arr
echo is_array($n);
echo"<hr>";
//array_search
$search_ele=array_search(6,$n);
echo $search_ele;
//array_replacement
$repalcement=array(3=>50);
$new_arr=array_replace($n,$repalcement);
print_r($new_arr);
echo"<hr>";
//pop
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);
array_push($stack,'greenApple','tomato');
print_r($stack);
echo"<hr>";
$shift_ele=array_shift($stack);
print_r($stack);
echo"<hr>";

//array merge
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);





















































?>
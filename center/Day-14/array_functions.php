<?php 
//array_keys()

$arr=['p_name'=>'Rohit','j_no'=>45,'age'=>35];

$player=array_keys($arr);
print('<pre>');
print_r($player);
echo"<hr>";

//array_push()

$car=['BMW','Suzuki','Honda'];

array_push($car,'Ford','Kia');
print('<pre>');
print_r($car);
echo"<hr>";

//array_merge()
echo"Merge <br>";
$arr1=[1,2,3,4];
$arr2=[1,4,9,16];
$arr3=array_merge($arr1,$arr2);
print('<pre>');
print_r($arr3);
echo"<hr>";

//array_combine()
echo"Combine <br>";
$p_name=['Rohit','Virat','Rahul','Pant'];
$j_no=[45,18,1,17];
$team=array_combine($p_name,$j_no);
print('<pre>');
print_r($team);
echo"<hr>";
//array_flip()
echo"<h2>Flip</h2> <br>";
$flip_arr=array_flip($team);
print('<pre>');
print_r($flip_arr);
echo"<hr>";
//array diff
echo"<h2>Diff</h2> <br>";
$color1=['c1'=>'blue','c2'=>'green','c3'=>'red'];
$color2=['c4'=>'blue','c5'=>'pink','c6'=>'red'];
$diff=array_diff($color1,$color2);
print('<pre>');
print_r($diff);
echo"<hr>";








?>
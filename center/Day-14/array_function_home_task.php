<?php
echo"<center><h1>All Array Inbuild functions</h1></center>";
echo"<hr><hr>"; 
//array_keys()
echo"<center><h2>Keys</h2> </center> <br>";

$arr=['p_name'=>'Rohit','j_no'=>45,'age'=>35];

$player=array_keys($arr);
print('<pre>');
print_r($player);
echo"<hr>";

//array_push()
echo"<center><h2>Push</h2> </center> <br>";

$car=['BMW','Suzuki','Honda'];

array_push($car,'Ford','Kia');
print('<pre>');
print_r($car);
echo"<hr>";
//array_merge()
echo"<center><h2>Merge</h2> </center> <br>";
$arr1=[1,2,3,4];
$arr2=[1,4,9,16];
$arr3=array_merge($arr1,$arr2);
print('<pre>');
print_r($arr3);
echo"<hr>";

//array_combine()
echo"<center><h2>Combine</h2> </center> <br>";
$p_name=['Rohit','Virat','Rahul','Pant'];
$j_no=[45,18,1,17];
$team=array_combine($p_name,$j_no);
print('<pre>');
print_r($team);
echo"<hr>";
//array_flip()
echo"<center><h2>Flip</h2> </center> <br>";
$flip_arr=array_flip($team);
print('<pre>');
print_r($flip_arr);
echo"<hr>";
//array diff
echo"<center><h2>Diff</h2> </center> <br>";
$color1=['c1'=>'blue','c2'=>'green','c3'=>'red'];
$color2=['c4'=>'blue','c5'=>'pink','c6'=>'red'];
$diff=array_diff($color1,$color2);
print('<pre>');
print_r($diff);
echo"<hr>";
//implode
echo"<center><h2>Implode</h2> </center> <br>";
$str=['I' ,'love', 'Cricket'];
$implode_arr=implode(' ',$str);
print('<pre>');
print_r($implode_arr);
echo"<hr>";
//explode
echo"<center><h2>Explode</h2> </center> <br>";
// $str=['I' ,'love', 'Cricket'];
$str='I Love Cricket';
$explode_arr=explode(' ',$str);
print('<pre>');
print_r($explode_arr);
echo"<hr>";








?>
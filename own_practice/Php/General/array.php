<?php
//normal array 
//$nums=[1,23,4,5,6,7];
$nums=array(1,23,4,5,6,7);

for($i=0;$i<5;$i++){
    echo $nums[$i]."<br>";
}
echo"<pre>";
print_r($nums);
echo"</pre>";
//associative array

$person=array(
            'name'=> 'joe',
            'age'=> 25,
            'city'=>'kolkata'
);
echo"<pre>";
print_r($person);
echo"</pre>";

var_dump($person);
echo"<hr>";

//foreach loop
echo "<br>";
foreach($person as $val){
    echo $val."<br>";
}
echo"<hr>";

foreach($person as $key => $val){
    echo $key." => ". $val."<br>";
}
echo"<hr>";

//multidimention index array
$mutiDiIndexArr=[[1,'A',2200],[2,'B',1200],[3,'C',1000],[4,'D',1500]];
echo"<pre>";
print_r($mutiDiIndexArr);
echo"</pre>";
//iterate using for loop
for($i=0;$i<4;$i++){
    for($j=0;$j<3;$j++){
        echo $mutiDiIndexArr[$i][$j]." ";
    }
    echo"<br>";
}
echo"<hr>";

//iterate using foreach loop
foreach($mutiDiIndexArr as $val){
    foreach($val as $v){
        echo $v ."  ";
    }
    echo"<br>";
}
echo"<hr>";
$player=[
            'batter_1'=>['p_name'=>'Rohit','J_no'=>45,'h_score'=>264],
            'batter_2'=>['p_name'=>'Virat','J_no'=>18,'h_score'=>183],
            'blower'=>['p_name'=>'Siraj','J_no'=>77,'h_wkt'=>5],
            'allrounder'=>['p_name'=>'Hardik','J_no'=>33,'h_score'=>125]
];

foreach($player as $key=> $val){
    foreach($val as $k=> $v){
        echo $k."-->".$v.' ';
    }
    echo"<br>";
}


?>
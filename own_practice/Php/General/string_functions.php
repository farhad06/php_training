<?php 
//join
$arr=['Hello','PHP'];
$join_str=join('-',$arr);
echo $join_str."<hr>";
//str_split
$str='This is a PHP code.';
$arr1=str_split($str,4);
print('<pre>');
print_r($arr1);
echo "<hr>";
//sub_string
$sub_string=substr($str,3,7);
echo $sub_string."<hr>";
echo strpos($str,'H')."<hr>";
echo strlen($str)."<hr>";
echo strtolower($str)."<hr>";
echo strtoupper($str)."<hr>";
echo strrev($str)."<hr>";
$txt="Hello";
echo md5($txt)."<hr>";
echo str_shuffle($txt)."<hr>";





































?>
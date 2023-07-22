<?php 
try{
    $a=10; 
    $b=0;
    $res=$a/$b;
    echo $res;
}catch(Exception $ex){
    echo "An exception occured ".$ex->getMessage();
}
?>
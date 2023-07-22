<?php
try {
    $a = 10;
    $b = 2;
    $arr=[1,2,3,4,5];
    //division error
    if ($b==0){
        throw new Exception("Division By Zero.");
    }else{
        $res = $a / $b;
        echo $res;
    }
    //array out of bound example
    $value=$arr[8];
    throw new Exception("Array Out of Bound.");
    //length exception error
    $str="This is PHP";
    if(strlen($str)>10){
        throw new Exception('String length exceeds limits.');
    }else{
        echo "<br> String Length With in limit.";
    }
} catch (Exception $ex) {
    echo  $ex->getMessage();
}catch(OutOfBoundsException $ex1){
    echo $ex1->getMessage();
}catch(LengthException $len){
    echo $len->getMessage();
}
?>
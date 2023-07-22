<?php
try {
    $a = 10;
    $b = 0;

    if ($b==0){
        throw new Exception("Division By Zero.");
    }else{
        $res = $a / $b;
        echo $res;
    }
} catch (Exception $ex) {
    echo "An exception occured " . $ex->getMessage();
}
?>
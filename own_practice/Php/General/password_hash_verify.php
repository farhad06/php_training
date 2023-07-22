<?php 
$pass='Farhad';

$hash=password_hash($pass,PASSWORD_DEFAULT);

//$md=md5($pass);

echo $hash;

if(password_verify('Farhad',$hash)){
    echo "<br>Password is valid<br>";
}else{
    echo "<br>Invalid Password<br>";
}









?>
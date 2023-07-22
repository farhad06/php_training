<?php
//default time zone is paris/france 
// we change the default time zone by using date_default_timezone_set() function. 
date_default_timezone_set('Asia/Kolkata');
$date=date('d-M-Y h-i-A');
echo "Current time is: ".$date;



?>
<?php
############################### Open and Read File ##########################
 
//open a file
$handelars=fopen('abc.txt','r');
//readfile
$contains=fread($handelars,filesize('abc.txt'));
print("<pre>");
echo $contains."<hr>";
fclose($handelars);

//read single file
$single_line=fopen('abc.txt','r');
echo fgets($single_line);   
fclose($single_line);


###################### Write file ##################################

$write=fopen('write.txt','w');
fwrite($write,'This is PHP.');
fwrite($write,' This code is for PHP file handlers.');
fclose($write);
//over write file
$write=fopen('write.txt','w');
fwrite($write,'This is overwritten');
//fwrite($write,' This code is for PHP file handlers.');
fclose($write);

//append file
$write=fopen('write.txt','a');
fwrite($write,'This line a added because I use append mode while a opening this file.');
//fwrite($write,' This code is for PHP file handlers.');
fclose($write);

################################### Delete File #####################################

unlink('ggg.txt');
echo "File deleted successfully.";


























?>

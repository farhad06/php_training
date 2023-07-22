<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_GET['add'])){
    $n1=$_GET['n1'];
    $n2=$_GET['n2'];

    $sum=$n1+$n2;
    //echo "<span> Sum is : </span>". $sum;

}
?>
<form action="" method="get">
        <table>
        <tr>
            <td>Enter 1st Number:</td>
            <td><input type="number" name="n1"></td>
        </tr>
         <tr>
            <td>Enter 2nd Number:</td>
            <td><input type="number" name="n2"></td>
        </tr>
        <tr>
            <td>Result:</td>
            <td><input type="text"  value="<?php echo $sum;?>"></td>
            <!-- <td><span name="result"></span></td> -->
        </tr>
        <tr><td><input type="submit" name="add" value="ADD"></td></tr>
    </table>
</form>

</body>
</html>
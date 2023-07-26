<?php 


$form_data=$_POST;
// print('<pre>');
// print_r($form_data);

$conn = mysqli_connect('localhost', 'root', '', 'php_center') or die("Connection Failed".mysqli_connect_error());

$sql = "INSERT INTO `employee`(`name`, `phone`, `email`, `salary`) VALUES (?,?,?,?)";
$values = [$form_data['name'],$form_data['phone'],$form_data['email'],$form_data['sal']];
$datatypes = "sssd";

if($stmt=mysqli_prepare($conn,$sql)){
    mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    if(mysqli_stmt_execute($stmt)){
        $res=mysqli_stmt_affected_rows($stmt);
        if($res){
            echo "<script>
            alert('Data Saved Successfully');
            window.location.href='prepaired_statement.php';
        </script>";
        }else{
            echo "Not Inserted";
        }
        mysqli_stmt_close($stmt);

    }else{
        mysqli_stmt_close($stmt);
        die('Query Not Executed');
    }

}else{
    die('Query not Prepaired');
}

?>
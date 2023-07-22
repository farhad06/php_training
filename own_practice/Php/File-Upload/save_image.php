<?php
/* [image] => Array
        (
            [name] => profile_pic.png
            [full_path] => profile_pic.png
            [type] => image/png
            [tmp_name] => C:\xampp\tmp\phpC3FC.tmp
            [error] => 0
            [size] => 178536
        ) */
$name=$_POST['name'];
$imageName=$_FILES['image']['name'];
$imageTempName = $_FILES['image']['tmp_name'];
$folder='Images/'.$imageName;

$conn=new mysqli('localhost','root','','ajax_crud');

if($conn->connect_error){
    die($conn->connect_error);
}else{
    $sql="INSERT INTO image_table (name,image_path) VALUES ('{$name}','{$imageName}')";
    $conn->query($sql);
    if(move_uploaded_file($imageTempName,$folder)){
        echo "<script>
                alert('Data Saved');
                window.location.href='save_image_in_database.php';
             </script>";
    }else{
        echo "<script>
                alert('Data not Saved');
                window.location.href='save_image_in_database.php';
             </script>";
    }
}

$conn->close();

?>
<?php 
$player_id=$_POST['id'];
$conn=mysqli_connect('localhost','root','', 'ajax_crud')or die("Connection Falied.");
$sql= "DELETE FROM player WHERE id='{$player_id}'";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>
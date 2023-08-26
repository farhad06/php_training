<?php
session_start();
$id =$_GET['id'];

include('db.config.php');

$sql="DELETE FROM `user` WHERE `id`=$id";


$conn->query($sql);

$aff=$conn->affected_rows;

if($aff){
    $_SESSION['message'] = "Data Deleted";
}else{
    $_SESSION['message'] = "Data not Deleted";

}

header('location:index.php');










?>
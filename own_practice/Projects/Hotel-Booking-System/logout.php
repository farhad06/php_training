<?php 
//require('admin/inc/essential.php');
session_start();
session_destroy();
header('location:index.php');
?>
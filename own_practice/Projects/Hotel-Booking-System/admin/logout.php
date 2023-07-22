<?php
session_start();
require('inc/essential.php');
session_destroy();
redirect('index.php');
?>
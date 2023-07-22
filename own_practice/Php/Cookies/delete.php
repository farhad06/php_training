<?php
setcookie('USER_NAME', NULL, time() - 20);
setcookie('USER_EMAIL', NULL, time() - 20);
setcookie('USER_PHONE', NULL, time() - 20);
header('location:view.php');





?>
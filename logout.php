<?php include('header.php');
session_destroy();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
redirect('./index.php');
die();
?>
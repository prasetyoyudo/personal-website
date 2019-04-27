<?php  

session_start();
$_SESSION['admin_id'];
$_SESSION['admin_username'];

unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);

session_unset();
session_destroy();

header('location:login.php');
?>
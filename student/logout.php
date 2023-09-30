<?php
session_start();
unset($_SESSION['username']);
header('location:../php/loginstu.php');
?>
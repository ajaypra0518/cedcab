<?php
session_start();
unset($_SESSION['adminlogin']);
header('location:../index.php');
?>
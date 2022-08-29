<?php
session_start();
$_SESSION['log']=1;
header("Location: /view/home.php")
?>
<?php
session_start();
session_destroy();
session_start();
$_SESSION["User"]=true;
header('location:index.php');
?>
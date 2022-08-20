<?php
ob_start();
include ("config1.php");
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
header("Location:login.php");
?>
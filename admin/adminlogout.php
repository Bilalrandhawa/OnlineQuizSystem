<?php
ob_start();
include ("config1.php");
session_start();
unset($_SESSION["ad_Email"]);
unset($_SESSION["ad_PASSWORD"]);
header("Location:adminloginnew.php");
?>
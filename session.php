<?php
session_start();
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["remote"] = $_POST["remote"];
header("Location:files.php");
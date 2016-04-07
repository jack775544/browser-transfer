<?php
if (!isset($_SESSION)){
    session_start();
}
include '../phpseclib/vendor/autoload.php';

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$sftp = new \phpseclib\Net\SFTP($_SESSION["remote"]);
if (!$sftp->login($username, $password)) {
    echo "timeout";
    exit('Login Failed');
}

$pwd = $sftp->pwd();

echo $pwd;
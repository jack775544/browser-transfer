<?php
if (!isset($_SESSION)){
    session_start();
}
include 'phpseclib/vendor/autoload.php';

if (isset($json)) {
    if ($json == "true") {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/json");
    }
} else {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/json");
}

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$sftp = new \phpseclib\Net\SFTP($_SESSION["remote"]);
if (!$sftp->login($username, $password)) {
    echo "timeout";
    exit('Login Failed');
}

$ls = $sftp->pwd();

echo $ls;
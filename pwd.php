<?php
if (!isset($_SESSION)){
    session_start();
}
include 'phpseclib/vendor/autoload.php';
include 'includes/common.php';

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$sftp = new \phpseclib\Net\SFTP($_SESSION["remote"]);
if (!$sftp->login($username, $password)) {
    $params['flash'] = 'ERROR: Login Failed';
    $url = buildUrl('logout.php', $params);
    header("Location:" . $url);
    exit('ERROR: Login Failed');
}

$pwd = $sftp->pwd();

echo $pwd;
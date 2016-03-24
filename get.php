<?php
include 'vendor/autoload.php';

session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$sftp = new \phpseclib\Net\SFTP($_SESSION["remote"]);
if (!$sftp->login($username, $password)) {
    exit('Login Failed');
}
$filename = $_GET["filename"];
//$filename = 'ass1spec.pdf';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=" . urlencode($filename) . "");

// outputs the contents of filename.remote to the screen
echo $sftp->get($filename);
// copies filename.remote to filename.local from the SFTP server
//$sftp->get('Mapper.py', 'Mapper.py');
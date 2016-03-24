<?php
include 'vendor/autoload.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sftp = new \phpseclib\Net\SFTP('remote.labs.eait.uq.edu.au');
if (!$sftp->login($username, $password)) {
    exit('Login Failed');
}

// puts a three-byte file named filename.remote on the SFTP server
$sftp->put('TESTINGXXXXXXXX.txt', 'slam jam thank you m\'am');
// puts an x-byte file named filename.remote on the SFTP server,
// where x is the size of filename.local
//$sftp->put('filename.remote', 'filename.local', NET_SFTP_LOCAL_FILE);
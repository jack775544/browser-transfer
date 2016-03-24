<?php
session_start();
include 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/json");

//$username = $_POST["username"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
//$password = $_POST["password"];
//echo $username;

$sftp = new \phpseclib\Net\SFTP('remote.labs.eait.uq.edu.au');
if (!$sftp->login($username, $password)) {
	echo "timeout";
    exit('Login Failed');
}

$ls = $sftp->rawlist();

$response = '{"items": [';
foreach ($ls as $item){
    $response = $response . '{"filename": ["' . implode('", "', $item) . '"]}, ';
}
$response = substr($response, 0, -2);
$response = $response . ']}';

echo $response;
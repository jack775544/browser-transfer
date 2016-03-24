<?php
echo "hello world";
include 'vendor/autoload.php';
//session_start();
ini_set('display_errors', '1');

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/json");

$username = $_GET["username"];
$password = $_GET["password"];

$sftp = new \phpseclib\Net\SFTP('remote.labs.eait.uq.edu.au');
if (!$sftp->login($username, $password)) {
    exit('Login Failed');
}

//echo $sftp->pwd() . "\r\n";
//$sftp->put('filename.ext', 'hello, world!');
//print_r($sftp->nlist());
$ls = $sftp->rawlist();

$response = '{"files": [';
foreach ($ls as $item){
    $response = $response . '{"filename": ["' . implode('", "', $item) . '"]}, ';
}
$response = substr($response, 0, -2);
$response = $response . ']}';

echo $response;
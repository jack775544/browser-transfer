<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["remote"]);
if (isset($_GET['flash'])){
    $_SESSION['flash'] = $_GET['flash'];
} else {
    $_SESSION['flash'] = 'You have now been logged out';
}
header("Location:index.php");
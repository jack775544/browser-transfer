<?php
session_start();
if ((isset($_SESSION["username"])) && (isset($_SESSION["password"])) && (isset($_SESSION["remote"]))) {
    header("Location:files.php");
}
?>
<html>
<head>
    <title>Browser Transfer</title>
    <link rel="stylesheet" href="css/filelist.css">
</head>
<body>

<form action="session.php" method="post">
    <label for="remote">SFTP Server Address:</label>
    <input type="text" name="remote" id="remote" /><br>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" /><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" /><br>
    <br />
    <input type="submit" name="submit" value="Submit" />
</form>

<!--<input type="text" id="username">-->
<!--<input type="password" id="password">-->
<!--<input type="button" id="submit">-->
<div id="test"></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/interface.js"></script>
</body>
</html>

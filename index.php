<?php
// If someone backs into the login page it should log them out
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["remote"]);
?>
<html>
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Browser Transfer</h1>
        <form action="session.php" method="post" id="loginform">
            <div class="form-group">
                <label for="remote">SFTP Server Address:</label>
                <input type="text" name="remote" id="remote" value="remote.labs.eait.uq.edu.au" class="form-control"/><br>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control"/><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control"/><br>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn"/>
        </form>
    </div>
</div>
<?php include 'includes/bootstrapjs.php'; ?>
</body>
</html>

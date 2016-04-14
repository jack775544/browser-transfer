<?php
// If someone backs into the login page it should log them out
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["remote"]);
//$_SESSION['flash'] = 'This is a super fun error message';
?>
<html>
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Browser Transfer</h1>
        <?php
        if (isset($_SESSION['flash'])) {
            echo sprintf(
                '<div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    %s
                </div>',
                $_SESSION['flash']);
            unset($_SESSION['flash']);
        }
        ?>
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
<script src="js/common.js" type="text/javascript"></script>
</body>
</html>

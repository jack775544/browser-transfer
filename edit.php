<?php
session_start();
if ((!isset($_SESSION["username"])) || (!isset($_SESSION["password"])) || (!isset($_SESSION["remote"]))) {
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    unset($_SESSION["remote"]);
    header("Location:index.php");
}
?>
<html>
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
<div class="row">
    <div class="col-sm-11">
        <h1>Browser Transfer</h1>
    </div>
    <div class="col-sm-1">
        <form method="post" action="logout.php">
            <input type="submit" name="logout" value="Logout" class="btn" id="logout">
        </form>
    </div>
</div>
<div class="jumbotron row files">
    <div class="row" id="editoptions">
        <button type="button" id="save" class="btn"><span class="glyphicon glyphicon-floppy-disk"
                                                          aria-hidden="true"></span>Save
        </button>
        <button type="button" id="download" class="btn"><span class="glyphicon glyphicon-save"
                                                              aria-hidden="true"></span>Download
        </button>
        <select id="modes"></select>
    </div>
    <div class="row">
        <?php
        if (isset($_GET['pwd'])) {
            echo $_GET['pwd'];
        }
        ?>
    </div>
</div>
<div class="jumbotron files row" id="editjumbo">
    <div class="row" id="editrow">
        <pre id="editor"><?php
            include 'vendor/autoload.php';

            $username = $_SESSION["username"];
            $password = $_SESSION["password"];

            $sftp = new \phpseclib\Net\SFTP($_SESSION["remote"]);
            if (!$sftp->login($username, $password)) {
                exit('Login Failed');
            }

            $filename = $_GET['filename'];
            echo htmlspecialchars($sftp->get($_GET['pwd'] . '/' . $filename));

            ?></pre>
    </div>
</div>

<?php include 'includes/bootstrapjs.php'; ?>
<script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="ace/ext-modelist.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script src="js/edit.js" type="text/javascript"></script>
</body>
</html>
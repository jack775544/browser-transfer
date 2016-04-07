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
        <button type="button" id="refresh" class="btn"><span class="glyphicon glyphicon-refresh"
                                                             aria-hidden="true"></span>Refresh
        </button>
        <button type="button" id="upload" class="btn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span>Upload
        </button>
    </div>
    <div class="row" id="pwd"><?php include 'pwd.php'; ?></div>
</div>
<div class="jumbotron files row">
    <div id="filecontainer" class="row">
        <ol id="items">

        </ol>
    </div>
</div>

<?php include 'includes/bootstrapjs.php'; ?>
<script src="js/common.js" type="text/javascript"></script>
<script src="js/interface.js" type="text/javascript"></script>
</body>
</html>
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
    <div class="row">
        <button type="button" id="refresh" class="btn"><span class="glyphicon glyphicon-refresh"
                                                             aria-hidden="true"></span>Refresh
        </button>
        <button type="button" id="upload" class="btn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span>Upload
        </button>
    </div>
    <div class="row">
        /home/students/s4356183
    </div>
</div>
<div class="jumbotron files row">
    <div id="filecontainer" class="row">
        <?php
        function get_include_contents($filename)
        {
            if (is_file($filename)) {
                ob_start();
                $json = false;
                include $filename;
                $contents = ob_get_contents();
                ob_end_clean();
                return $contents;
            }
            return false;
        }

        $var = get_include_contents('ls.php');

        $contents = json_decode($var, true);
        print_r('<ol id="items">' . "\n");
        foreach ($contents['items'] as $key => $value) {
            $item = $value['filename'];
            $size = $item[0];
            $type = $item[5]; // 1 is file, 2 is folder, 3 is symlink, 4 is other
            $created = $item[6];
            $modified = $item[7];
            $filename = $item[8];
            $textType = '';
            $img = '';
            $url = '';
            switch ($type) {
                case(1):
                    $img = 'img/icons/document.png';
                    $url = 'get.php?filename=' . $filename;
                    $textType = 'file';
                    break;

                case(2):
                    $img = 'img/icons/folder.png';
                    $url = '#';
                    $textType = 'folder';
                    break;

                default:
                    $img = 'img/icons/folder.png';
                    $url = '#';
                    $textType = 'other';
                    break;
            }
            $statement = "<li><a class='itemlink' href='%s' data-modified='%s' data-created='%s' data-name='%s' data-size='%s' data-type='%s' data-linkname='%s'><img src='%s'>%s</a></li>";
            $statement = sprintf($statement, $url, $modified, $created, $filename, $size, $textType, rawurlencode($filename), $img, $filename);
            print_r($statement . "\n");
        }
        print_r('</ol>');
        ?>
    </div>
</div>

<?php include 'includes/bootstrapjs.php'; ?>
<script src="js/interface.js" type="text/javascript"></script>
</body>
</html>
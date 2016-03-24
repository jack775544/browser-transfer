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
    <title>Browser Transfer</title>
    <link rel="stylesheet" href="css/filelist.css">
</head>
<body>
<div id="filecontainer">
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
        $filename = $item[8];
        $size = $item[0];
        $type = $item[5]; // 1 is file, 2 is folder, 3 is symlink, 4 is other
        $img = '';
        $url = '';
        switch ($type) {
            case(1):
                $img = 'img/icons/document.png';
                $url = 'get.php?filename=' . $filename;
                break;

            case(2):
                $img = 'img/icons/folder.png';
                $url = '#';
                break;

            default:
                $img = 'img/icons/folder.png';
                $url = '#';
                break;
        }
        $statement = "<li><img src='%s'><a href='%s'>%s</a></li>";
        $statement = sprintf($statement, $img, $url, $filename);
        print_r($statement . "\n");
    }
    print_r('</ol>');
    ?>
</div>
<form method="post" action="logout.php">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>
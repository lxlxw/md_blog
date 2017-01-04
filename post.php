<?php
include 'common.php';
include 'parser.php';
$id = (int)$_GET['id'];
if (!$file = glob("post/$id-*")[0]) {
    header('Location:index.php');
    exit;
}
$v = file2info($file);
$parser = new HyperDown\Parser;
$v['data'] = $parser->makeHtml(file_get_contents($file));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $v['title'] ?> - 个人博客</title>
    <link href="rsc/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="rsc/css/markdown.css" rel="stylesheet" type="text/css"/>
    <link href="rsc/js/highlight/hybrid.css" rel="stylesheet" type="text/css"/>
    <script src="rsc/js/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body>
<div id="container">
    <div id="sidebar">
        <div id="logo"></div>
    </div>
    <div id="main">
        <div id="post">
            <div id="title">
                <?php echo $v['title'] ?>
                <span id="date">[ <?php echo $v['date'] ?> ]</span>
                <a id="back" href="index.php">[ B A C K ]</a>
            </div>
            <div id="markdown"><?php echo $v['data'] ?></div>
        </div>
    </div>
</div>
</body>
</html>

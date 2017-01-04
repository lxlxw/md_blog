<?php
include 'common.php';
foreach (glob('post/*.md') as $file) {
    $v = file2info($file);
    $data[$v['id']] = ['title' => $v['title'], 'date' => $v['date']];
}
krsort($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>lxlxw - 个人博客</title>
    <link href="rsc/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
    <div id="sidebar">
        <div id="logo">lxlxw - 个人博客</div>
        <div id="aboutus">
            blog: <a href="http://www.lxlxw.me" target="_blank" >www.lxlxw.me</a> 
            </br></br>
            email: 19168066@qq.com
        </div>
    </div>
    <div id="main">
        <div id="list">
            <ul>
                <?php
                foreach ($data as $id => $v) {
                    $tpl = '<li><a href="post.php?id=%d">%s<span class="date">[ %s ]</span></a></li>';
                    echo sprintf($tpl, $id, $v['title'], $v['date']);
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>

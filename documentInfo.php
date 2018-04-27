<?php 
/*
 *
 * ================================================
 * Author: ZhangJi
 * Email: 281056769@qq.com
 * Date: 2018.4.10
 */
/**
 * 964 x 469分辨率下显示
 */



include './include/common.php';
require './include/index.func.php';
require './include/noteClass.php';
require './include/labelClass.php';

session_start();
if (isset($_SESSION['userid'])) {
    $a = $conn->getRow("select * from user where id = $_SESSION[userid]");
    // echo $a['id'];
} else {
    echo "非法闯入!";
    exit();
}

if (isset($_GET['content']) ){
        $note = noteClass::noteContentSearch($_GET['content']);
        // foreach ($note['markID'] as $value) {
        //     $mark .= labelClass::getMarkByNoteId($value);
        // }
        // print_r($mark);
}else{
    alert_close('请选中笔记后再操作');
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./style/documentInfo.css">
    <script src="./layui/layui.js"></script>
</head>

<body>
<div class='documentInfo'>
	<dl>
        <dd>笔记：<?php echo $note['content']?></dd>
        <dd>创建时间：<?php echo $note['createTime']?></dd>
        <dd>更新时间：<?php echo $note['updteTime']?></dd>
        <dd>笔记字数：<?php strlen($note['content']) ?></dd>
        <dd>包含标签：<?php echo $mark?></dd>
        <dd>所属笔记本：<?php echo $note['notbookID']?></dd>
        <dd>是否被标记：<?php $note['isStart'] == 1?'是':'否'?></dd>
    </dl>
</div>
</body>

</html>
<script src="./js/user.js"></script>
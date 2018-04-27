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
require './include/lableClass.php';

session_start();
if (isset($_SESSION['userid'])) {
    $a = $conn->getRow("select * from user where id = $_SESSION[userid]");
    // echo $a['id'];
} else {
    echo "非法闯入!";
    exit();
}

if ($_GET['action'] == 'show' ) {
    if(isset('$_GET['id']')){
        $note = noteClass::idSearch($_GET['id']);
        foreach ($note['maskID'] as $value) {
            $mark .= labelClass::getMarkByNoteId($value);
        }
        print_r($mark);
   }else{
       echo '参数异常';
   }
}else{
    echo '请选中笔记后再操作';
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
    <link rel="stylesheet" href="./style/user.css">
</head>

<body>
<div class='documentInfo'>
	<dl>
        <dd>笔记：<?php echo $note['content']?></dd>
        <dd>创建时间：<?php echo $note['createTime']?></dd>
        <dd>更新时间：<?php echo $note['updateTime']?></dd>
        <dd>笔记字数：<?php echo count($note['content'])?></dd>
        <dd>包含标签：<?php echo $mark?></dd>
        <dd>所属笔记本：<?php echo $note['notbookID']?></dd>
        <dd>是否被标记：<?php echo $note['isStart']?></dd>
    </dl>
</div>
</body>

</html>
<script src="./js/user.js"></script>
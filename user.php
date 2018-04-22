<?php  
    include "./include/common.php";
    if ($_GET['action'] == 'updata') {

    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户信息——Biu笔记本</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
</head>
<body>
<div class="user-center">
    <form action="user.php?action=updata" method="post" id="userform">
        <dl>
            <dd>用户名<input type="text" name="username"></dd>
            <dd>Email <input type="text" name="email" id=""></dd>
            <dd>密码修改<input type="password" name="psk" id=""></dd>
            <dd>账户创建时间</dd>
            <dd><input type="submit" value="提交修改"></dd>
        </dl>
    </form>
</div>
</body>
</html>
<script src="./js/user.js"></script>
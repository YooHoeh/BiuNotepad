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


 
// include './include/common.php';
// require 'index.func.php';
if ('updata' == $_GET['action']) {
	$psd = _fetch_array ( "select $name from $table where $userID = '{$_COOKIE['userID']}'" )[$name];
	$newpsd = check_password ( $_POST ['newpsd'], 6 );
	if (sha1 ( $_POST ['oldpsd'] ) == $psd) {
		_query ( "update $table set $name = '$newpsd' where $userID = '{$_COOKIE['userID']}'" );
		alert_back ( '密码修改成功' );
	}
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
    <title>用户信息——Biu笔记本</title>
</head>

<body>
    <!-- <div class="user-center"> -->

        <form class="layui-form" action="user.php?action=updata" method="post" id="userform">
            
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" required lay-verify="required" placeholder=$username autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
            <label class="layui-form-label">密码修改</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Email</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required|email" placeholder="" utocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">创建时间</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" disabled="disabled">
            </div>
        </div>
        
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>
    </form>
    <div class="close"></div>
    <!-- </div> -->
    <script>
        layui.use('form', function () {
            var form = layui.form;
            
            //监听提交
            form.on('submit(formDemo)', function (data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });
        });
    </script>
</body>

</html>
<script src="./js/user.js"></script>
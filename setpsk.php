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

session_start();
if (isset($_SESSION['userid'])) {
    $a = $conn->getRow("select * from user where id = $_SESSION[userid]");
    // echo $a['id'];
} else {
    echo "非法闯入!";
    exit();
}

if ( $_GET['action'] == 'setpsk') {
    $form = [];
    $form['oldpsk'] = sha1($_POST['oldpsk']);
    $form['newpsk'] = $_POST['newpsk'];
    $form['repsk'] = $_POST['confirmpsk'];
    if ($a['password'] == $form['oldpsk']){
        check_password($form['newpsk'],$form['repsk'],6);
         $form['psk'] = sha1($form['newpsk']);

        if( $conn->update('user',"password='$form[psk]'","id='$a[id]'") == 1){
            alert_back('密码修改成功');
        }else{
            alert_back('修改失败');
            // echo '修改失败';
        }
    //    echo $conn->updata('user','password=$form[psk]','id=$a[id]');
    }else{
        alert_back('原密码输入错误');
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
    <div class='userdata'>
   
    <div class='setpsk'> 
        <form class="layui-form" action="setpsk.php?action=setpsk" method="post" id="pskform">
            
            <div class="layui-form-item">
                <label class="layui-form-label">原始密码:</label>
                <div class="layui-input-inline">
                    <input type="password" name="oldpsk" placeholder="请输入原始密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码修改:</label>
                <div class="layui-input-inline">
                    <input type="password" name="newpsk" placeholder="请输入新密码" autocomplete="off" class="layui-input">
                </div>
            </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认修改:</label>
            <div class="layui-input-inline">
                <input type="password" name="confirmpsk" placeholder="请确认您输入的密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>
    </form>
</div>
    </div>
    <script>
        layui.use('form', function () {
            var form = layui.form;

            // //监听提交
            // form.on('submit(formDemo)', function (data) {
            //     layer.msg(JSON.stringify(data.field));
            //     return false;
            // });
        });
    </script>
</body>

</html>
<script src="./js/user.js"></script>
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
} else {
    echo "非法闯入!";
    exit();
}

if ('updata' == $_GET['action']) {
    $form = [];
    $form['name'] = check_name($_POST['name'],4,20);
    $form['email'] = check_email($_POST['email']);
    print_r($form);
    if($conn->update('user',"username='$form[name]'","id='$a[id]'") == 1) {
        alert_close('用户信息修改成功');
    }else{
        alert_back('修改失败');
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
    <form class="layui-form" action="user.php?action=updata" method="post" id="userform">

        <div class="layui-form-item">
            <label class="layui-form-label">用户名:</label>
            <div class="layui-input-inline">
                <input type="text" name="name" required lay-verify="required" value=<?php echo $a[username] ?> placeholder=
                <?php echo $a[username] ?> autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">Email:</label>
            <div class="layui-input-inline">
                <input type="text" name="email" required lay-verify="required|email" value="<?php echo $a[email] ?>" utocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">创建时间:</label>
            <div class="layui-input-inline">
                <input type="text" name="createtime" value="<?php echo $a[createTime] ?>" placeholder="<?php echo $a[createTime] ?>" autocomplete="off"
                    class="layui-input" disabled="disabled">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>
    </form>
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

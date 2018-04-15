<?php
//************* */
//Author:YooHoeh
//Updata:2018.4.13
//RS:github.com/YooHoeh
//Version:1.3
//************ */



session_start();
require "./include/common.php";

// 登录状态
// _login_state();

// 开始处理登录状态
if ($_GET['action'] == 'login') {
  // 引入验证文件
  require "./include/index.func.php";
  // 检查验证码
  // $an->check_code($_POST['code'], $_SESSION['code']);
  
  // 收集数据
  $_clean = [];
  $_clean['id'] = check_email($_POST['id']);
  $_clean['psk'] = check_password($_POST['psk'], $_POST['psk'],6);
  check_login($_clean['id'], $_clean['psk'], 1,$conn);
  
}


if (@$_GET ['action'] == 'register') {
  // 引入验证文件
  require "./include/index.func.php";
 
  // 创建一个空数组用于存储合法数据
	$clean = [ ];
	// $clean ['uniqid'] = _check_uniqid ( $_POST ['uniqid'], $_SESSION ['uniqid'] );

	// 将过滤后form数据传入数组
	check_empty($_POST);
	// $clean ['active'] = _sha1_uniqid ();
//	$clean ['name'] = check_name ( $_POST ['name'], 2, 20 );
	$clean ['password'] = check_password ( $_POST ['setpsk'], $_POST ['confirmpsk'], 6 );
	$clean ['email'] = check_email ( $_POST ['setid'] );
	
	print_r($clean);
	// 检查身份信息是否已被注册
	// 在新增之前，要判断用户名是否重复
	_is_repeat ( "SELECT email FROM user WHERE id='{$_clean['email']}' LIMIT 1", '对不起，此用户已被注册' ,$conn);
	// 新增用户
	
	$conn->runSQL( "INSERT INTO user(		
											username,
											password,
											email
								) VALUES(
											'{$clean['name']}',
											'{$clean['password']}',
											'{$clean['email']}'
                )" );
               
	// _close ();
  session_destroy ();
 
	_location ( '恭喜你，注册成功！', './index.php' );
} 
?>

<html>

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./style/index.css" rel="stylesheet">
  <link rel="./stylesheet" href="./layui/css/layui.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/index.js"></script>
  <script src="./layui/layui.js"></script>
</head>


<body>
  <div class="notice">
    <p></p>
  </div>
  <div class="class1">
    <p>Login</p>
  </div>
  <div class="class2"></div>
  <div class="class3"></div>
  <div class="class4"></div>
  <div class="class5">

    <form action="index.php?action=login" class="login layui-form" method="post" style="display:none;">
      <dl>
        <dd  >
          用户名:
          <input type="text"  name="id" onclick=alarm('ID为注册电子邮箱') placeholder="电子邮箱">
        </dd>
        <dd>
          密 &nbsp 码:
          <input type="text" name='psk' placeholder="请输入密码" onclick=alarm('密码长度大于6位')>
        </dd>
        <dd>
          验证码:
          <input type="text" class="code" name="code" placeholder="输入右侧中的字符">
          <img src="include/captcha.php" class="captcha" />
        </dd>
      </dl>
      <input type="submit" value="Submit">
    </form>
    <form action="index.php?action=register" class="register  layui-form" method="post" style="display:none;">
      <dl>
        <dd>
          用户名:
          <input type="text" name="setid" onclick=alarm('请输入您的电子邮箱') placeholder="电子邮箱 " />
        </dd>
        <dd>
          密 &nbsp 码:
          <input type="password" name="setpsk"  onclick=alarm('密码长度大于6位') placeholder="设置您的密码" />
        </dd>
        <dd>
          确认密码:
          <input type="password" name="confirmpsk" placeholder="确认您的密码" />
        </dd>
        <dd>
          验证码:
          <input type="text" class="code" name="code" placeholder="请输入右侧中的字符">
          <img src="include/captcha.php" class="captcha"  />
        </dd>
      </dl>
      <input type="submit" value="Submit" />
      
    </form>
    
    <div class="close"></div>
    <a href="index.php" class="tab">没有账户？点此注册>>></a>
  </div>
  <div class="class6"></div>
  <div class="class7"></div>
  <div class="class8"></div>
  <div class="class9"></div>
  <div class="class10"></div>
  <div class="class11"></div>
  <div class="class12"></div>

</body>

<script>function rec() {
	var an = '<?php echo $code; ?>';
if(an == "null") {
	console.log("null");
	console.log("222");
} else {
	console.log(an);
	console.log("123");
}

}</script></html>

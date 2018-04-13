<?php
//************* */
//Author:YooHoeh
//Updata:2018.4.13
//RS:github.com/YooHoeh
//Version:1.3
//************ */



session_start();
include "./include/common.php";

// 登录状态
_login_state();

// 开始处理登录状态
if ('login' == $_GET['action']) {
    // 检查验证码
       check_code($_POST['code'], $_SESSION['code']);

    // 引入验证文件
    include 'include/index.func.php';
    
    // 收集数据
    $_clean = [];
    $_clean['id'] = check_ID($_POST['id']);
    $_clean['psk'] = check_password($_POST['psk'], 6);
}
if (@$_GET ['action'] == 'register') {
// 创建一个空数组用于存储合法数据
	$clean = [ ];
	// 这个存放入数据库的唯一标识符还有第二个用处，就是登录cookies验证
	$clean ['uniqid'] = _check_uniqid ( $_POST ['uniqid'], $_SESSION ['uniqid'] );
	// 将过滤后form数据传入数组
	// check_empty($_POST);
	$clean ['active'] = _sha1_uniqid ();
	$clean ['name'] = check_name ( $_POST ['name'], 2, 20 );
	$clean ['password'] = check_password ( $_POST ['password'], $_POST ['repassword'], 6 );
	$clean ['studentID'] = check_studentID ( $_POST ['studentID'] );
	$clean ['classID'] = check_classID ( $_POST ['classID'] );
	$clean ['major'] = check_string ( $_POST ['major'] );
	$clean ['tel'] = check_tel ( $_POST ['tel'] );
	$clean ['address'] = check_string ( $_POST ['address'] );
	$clean ['email'] = cheak_email ( $_POST ['email'] );
	$clean ['qq'] = check_qq ( $_POST ['qq'] );
	// print_r($clean);
	// 检查身份信息是否已被注册
	// 在新增之前，要判断用户名是否重复
	_is_repeat ( "SELECT st_ID FROM Student WHERE st_ID='{$_clean['studentID']}' LIMIT 1", '对不起，此用户已被注册' );
	// 新增用户
	
	_query ( "INSERT INTO Student(		
											st_name,
											st_password,
											st_ID,
								) VALUES(
																				
											'{$clean['name']}',
											'{$clean['password']}',
								)" );
	_close ();
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
          <input type="text" naem='psk' placeholder="请输入密码">
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
          <input type="password" name="psk" placeholder="设置您的密码" />
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

<script>
function rec() {
var an = '<?php echo $code; ?>';
if(an == "null"){
  console.log("null");
  console.log("222");
}else{
  console.log(an);
  console.log("123");
}
  

}
</script>
</html>

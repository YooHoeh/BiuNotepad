<?php
//************* */
//Author:YooHoeh
//Updata:2018.4.1
//RS:github.com/YooHoeh
//Version:1.3
//************ */

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

    <form action="main.html" class="login layui-form" method="post" style="display:none;">
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
    <form action="main.html" class="register  layui-form" method="post" style="display:none;">
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
if(an == "null"){//注意此处为"null"非null
  console.log("null");
  console.log("222");
}else{
  console.log(an);
  console.log("123");
}
  

}
</script>
</html>

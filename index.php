<?php
//************* */
//Author:YooHoeh
//Updata:2018.4.1
//RS:github.com/YooHoeh
//Version:1.3
//************ */


require 'include/captcha.class.php';
?>

<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style/index.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/index.js"></script>
</head>


<body>
  <div class="class1">
    <p>Login</p>
  </div>
  <div class="class2"></div>
  <div class="class3"></div>
  <div class="class4"></div>
  <div class="class5">

    <form action="index.php?action=login" class="login" method="post" style="display:none;">
      <dl>
        <dd>
          UserID:
          <input type="text" name="id" placeholder="           Type Your ID">
        </dd>
        <dd>
          Password:
          <input type="text" naem='psk' placeholder="   Tpye Your Passkey">
        </dd>
        <dd>
          verification code:
          <input type="text" class="code" name="code" placeholder="Tpye the code">
          <img src="include/captcha.php" class="captcha" style="width:120px;height:30px" />
        </dd>
      </dl>
      <input type="submit" value="Submit">
    </form>
    <form action="index.php?action=register" class="register" method="post" style="display:none;">
      <dl>
        <dd>
          UserID:
          <input type="text" name="setid" placeholder="Create Your Id " />
        </dd>
        <dd>
          Password:
          <input type="password" name="psk" placeholder="Set Your Password" />
        </dd>
        <dd>
          Type Again:
          <input type="password" name="confirmpsk" placeholder="Confirm Your Password" />
        </dd>
        <dd>
          verification code:
          <input type="text" class="code" name="code" placeholder="Tpye the code">
        </dd>
      </dl>
      <input type="submit" value="Submit" />
      <img src="include/captcha.php" class="captcha" style="width:120px;height:30px" />
      
    </form>
    
    <div class="close"></div>
    <a href="index.php" class="tab">No acount?To register>>></a>
  </div>
  <div class="class6"></div>
  <div class="class7"></div>
  <div class="class8"></div>
  <div class="class9"></div>
  <div class="class10"></div>
  <div class="class11"></div>
  <div class="class12"></div>
</body>

</html>
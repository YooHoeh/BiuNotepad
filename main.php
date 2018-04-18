<?php 
require './include/common.php';

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./layui/css/layui.css">
  <link href="./style/main.css" rel="stylesheet">
  <link rel="stylesheet" href="./style/im.css">
  <script src="./layui/layui.js"></script>

  <script src="./js/lrtk.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容响应式布局 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- webIM API -->
<script src="//cdn.ronghub.com/RongIMLib-2.3.0.js"></script>
<!-- 在线emoji库 -->
<script src="//cdn.ronghub.com/RongEmoji-2.2.6.min.js"></script> 

<script src="./libs/utils.js"></script>
<!-- 文件上传插件 -->
<script src="./libs/qiniu-upload.js"></script>

<script src="./js/template.js"></script>
<script src="./js/emoji.js"></script>
<script src="./js/im.js"></script>

  <title>Biu记事本</title>
</head>


<body>
  <div class="navbar">
    <div class="title">Biu记事本</div>
    <div class="middle-box">
      <div class="line"></div>
      <div class="date" id="date"></div>
      <div class="line line-rigth"></div>
    </div>
    <div class="contact">
      <i class="fa fa-share-alt"></i>
      <div class="contact-tooltip">
        <a href="" target="_blank">
          <i class="fa fa-qq"></i>
        </a>
        <a class="jiathis_button_weixin" target="_blank">
          <i class="fa fa-weixin">
            </i>
          </a>
          <a href="https://github.com/YooHoeh" target="_blank">
          <i class="fa fa-github"></i>
        </a>
      </div>
    </div>
    <div class="search">
      <input type="text" name="" id=""><a href="#"><i class="fa fa-search"></i></a>
    </div>
    <div class="user">
      <i class="fa fa-user"></i> 
      <div class="user-set">
       <a href="" ><i class= "fa fa-cog" ></i>个人中心</a>
        <a href='index.php'><i class="fa fa-sign-out"></i>注销账户</a>
      </div>
      </dl>
     </div>
    </div>
      <div class="layui-container main-container ">
        <div class="layui-row">
          
          <!-- 笔记列表 -->
          <div class="card todo layui-anim layui-anim-upbit ">
            <div class="card-header">
              <a href="edit.html">
                <i class="fa fa-window-maximize"></i>
              </a>
          <input id="new-item" type="text" disabled placeholder="笔记">
          <a class="btn-circle" id="btn-add">
            <span class="tooltip">添加笔记</span>
            <i id="plus" class="fa fa-plus"></i>
          </a>
        </div>
        <hr>
        <ul id="todoList" class="todo-list"></ul>
        <ul id="doneList" class="done-list"></ul>
        <a class="btn-circle done-show" id="doneShow" onclick="doneListShow()">
          <span class="tooltip">废纸篓</span>
          <i id="doneShowIcon" class="fa fa-trash"></i>
        </a>
        <a class="btn-circle done-hide" id="doneHide" onclick="doneListHide()">
          <i class="material-icons"></i>
        </a>
      </div>
      
      <!-- 随写板 -->
      <div class="card notes layui-anim layui-anim-upbit">
        <textarea id="notes" placeholder="随写板"></textarea>
      </div>
      
      <!-- 标签导航 -->
      <div class="card tags layui-anim layui-anim-upbit ">
          <a href="#" target="_blank">起名取名</a>
          <a href="#" target="_blank">宣传策划</a>
          <a href="#" target="_blank">网游试玩</a>
          <a href="#" target="_blank">宣传设计</a>
          <a href="#" target="_blank">配音配词</a>
          <a href="#" target="_blank">产品推广</a>
          <a href="#" target="_blank">网络营销</a>
          <a href="#" target="_blank">影视创作</a>
          <a href="#" target="_blank">照片美化</a>
        </div>
            
            <!-- 日历导航 -->
      <div class="card clender site-demo-laydate layui-anim layui-anim-upbit">
        <div class="layui-inline" id="clender"></div>
      </div>
      
    </div>
    <div class="hideNav">
      <i class= "totodo fa fa-book"></i>
      <i class= "totags fa fa-bookmark"></i>
      <i class= "tonote fa fa-sticky-note"></i>
      <i class= "toclender fa fa-calendar"></i>
      <i class= "tochat fa fa-comments-o"></i>
    </div>
  </div>
  <div id="rcs-app"></div>
</body>
</html>
<script>
  (function(){
    // var appKey = "lmxuhwaglie3d";
    // var token = "ZdpYZRXCQeFzRAIUu56rBfZpEJfeQ52I0XbfYS+wJqr5iFkez06FzGmboLbMY1oUabqaSmNNRXa07YQRnuTd7w==";
    var appKey = "3argexb6r934e";
    var token = "b/jvjEFD41TIVT0nsf9+L3ryPPkHsvRwWZV8SVI5ICcZ2I5Nl4OdNO01OjZxjjmVlD2dmk4RZ90=";
    RCS.init({
        appKey: appKey,
        token: token,
        target: document.getElementById('rcs-app'),
        showConversitionList: true,
        templates: {
            button: ['<div class="rongcloud-consult rongcloud-im-consult">',
                    '   <button onclick="RCS.showCommon()"><span class="rongcloud-im-icon">聊天</span></button>',
                    '</div>',
                    '<div class="customer-service" style="display: none;"></div>'].join('')//"templates/button.html",
            // chat: "templates/chat.html",
            // closebefore: 'templates/closebefore.html',
            // conversation: 'templates/conversation.html',
            // endconversation: 'templates/endconversation.html',
            // evaluate: 'templates/evaluate.html',
            // imageView: 'templates/imageView.html',
            // leaveword: 'templates/leaveword.html',
            // main: 'templates/main.html',
            // message: 'templates/message.html',
            // messageTemplate: 'templates/messageTemplate.html',
            // userInfo: 'templates/userInfo.html', 
        },
        extraInfo: {
            // 当前登陆用户信息
            userInfo: {
                name: "游客",
                grade: "VIP"
            },
            // 产品信息
            requestInfo: {
                productId: "123",
                referrer: "10001",
                define: "" // 自定义信息
            }
        }
    });
})()

</script>
<!-- header部分js -->
<script src="js/header.js"></script>
<!-- 日历部分js -->
<script src="js/clender.js"></script>
<!-- 微信分享api -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>

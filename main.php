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
  <script src="./layui/layui.js"></script>
  <script src="./js/lrtk.js"></script>
  <!-- 让IE8/9支持媒体查询，从而兼容响应式布局 -->
  <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        <dl class="layui-nav-child">
          <dd><a href="">账户设置</a></dd>
            <dd><a href="">注销</a></dd>
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
  </div>
</body>
</html>

<!-- header部分js -->
<script src="js/header.js"></script>
<!-- 日历部分js -->
<script src="js/clender.js"></script>
<!-- 微信分享api -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>

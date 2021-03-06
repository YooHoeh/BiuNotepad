<?php 
    require './include/common.php';
    require './include/labelClass.php';
    require './include/nbClass.php';
    require './include/noteClass.php';
    session_start();
//$arr_nb = nbClass::fristSearch(6,0);
//$arr_note = noteClass::fristSearch(6);
    /*$arr_mark = labelClass::fristSearch($_SESSION['userid']);
    $arr_nb = nbClass::fristSearch($_SESSION['userid']);
    $arr_note = noteClass::fristSearch($_SESSION['userid']);
     * ------------------------------------------------
     * 以上三行放这就行
     * ------------------------------------------------
     *
    foreach($arr_nb as $arr){
        $arr_note = noteClass::fristSearch($arr['id']);
        //输出$arr['bookName'];
        foreach($arr_note as $arr1){
            // 输出$arr1['concent'];
        }
    }
     *  ------------------------------------------------
     * 以上用于动态生成笔记本以及笔记，需要在哪生成就放哪
     *  ------------------------------------------------
     *
    foreach($arr_mark as $arr){
        //输出$arr1['markName'];
    }

     */
    // 放入废纸篓
    // _login_statu();
     if(isset($_GET['delenote'])){
         $note = noteClass::idSearch($_GET['delenote']);
         if($note['isdelete'] ==0){
             if ($conn->update('note',"isdelete = '1'","id='$_GET[delenote]'") == 1){
                 _location('放入废纸篓成功！','main.php');
             }else{
                    _location('删除失败！','main.php');
                    print_r($note);
            }
        }else{
                if ($conn->update('note',"isdelete = '0'","id='$_GET[delenote]'") == 1){
                     _location('恢复成功！','main.php');
                }else{
                        _location('恢复失败！','main.php');
                }
         }
     }
    //  添加标记
     if(isset($_GET['starnote'])){
         $note = noteClass::idSearch($_GET['starnote']);
     	if($note['isStart'] == 1) {
     		 if ($conn->update('note',"isStart='0'","id='$_GET[starnote]'") == 1){
        	_location('取消标记成功！','main.php');
      	 	}else{
        	_location('取消标记失败！','main.php');
            }
     	}else{
     		if ($conn->update('note',"isStart = '1'","id='$_GET[starnote]'") == 1){
        		_location('标记成功！','main.php');
        	}else{
        	_location('标记失败！','main.php');
            }
        }

     }
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
    <script src="./js/jquery.min.js"></script>

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

    <link rel="shortcut icon" href="biuicon.ico">
    <title>Biu记事本</title>
</head>


<body>
    <!-- 导航栏部分 -->
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
            <input type="text" name="search" id="search_text" placeholder="笔记本、笔记、标签...">
            <a href="" id="search_a">
                <i class="fa fa-search" onclick="_onclick()"></i>
            </a>
        </div>

        <div class="user">
            <i class="fa fa-user" ></i>
            <div class="user-set">
                <a class="openuser">
                    <i class="fa fa-address-card"></i>个人中心</a>
                <a class="openpsk">
                    <i class="fa fa-cog"></i>密码修改</a>
                <a href='index.php'>
                    <i class="fa fa-sign-out"></i>注销账户</a>
            </div>
            </dl>
        </div>
    </div>
    <div class="userView layui-anim layui-anim-up ">
        <iframe  frameborder="0"></iframe>
        <div class="close"></div>

    </div>
    <div class="layui-container main-container ">
        <div class="layui-row">

            <!-- 笔记列表 -->
            <div class="card todo layui-anim layui-anim-upbit ">
                <div class="card-header">
                    <a href="main.php">
                        <i class="fa fa-list-ul"></i>
                    </a>
                    <input id="new-item" type="text" disabled placeholder="笔记">
                    <a class="btn-circle" id="btn-add" href="edit.php">
                        <span class="tooltip">添加笔记</span>
                        <i id="plus" class="fa fa-plus"></i>
                    </a>
                </div>
                <hr>
                <div id="search_re">
                    <?php
                    $icon = "<div class='iconBar'><a href=''><i class='fa fa-star-o'></i></a><a><i class='fa fa-bell-o'></i></a><a href=''><i class='fa fa-trash-o'></i></a></div>";
                    //循环生成笔记和笔记本
                    //控制显示何种笔记和笔记本
                    if (1 != $_GET['delete'] && null == $_GET['mark'] && isset($_GET['date'])!=1) {
                      if (null == $_GET['search_text']) {//不执行搜索---默认显示方式
                          $arr_nb = nbClass::fristSearch($_SESSION['userid']);
                          foreach ($arr_nb as $key=>$arr) {
                              $arr_note = noteClass::notebookFristSearch($_SESSION['userid'], $arr['id']);
                              echo "<div class='notebook'>".$arr['bookName'];
                              //输出$arr['bookName'];
                              if(count($arr_note) == 0){
                                echo "<div class='noticep'>该笔记本下无笔记</div>";
                                $key++;   
                             }
                              foreach ($arr_note as $key1=>$arr1) {
                             
                                  echo "<div class='note'><a href='edit.php?id=".$arr1['id']."'>".$arr1['content'].'</a><span>'.$arr1['createTime'].'</span>'.$icon.'</div>';
                                  
                                  ?>
                                  <!-- 将有标记的笔记加实心五角星 -->
                                  <script>
                                      var bar =  document.getElementsByClassName('iconBar');
                                          if(<?php echo $arr1['isStart'];?> == '1'){
                                          console.log('第'+<?php echo $key1+count($key1)?>);
                                          var star = bar[<?php echo $key1+count($key1)?>].getElementsByTagName('i')[0];
                                          star.setAttribute('class','fa fa-star-o star');
                                          }   
                                    </script>
                                  <?php
                                  // 输出$arr1['content'];
                              }
                              echo '</div>';
                          }
                      } else {//执行搜索--模糊查询结果
                          $arr_nb = nbClass::Search($_SESSION['userid'], $_GET['search_text']);
                          $arr_note = noteClass::Search($_SESSION['userid'], $_GET['search_text']);
                          if (null != $arr_nb) {
                              echo "<div  class='notebook'>笔记本</div>";
                              foreach ($arr_nb as $arr) {
                                  echo "<div class='note'><a href=''>".$arr['bookName'].'</a></div>';
                              }
                          }else {
                            echo "<p  class='notice' >搜索笔记本为空</p>";
                          }
                          if (null != $arr_note) {
                              echo "<div class='notebook'>笔记</div>";
                              foreach ($arr_note as $arr) {
                                  echo "<div class='note'><a href=''>".$arr['content'].'</a><span>'.$arr['createTime'].'</span>'.$icon.'</div>';
                              }
                          }else {
                            echo "<p  class='notice' >搜索笔记为空</p><p class='notice'><a href='edit.php'><i class='fa fa-plus-circle'></i></a></p>";
                        }
                          
                      }
                  } else if (1 == $_GET['delete'] && null == $_GET['mark']) {//查看废纸篓
                      $arr_nb = nbClass::Search($_SESSION['userid'], $_GET['search_text'], 1);
                      $arr_note = noteClass::Search($_SESSION['userid'], $_GET['search_text'], 1);
                      if (null != $arr_nb) {
                          echo "<div class='notebook'>笔记本</div>";
                          foreach ($arr_nb as $arr) {
                              echo "<div class='note'><a href=''>".$arr['bookName'].'</a></div>';
                          }
                      }
                      if (null != $arr_note) {
                          echo "<div class='notebook'>笔记</div>";
                          foreach ($arr_note as $arr) {
                              echo "<div class='note'><a href='edit.php?id=".$arr['id']."'>".$arr['content'].'</a><span>'.$arr['createTime'].'</span>'.$icon.'</div>';
                          }
                      }else {
                        echo "<p  class='notice' >废纸篓笔记为空</p>";
                      }
                  } else if (null != $_GET['mark']) {//用标签搜索
                      $arr_nb;
                      $arr_note = labelClass::markSearch($_SESSION['userid'], $_GET['mark']);
                      if (null != $arr_note) {
                          echo "<div class='notebook'>笔记</div>";
                          foreach ($arr_note as $arr) {
                              echo "<div class='note'><a href=''>".$arr['content'].'</a><span>'.$arr['createTime'].'</span>'.$icon.'</div>';
                          }
                      }else {
                        echo "<p  class='noticep' >该标签下无笔记</p>";
                    }
                  }else if( isset($_GET['date'])){
                    $arr_nb;
                    $arr_note = noteClass::notetimeSearch($_GET['date']);
                    if (null != $arr_note) {
                        echo "<div class='notebook'>笔记</div>";
                        foreach ($arr_note as $arr) {
                            echo "<div class='note'><a href=''>".$arr['content'].'</a><span>'.$arr['createTime'].'</span>'.$icon.'</div>';
                        }
                    }else {
                      echo "<p  class='noticep' >该时间下无笔记</p>";
                  }
                  }
                  ?>
                </div>

                <a href="" class="btn-circle done-show" id="doneShow" onclick="_onclickDe()">
                    <span class="tooltip">废纸篓</span>
                    <i id="doneShowIcon" class="fa fa-trash"></i>
                </a>
            </div>

            <!-- 随写板 -->
            <div class="card notes layui-anim layui-anim-upbit">
                <textarea id="notes" placeholder="随写板"></textarea>
            </div>

            <!-- 标签导航 -->
            <div class="card tags layui-anim layui-anim-upbit ">
                <?php
          $num = 0;
          $arr_mark = labelClass::fristSearch($_SESSION['userid']);
          foreach ($arr_mark as $arr1) {
              echo ' <a href=""  id="mark'.$num.'" onclick="markSearch(\'mark'.$num.'\')">'.$arr1['markName'].'</a>';
              ++$num;
          }

            ?>

            </div>

            <!-- 日历导航 -->
            <div class="card clender layui-anim layui-anim-upbit">
                <div class="layui-inline" id="clender"></div>
            </div>

        </div>
        <div class="hideNav">
            <i class="totodo fa fa-book hideicon">
                <p>笔记</p>
            </i>
            <i class="tonote fa fa-sticky-note hideicon">
                <p>随写板</p>
            </i>
            <i class="totags fa fa-bookmark hideicon">
                <p>标签</p>
            </i>
            <i class="toclender fa fa-calendar hideicon">
                <p>日历</p>
            </i>
            <!-- <i class= "tochat fa fa-comments-o"></i> -->
        </div>
    </div>
    <div id="rcs-app"></div>
</body>

</html>
<script src="./js/main.js"></script>
<!-- header部分js -->
<script src="js/header.js"></script>
<!-- 日历部分js -->
<script src="js/clender.js"></script>
<!-- 微信分享api -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- 融云WEBIM -->
<script>
    (function () {
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

<script>
    function _onclick() {
        var a = document.getElementById("search_text").value;
        if (<?php if (0 == $_GET['delete']) {
            echo 'true';
        } else {
            echo 'false';
        }?>) {
            document.getElementById('search_a').href = "main.php?search_text=" + a;
        }else {
            document.getElementById('search_a').href = "main.php?search_text=" + a + "&&delete=1";
        }

        // document.getElementById('search_re').style.display = "block";
    }
    function _onclickDe() {
        if (<?php if (1 != $_GET['delete']) {
            echo 'true';
        } else {
            echo 'false';
        }?>) {
            document.getElementById('doneShow').href = "main.php?delete=1";
        }
        else {
            document.getElementById('doneShow').href = "main.php";
        }
    }

    function markSearch(markid) {
        var a = document.getElementById(markid).innerText;
        document.getElementById(markid).href = "main.php?mark=" + a;
    }
    function toedit(id) {
        var a = document.getElementById("id").value;
        document.getElementById('search_a').href = "edit.php?search_text=" + a;
    }

</script>
<script>


// 笔记根据状态修改图标
// function setNoteIcon(){
//     var bar =  document.getElementsByClassName('iconBar');
//     for(let i=0; i<bar.length;i++){
//         var a = bar[i].parentNode.getElementsByTagName('a')[0];
//         var id = a.getAttribute('href').substring(12);
//         var star = bar[i].getElementsByClassName('fa-star-o')[0];
//         var del = bar[i].getElementsByClassName('fa-trash-o')[0];


//     }
// }


// 随写板部分
var notes = (document.getElementById("notes"));
if (localStorage.getItem("noteData")) {
  var noteData = localStorage.getItem("noteData");
}
else {
  var noteData = "";
}
notes.value = noteData;
notes.oninput = function(){noteDataObjectUpdated();
};
function noteDataObjectUpdated(){
  noteData = notes.value;
  console.log(noteData);
  localStorage.setItem("noteData", noteData);
}
</script>

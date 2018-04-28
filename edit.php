<?php
require "./include/database.php";
require "./include/labelClass.php";
require "./include/nbClass.php";
require "./include/noteClass.php";
require './include/func.php';
session_start();
//$note = $arr();

//新建笔记本
if ($_GET['newnotebook']!=null){
    if(nbClass::nbexist($_SESSION['userid'],$_GET['newnotebook'])!=null){//如果笔记本存在
        _location ( '该笔记本已存在！',edit.php );
    }else{
        new nbClass($_SESSION['userid'],$_GET['newnotebook']);
    }

}
//新建标签
if ($_GET['newlabel']!=null){
    if(labelClass::markexist($_SESSION['userid'],$_GET['newlabel'])!=null){//如果标签存在
        _location ( '该标签已存在！',edit.php );
    }else{
        new labelClass($_SESSION['userid'],$_GET['newlabel']);
    }

}

//加星标记
if ($_GET['_value']!=null){
    if(noteClass::getStart($_SESSION['userid'],$_GET['_value'])==1){
        noteClass::isStart($_SESSION['userid'],$_GET['_value'],0);
    }else{
        noteClass::isStart($_SESSION['userid'],$_GET['_value']);
    }
}

?>



<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Edit</title>
		<link rel="stylesheet" href="style/css.css" media="all">
		<!-- <link href="style/font-awesome.min.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<link rel="stylesheet" href="style/layui.css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="./js/jquery-3.2.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/layui.js"></script>
		<link rel="shortcut icon" href="biuicon.ico" type="image/x-icon">
		<title>Biu记事本</title>
	</head>

	<body>
		<!-- 导航栏部分  -->
		<div class="navbaraa">
			<div class="title">
				Biu笔记本
			</div>
			<div class="middle-box">
				<div class="line"></div>
				<div class="date" id="date"></div>
				<div class="line line-rigth"></div>
			</div>
			<div class="user">
				<a href="main.php">
					<i class="fa fa-home"></i>
				</a>
			</div>
			<div class="link">
				<div class="link1">
					<i class="fa fa-bell fa-lg"></i>
				</div>
				<div class="link1">
					<i class="fa fa-info-circle fa-lg"></i>
				</div>
				<div class="link1">
                    <a href="" id="isStart" style="color: white"><i class="fa fa-star fa-lg" onclick="isStart()"></i></a>
				</div>
				<div class="link1">
                    <a href="" id="deCon" style="color: white"><i class="fa fa-trash fa-lg" onclick="deContent()"></i></a>
				</div>
				<div class="link1">
					<i class="fa fa-share-alt fa-lg"></i>
				</div>
			</div>
		</div>


		<div class="edit">
			<div class="active layui-anim layui-anim-scale">
				<div class="note01" style="font-size: 32px;">
					笔记薄
					<div class="notebook">
						<div class="panel-group" id="accordion">
							<?php
							
                                if($_GET['newV']!=null){
									if($_GET['oldV']!=undefined){
										noteClass::updateNote($_SESSION['userid'],$_GET['oldV'],$_GET['newV']);
										_location('笔记更新成功！','edit.php');
									}else{
										new noteClass($_SESSION['userid'],$_GET['newV'],$_GET['style']);
										_location('新建笔记成功！','edit.php');
									}
									
                                }
                                if($_GET['deContent']!=null){
									noteClass::deNote($_SESSION['userid'],$_GET['deContent']);
									_location('笔记删除成功！','edit.php');
                                }
                                //noteClass::updateNote(1,$_GET['oldV'],$_GET['newV']);
                                $num = 0;
                                 $arr_nb = nbClass::fristSearch($_SESSION['userid']);
                                foreach ($arr_nb as $arr) {

                                    echo "<div class=\"panel panel-default\">
                                    <div class=\"panel-heading\" role=\"tab\" id=\"heading".$num."\">";

                                        $arr_note = noteClass::notebookFristSearch($_SESSION['userid'],$arr['id']);
                                        echo "<h4 class=\"panel-title\" style='font-size: 18px'>
                                            <a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$num."\" aria-expanded=\"false\" aria-controls=\"collapse".$num."\">
                                                " . $arr['bookName'] . "
                                            </a></h4>";

                                        echo "</div>
                                    <div id=\"collapse".$num."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading".$num."\">
                                        <div class=\"panel-body\" style='font-size: 14px'>";
										
										foreach ($arr_note as $arr1) {
											echo "<a role=\"button\" onclick='innerHtml(\"".$arr1['content']."\",\"".noteClass::getStart($_SESSION['userid'],$arr1['content'])."\")'noteid=".$arr1['id'].">".$arr1['content']."</a ><br><br>";
										}
										
                                        echo "</div>
                                    </div>
									</div>";
                                $num++;
							}
                            ?>
						</div>
					</div>
				</div>
			</div>
			<!-- 功能部分  -->
			<div class="function">
				<div class="icon1">
					<i id="icon01" class="fa fa-bold fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon02" class="fa fa-italic fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon03" class="fa fa-underline fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon04" class="fa fa-strikethrough fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon05" class="fa fa-align-left fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon06" class="fa fa-align-center fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon07" class="fa fa-align-right fa-lg"></i>
				</div>
				<div class="icon1">
					<i class="fa fa-list-ul fa-lg"></i>
				</div>
				<div class="icon1">
					<i class="fa fa-list-ol fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon10" class="fa fa-link fa-lg"></i>
				</div>

				<div class="icon1">
					<i class="fa fa-check-square-o fa-lg"></i>
				</div>
				<div class="icon1">
					<i id="icon13" class="fa fa-table fa-lg"></i>
				</div>
				<div class="affix01">
					<select class="affix ">
						<option value="font">字体类型</option>
						<option value="font1" id="font01">宋体</option>
						<option value="font2" id="font02">Work Sans</option>
						<option value="font3" id="font03">微软雅黑</option>
					</select>
					<!--</div>-->

					<!--<div>-->
					<select class="affix">
						<option value="size">字体大小</option>
						<option value="14" id="size01">small</option>
						<option value="18" id="size02">medium</option>
						<option value="20" id="size03">large</option>
					</select>

					<div id="test">
						<input type="file" id="fileMutiply" name="files" multiple="multiple">
					</div>
				</div>
				<div class="save">
                    <a href="" id="get_newV"><i class="fa fa-save fa-2x" onclick="update()"></i></a>
				</div>
			</div>


			<!-- 笔记本部分 -->
			<div class="note02 layui-anim layui-anim-scale">
				<div>
					<select id="newopt">
                        <?php
                        $arr_nb = nbClass::fristSearch($_SESSION['userid']);
                        $num = 0;
                        foreach($arr_nb as $arr1){
							echo '<option value="nb'.$num.'">'.$arr1["bookName"].'</option>';
                            $num++;
                        }
                        ?>
					</select>
					<br>
					<span>新笔记:</span>
                    <form method="get" action="edit.php">
                        <input type="text" name="newnotebook" placeholder="新笔记本" id="label">
                        <br><input class="notebutton" value="Add" type="submit">
                    </form>
				</div>
			</div>
			<div class="label layui-anim layui-anim-scale">
				<div>
					<select id="newopt">
                        <?php
                        $arr_mark = labelClass::fristSearch($_SESSION['userid']);
                        $num = 0;
                        foreach($arr_mark as $arr1){
							echo '<option value="label'.$num.'">'.$arr1["markName"].'</option>';
                            $num++;
                        }
                        ?>


					</select>
					<br>
						<!-- 标签部分 -->
					<span>新标签:</span>
                    <form method="get" action="edit.php">
                        <input type="text" name="newlabel" placeholder="新标题" id="label">
                        <br><input class="labelbutton" value="Add" type="submit">
                    </form>
				</div>
			</div>


		<!-- 写笔记部分  -->
			<div class="hr"></div>
			<textarea id="content" class="layui-anim layui-anim-scale" >
				<?php if (isset($_GET['id']) ) {
						$arr = noteClass::idSearch($_GET['id']);
						echo $arr['content'];
					}
					?>
				
			</textarea>
			<script> document.getElementById('content').setAttribute('style',"<?php echo $arr['style']?> ");</script>
		</div>


		<!-- 评论部分 -->
		<div class="comment">
			<div class="comment01">
				请开始你的评论→_→
			</div>
		</div>
		<!-- 文档信息弹窗 -->
		<div class="userView layui-anim layui-anim-up ">
        	<iframe  frameborder="0" src="documentInfo.php"></iframe>
       		<div class="close">
		</div>
	</body>
	<!-- header部分js -->
	<script src="js/header.js"></script>
	<!-- function部分js -->
	<script src="js/function.js"></script>
	<!-- notebook部分js -->
	<!--文件上传-->
	<script src="js/updatafile.js"></script>
    <script>
		var oldV;
		var str;
        function innerHtml(text,a) {

            document.getElementById("content").innerHTML =text;
            if (a==1){
                document.getElementById("isStart").style.color = "#1483d4";
            }else{
                document.getElementById("isStart").style.color = "white";
			}
			
			oldV = text;
			// noteClass::idSearch()
			document.getElementsByTagName('iframe')[0].setAttribute('src','documentInfo.php?content='+oldV);
			
        }
        function update() {
			var newV = document.getElementById("content").value;
			var style = document.getElementById("content").getAttribute('style');
            document.getElementById("get_newV").href = "edit.php?oldV="+oldV+"&newV="+newV+'&style='+style;
        }
        function deContent() {
            var de = document.getElementById("content").value;
            document.getElementById("deCon").href = "edit.php?deContent="+de;
        }
        function isStart() {
            var _value = document.getElementById("content").value;
            document.getElementById("isStart").href = "edit.php?_value="+_value;
		}



	   DocInfoWindow();
    </script>


</html>
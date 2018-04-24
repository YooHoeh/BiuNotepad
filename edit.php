<?php
require "./include/database.php";
require "./include/labelClass.php";
require "./include/nbClass.php";
require "./include/noteClass.php";
$arr_mark = labelClass::fristSearch(4);
$arr_nb = nbClass::fristSearch(4);
$arr_note = noteClass::fristSearch(4);
//$note = $arr();

//新建笔记本
if ($_GET['newnotebook']!=null){
    if(nbClass::nbexist(4,$_GET['newnotebook'])!=null){//如果笔记本存在

    }else{
        new nbClass(4,$_GET['newnotebook']);
    }

}
//新建标签
if ($_GET['newlabel']!=null){
    if(labelClass::markexist(4,$_GET['newlabel'])!=null){//如果标签存在

    }else{
        new labelClass(4,$_GET['newlabel']);
    }

}
//修改并保存笔记
if ($_GET['newlabel']!=null){
    if(labelClass::markexist(4,$_GET['newlabel'])!=null){//如果标签存在

    }else{
        new labelClass(4,$_GET['newlabel']);
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
		<!-- <script src="js/layui.js"></script> -->
	</head>

	<body>
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
				<a href="index.php">
					<i class="fa fa-user"></i>
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
					<i class="fa fa-star fa-lg"></i>
				</div>
				<div class="link1">
					<i class="fa fa-trash fa-lg"></i>
				</div>
				<div class="link1">
					<i class="fa fa-share-alt fa-lg"></i>
				</div>
			</div>
		</div>

		<!-- 导航栏部分  -->

		<div class="edit">
			<div class="active">
				<div class="note01" style="font-size: 32px;">
					笔记薄
					<div class="notebook">
						<div class="panel-group" id="accordion">
                            <?php
                                if($_GET['oldV']!=null&&$_GET['newV']!=null){
                                    noteClass::updateNote(4,$_GET['oldV'],$_GET['newV']);
                                }
                                if($_GET['deContent']!=null){
                                    noteClass::deNote(4,$_GET['deContent']);
                                }
                                //noteClass::updateNote(4,$_GET['oldV'],$_GET['newV']);
                                $num = 0;
                                foreach ($arr_nb as $arr) {

                                    echo "<div class=\"panel panel-default\">
                                    <div class=\"panel-heading\" role=\"tab\" id=\"heading".$num."\">";

                                        $arr_note = noteClass::notebookFristSearch(4,$arr['id']);
                                        echo "<h4 class=\"panel-title\" style='font-size: 18px'>
                                            <a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$num."\" aria-expanded=\"false\" aria-controls=\"collapse".$num."\">
                                                " . $arr['bookName'] . "
                                            </a></h4>";

                                        echo "</div>
                                    <div id=\"collapse".$num."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading".$num."\">
                                        <div class=\"panel-body\" style='font-size: 14px'>";

                                    foreach ($arr_note as $arr1) {
                                        echo "<a role=\"button\" onclick='innerHtml(\"".$arr1['content']."\")'>".$arr1['content']."</a ><br><br>";
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

			<!-- 功能部分  -->

			<!-- 笔记本部分 -->
			<div class="note02">
				<div>
					<select id="newopt">
                        <?php
                        $arr_nb = nbClass::fristSearch(4);
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
			<div class="label">
				<div>
					<select id="newopt">
                        <?php
                        $arr_mark = labelClass::fristSearch(4);
                        $num = 0;
                        foreach($arr_mark as $arr1){
                            echo '<option value="label'.$num.'">'.$arr1["markName"].'</option>';
                            $num++;
                        }
                        ?>


					</select>
					<br>
					<span>新标签:</span>
                    <form method="get" action="edit.php">
                        <input type="text" name="newlabel" placeholder="新标题" id="label">
                        <br><input class="labelbutton" value="Add" type="submit">
                    </form>
				</div>
			</div>

			<!-- 标签部分 -->

			<div class="hr"></div>
			<textarea id="content"></textarea>
		</div>

		<!-- 写笔记部分  -->

		<div class="comment">
			<div class="comment01">
				请开始你的评论→_→
			</div>
		</div>

		<!-- 评论部分 -->

	</body>
    <script>
        var oldV;
        function innerHtml(text) {
            document.getElementById("content").innerHTML =text;
            oldV = text;
        }
        function update() {
            var newV = document.getElementById("content").value;
            document.getElementById("get_newV").href = "edit.php?oldV="+oldV+"&newV="+newV;
        }
        function deContent() {
            var de = document.getElementById("content").value;
            document.getElementById("deCon").href = "edit.php?deContent="+de;
        }

    </script>

	<!-- header部分js -->
	<script src="js/header.js"></script>
	<!-- function部分js -->
	<script src="js/function.js"></script>
	<!-- notebook部分js -->
	<!--文件上传-->
	<script src="js/updatafile.js"></script>
	<!-- <script src="js/jquery-3.2.0.min.js"></script> -->

</html>
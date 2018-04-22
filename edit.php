<?php 
	require "./include/labelClass.php";
	require "./include/nbClass.php";
	require "./include/noteClass.php";
	$arr_mark = labelClass::fristSearch(4);
	$arr_nb = nbClass::fristSearch(4,0);
	$arr_note = noteClass::fristSearch(4);
	//$note = $arr();

?>

<!DOCTYPE html>
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

	</head>
	<body>
		<div class="navbar">
    		<div class="title">Biu笔记本</div>
   		 	<div class="middle-box">
      			<div class="line"></div>
      			<div class="date" id="date"></div>
      			<div class="line line-rigth"></div>
    		</div>
    		<div class="user">
      			<a href="index.php" style="color: white"><i class="fa fa-user" style="padding-top: 12px"></i></a>
    		</div>
    		<div class="link">
				<div class="link1">
                    <a href="" onclick="" id="" style="color: white"><i class="fa fa-bell fa-lg"></i></a>
				</div>
				<div class="link1">
                    <a href="" onclick="" id="" style="color: white"><i class="fa fa-info-circle fa-lg"></i></a>
				</div>
				<div class="link1">
                    <a href="" onclick="" id="" style="color: white"><i class="fa fa-star fa-lg"></i></a>
				</div>
				<div class="link1">
                    <a href="" onclick="deContent()" id="deCon" style="color: white"><i class="fa fa-trash fa-lg"></i></a>
				</div>
				<div class="link1">
                    <a href="" onclick="" id="" style="color: white"><i class="fa fa-share-alt fa-lg"></i></a>
				</div>
		    </div>
  		</div>
		<div class="edit">

			<fieldset class="active" style="overflow: visible;">
				<div class="note01">笔记薄</div>
				<div class="notebook" style="overflow: auto;height: 400px;">
					<div class="panel-group" id="accordion">
				<?php
                if($_GET['oldV']!=null&&$_GET['newV']!=null){
                    noteClass::updateNote(4,$_GET['oldV'],$_GET['newV']);
                }
                if($_GET['deContent']!=null){
                    noteClass::deNote(4,$_GET['deContent']);
                }
                    //noteClass::updateNote(4,$_GET['oldV'],$_GET['newV']);

                //生成左边笔记本和笔记
					$num = 0;
					foreach($arr_nb as $arr){
						$arr_note = noteClass::notebookFristSearch(4,$arr['id']);
						//输出$arr['bookName'];
						
				  		echo '<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading'.$num.'">
						
						
					  		<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$num.'" aria-expanded="false" aria-controls="collapseOne">
						 	 		'.$arr['bookName'].'
								</a>
					  		</h4>
						</div>
				
				
				
						<div id="collapse'.$num.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$num.'">
					  		<div class="panel-body">';
					  	foreach($arr_note as $arr1){
									// 输出$arr1['concent'];
							echo "<a role=\"button\" onclick='innerHtml(\"".$arr1['content']."\")'>".$arr1['content']."</a><br><br>";
				  		}
						echo '</div>
						</div>';
						echo '</div>';
						$num++;
					}
		  		?>
				</div>
				</div>
			</fieldset>

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
					<i class="fa fa-link fa-lg"></i>
				</div>
				<div class="icon1">
					<i class="fa fa-paperclip fa-lg"></i>
				</div>
				<div class="icon1">
					<i class="fa fa-check-square-o fa-lg"></i>
				</div>
				<div class="icon1">
					<i class="fa fa-table fa-lg"></i>
				</div>
				<div>
					<select class="affix">
						<option value="font">字体类型</option>
						<option value="font1" id="font01">宋体</option>                                                                   
						<option value="font2" id="font02">Work Sans</option>
						<option value="font3" id="font03">arial black</option>
					</select>
				</div>
			
				<div>
					<select class="affix">
						<option value="size">字体大小</option>
						<option value="14" id="size01">small</option>
						<option value="18" id="size02">medium</option>
						<option value="20" id="size03">large</option>
					</select>
				</div>

                <div id="test">
                    <input type="file" id="fileMutiply" name="files" multiple="multiple">
                </div>

				<div class="save">
					<a href="" id="get_newV"><i class="fa fa-save fa-2x" onclick="update()"></i></a>
				</div>
			</div>
		
        	<div class="label">
            <fieldset>
            <select id="newopt">

                <?php
                if ($_GET['newlabel']!=null){
                    new labelClass(4,$_GET['newlabel']);
                }
                $arr_mark = labelClass::fristSearch(4);
                $num = 0;
                foreach($arr_mark as $arr1){
                    echo '<option value="label'.$num.'">'.$arr1["markName"].'</option>';
                    $num++;
                }
                ?>
				<!--<option value="label">标签</option>
				<option value="label1">标签1</option>
				<option value="label2">标签2</option>
				<option value="label3">标签3</option>-->

			</select>
			<br><span>新标签:</span>
                <form method="get" action="edit.php">
                    <input type="text" name="newlabel" placeholder="新标题" id="label">
                    <br><input class="button" value="Add" type="submit">
                </form>

            </div>
			</div>
			<div class="hr">
			</div>
			<span class="title11"><b>标题:</b>
			<input type="text" name="title" placeholder="在此输入标题"></input></span>
			<textarea id="content" placeholder="在此输入......"></textarea>
			
        </div>
        <div class="comment">
            <div class="comment01">请开始你的评论→_→</div>
        </div>

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
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
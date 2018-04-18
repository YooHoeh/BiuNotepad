<?php 
	require "./include/labelClass.php";
	require "./include/nbClass.php";
	require "./include/noteClass.php";
	$arr_mark = labelClass::fristSearch(6);
	$arr_nb = nbClass::fristSearch(6,0);
	$arr_note = noteClass::fristSearch(6);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Edit</title>
		<link rel="stylesheet" href="style/css.css" media="all">
		<link href="style/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="style/bootstrap.min.css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
      			<a href="index.php"><i class="fa fa-user"></i></a>
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
				<select>
					<option value="font">字体类型</option>
					<option value="font1" id="font01">宋体</option>                                                                   
					<option value="font2" id="font02">Work Sans</option>
					<option value="font3" id="font03">arial black</option>
				</select>
			</div>
			
			<div>
				<select>
					<option value="size">字体大小</option>
					<option value="14" id="size01">small</option>
					<option value="18" id="size02">medium</option>
					<option value="20" id="size03">large</option>
				</select>
			</div>
			<div class="save">
				<i class="fa fa-save fa-2x">Save</i>
			</div>
		</div>
		<div class="edit">
		<div class="notebook">
			<div class="panel-group" id="accordion">
				
				<?php
					$num = 0;
					foreach($arr_nb as $arr){
						$arr_note = noteClass::notebookFristSearch(6,$arr['id']);
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
							echo "<a>".$arr1['content']."</a><br/>";
							echo '<a>笔记1</a>';
				  		}
						echo '</div>
						</div>';
						echo '</div>';
						$num++;
					}
		  		?>
	  		<!--
              	作者：offline
              	时间：2018-04-17
              	描述：
              <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
		  		<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			  			笔记本2
					</a>
		  		</h4>
				</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		  		<div class="panel-body">
					<a>笔记1</a>
					<a>笔记2</a>
					<a>笔记3</a>
		  		</div>
			</div>
	  		</div>
	  		<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
		  			<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			  				笔记本3
						</a>
		  			</h4>
				</div>-->
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		  		<div class="panel-body">
					<a>笔记1</a>
					<a>笔记2</a>
					<a>笔记3</a>
		  		</div>
				</div>
	  			</div>
			</div>
        	<div class="label">
            <fieldset>
            <select id="newopt">
            	<?php
	            	foreach($arr_mark as $arr){
	            		echo '<option value="'.$arr['markName'].'">'.$arr['markName'].'</option>';
						//输出$arr1['markName'];
					}
            	?>
				<option value="label">标签</option>
				<option value="label1">标签1</option>
				<option value="label2">标签2</option>
				<option value="label3">标签3</option>
				<optgroup label="在此输入新标签"></optgroup>
			</select>
			<br><span>新标签:</span>
			<input type="text" name="newlabel" placeholder="新标题" id="label"></input>
			<br><button class="button" onclick="labelFunction()">Add</button>
			</fieldset>
			</div>
			<span class="title11"><b>标题:</b>
			<input type="text" name="title" placeholder="在此输入标题"></input></span>
			<textarea id="content">
				请输入...
			</textarea>
        </div>
	</body>
<!-- header部分js -->
<script src="js/header.js"></script>
<!-- function部分js -->
<script src="js/function.js"></script>
<!-- notebook部分js -->
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
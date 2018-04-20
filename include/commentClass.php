<?php
	include_once "database.php";
	header('content-type:text/html;charset=utf-8');
	class commentClass{
		
		public function __construct($userid,$noteid,$content){
			$con = new connetMysqli();
			$sql = "insert into comment (userid,noteid,content) values($userid,$noteid,$content)";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		//删除
		public static function deleteCommment($userid,$noteid,$content){
			$con = new connetMysqli();
			$sql = "select id from comment where userid = '$userid' and noteid = '$noteid' and content = '$content'";
			$arr = $con->getRow($sql);
			$con->delete("comment", 'id ='.$arr['id']);
			$con->closeLink();
		}
		//---------------------------------------------------------------	
		
		//查找方法
		//按时间查找--降序
		public static function timeSearch($noteid){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select username,comment.createTime,comment.content from comment,user where noteid = $noteid and user.id = comment.userid order by comment.createTime desc";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
	}
	
	//new commentClass(4,4,"234");
	//commentClass::deleteCommment(4, 4, "234");
	/*$arr = commentClass::timeSearch(4);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";*/
?>
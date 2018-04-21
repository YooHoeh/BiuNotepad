<?php
	header('content-type:text/html;charset=utf-8');
	class nbClass{
		
		public function __construct($userid,$bookName,$isStart = 0){
			$con = new connetMysqli();
			$sql = "insert into notebook (userid,bookName,isStart) values($userid,$bookName,$isStart)";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		//修改笔记本名称
		
		public static function updateNb($userid,$bookName,$newNbName){
			$con = new connetMysqli();
			$id_1 = $con->getNotebooklId($userid, $bookName);
			$sql = "update notebook set bookName = '$newNbName' where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//放入废纸篓
		public static function deNb($userid,$bookName){
			/*$sql = "select id from mark where userid = '$userid' and markName = '$markName'";
			$arr = $con->getRow($sql);
			$id_1 = $arr['id'];*/
			$con = new connetMysqli();
			$id_1 = $con->getNotebooklId($userid, $bookName);
			$sql = "update notebook set isdelete = 1 where id = '$id_1'";
			$con->runSQL($sql);
			$sql = "update note set isdelete = 1 where notebookid ='$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//从废纸篓还原
		public static function reNb($userid, $bookName){
			$con = new connetMysqli();
			$id_1 = $con->getNotebooklId($userid, $bookName);
			$sql = "update notebook set isdelete = 0 where id = '$id_1'";
			$con->runSQL($sql);
			$sql = "update note set isdelete = 0 where notebookid ='$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//从废纸篓删除
		public static function deleteNb($userid,$bookName){
			$con = new connetMysqli();
			$id_1 = $con->getNotebooklId($userid, $bookName);
			$con->delete("notebook", 'id ='.$id_1);
			$con->delete("note", 'notebookid ='.$id_1);
			$con->closeLink();
		}
		//加星标记
		public static function isStart($userid,$bookName,$isStart = 1){
			$con = new connetMysqli();
			$id_1 = $con->getNotebooklId($userid, $bookName);
			$sql = "update notebook set isStart = $isStart where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		
		//---------------------------------------------------------------	
		
		//查找方法
		//按时间查找--降序
		public static function timeSearch($userid,$isdelete){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from notebook where userid = $userid and isdelete = $isdelete order by updteTime desc";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//按首字符查找--升序
		public static function fristSearch($userid,$isdelete){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from notebook where userid = $userid and isdelete = $isdelete order by bookName";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//模糊查找
		public static function Search($userid,$str,$isdelete=0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from notebook where userid = $userid and bookname like '%$str%' and isdelete = $isdelete";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
	}
	
	//new nbClass(4,"234");
	//nbClass::updateNb(4, "123", "1234");
	//nbClass::deNb(4, "1234");
	//nbClass::reNb(4, "1234");
	//nbClass::deleteNb(4, "1234");
	//nbClass::isStart(4, "1234");
	//$arr = nbClass::timeSearch(4);
	//$arr = nbClass::fristSearch(4);
	/*$arr = nbClass::Search(4,'2');
	echo "<pre>";
	print_r($arr);
	echo "</pre>";*/
?>
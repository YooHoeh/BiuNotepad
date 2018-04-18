<?php
	include "database.php";
	header('content-type:text/html;charset=utf-8');
	class noteClass{
		private $userid;
		private $content;
		private $notebookid;
		
		
		//构造函数
		public function __construct($userid,$content,$notebookid = 0){
			$this->userid = $userid;
			$this->content = $content;
			$this->notebookid = $notebookid;
			$con = new connetMysqli();
			$sql = "insert into note (userid,content,notebookid) values($userid,$content,$notebookid)";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		//修改笔记内容
		public static function updateNote($userid,$content,$newContent){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "update note set content = '$newContent' where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//放入废纸篓
		public static function deNote($userid,$content){
			/*$sql = "select id from mark where userid = '$userid' and markName = '$markName'";
			$arr = $con->getRow($sql);
			$id_1 = $arr['id'];*/
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "update note set isdelete = 1 where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//从废纸篓还原
		public static function reNote($userid, $content){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "update note set isdelete = 0 where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//从废纸篓删除
		public static function deleteNote($userid,$content){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$con->delete("note", 'id ='.$id_1);
			$con->closeLink();
		}
		//加星标记
		public static function isStart($userid,$content,$isStart = 1){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "update note set isStart = $isStart where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
//---------------------------------------------------------------	
		//查找方法
		//按时间查找--降序
		public static function timeSearch($userid,$isdelete = 0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from note where userid = $userid and isdelete = $isdelete order by updteTime desc";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//按首字符查找--升序
		public static function fristSearch($userid,$isdelete = 0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from note where userid = $userid and isdelete = $isdelete order by content";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//模糊查找
		public static function Search($userid,$str,$isdelete = 0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from note where userid = $userid and content like '%$str%' and isdelete = $isdelete";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//按记事本查笔记--首字
		public static function notebookFristSearch($userid,$notebookid,$isdelete = 0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from note where userid = $userid and notebookid = $notebookid and isdelete = $isdelete order by content";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		//按记事本查笔记--时间
		public static function notebookTimeSearch($userid,$notebookid,$isdelete = 0){
			$con = new connetMysqli();
			$arr = array();
			$sql = "select * from note where userid = $userid and notebookid = $notebookid and isdelete = $isdelete order by updteTime desc";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
		
//--------------------------------------------------------------------------	
		//事件部分
		
		
		//设置提醒时间
		public static function remindTime($userid, $content,$remindTime){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "update note set remindTime = '$remindTime' where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		//获取事件状态
		public static function getState($userid, $content){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "select remindTime from note where id = '$id_1'";
			$arr = $con->getRow($sql);
			$con->closeLink();
			if($arr['remindTime']>=date("Y-m-d h:i:s")){
				return 0;//未完成
			}else{
				return 1;
			}
		}
		
		//事件添加标签
		public static function addMark($userid, $content,$markid){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "select markID from note where id = '$id_1'";
			$arr = $con->getRow($sql);
			$str = $arr['markID'].','.$markid;
			$str = trim($str,',');
			//echo $str;
			$sql = "markID = '$str'";
			$con->update('note', $sql, "id = '$id_1'");
			$con->closeLink();
		}
		//删除某个标签
		public static function deleteMark($userid, $content,$markid){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "select markID from note where id = '$id_1'";
			$arr = $con->getRow($sql);
			$sql = str_replace($markid, '', $arr['markID']);
			$sql = str_replace(',,', ',', $sql);
			$sql = trim($sql,',');
			$sql = "markID = '$sql'";
			$con->update('note', $sql, "id = '$id_1'");
			$con->closeLink();
		}2
		
		//读取某事件的标签
		public static function findMark($userid, $content){
			$con = new connetMysqli();
			$id_1 = $con->getNotelId($userid, $content);
			$sql = "select markID from note where id = '$id_1'";
			$arr = $con->getRow($sql);
			$a = '('.$arr['markID'].')';
			$sql = "select markName from mark where id in $a";
			$arr = $con->getAll($sql);
			$con->closeLink();
			return $arr;
		}
	}

//noteClass::remindTime(4, '2345', '2018-04-13 18:08:31');
//echo date("Y-m-d h:i:s");
//echo noteClass::getState(4,'2345');
//noteClass::addMark(4, "234567", "3,4");
//noteClass::deleteMark(4, "234567", "9");
//$arr = noteClass::findMark(4, "234567");
/*$arr = noteClass::Search(4, "2");
echo "<pre>";
	print_r($arr);
	echo "</pre>";*/

//$a3 = new noteClass(4,'1352',3);
//noteClass::updateNote(2, '2', '123');
//noteClass::isStart(2,'123',1);
//noteClass::deNote(2,'123');
//noteClass::reNote(2,'123');
//noteClass::deleteNote(4,'234567');

/*$arr = noteClass::timeSearch(4);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";*/


/*$arr = noteClass::fristSearch(4);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";*/

/*$arr = noteClass::notebookFristSearch(4,1);
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	*/
	/*$arr = noteClass::notebookTimeSearch(4, 1);
	echo "<pre>";
	print_r($arr);
	echo "</pre>"*/
	
?>


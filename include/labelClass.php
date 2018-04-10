<?php
	include "database.php";
	header('content-type:text/html;charset=utf-8');
	class labelClass{
		private $id;
		private $userid;
		private $markName;
		private $isStart;
		private $isdelete;
		
		
		//构造函数--创建标签
		public function __construct($userid,$markName,$isStart = 0){
			$this->userid = $userid;
			$this->markName = $markName;
			$this->isStart = $isStart;
			$con = new connetMysqli();
			$sql = "insert into mark (userid,markName,isStart) values($userid,$markName,$isStart)";
			$con->runSQL($sql);
			$con->closeLink();
		}
		
		//修改标签内容
		public static function updateLabel($userid,$markName,$newMarkName){
			$con = new connetMysqli();
			$id_1 = $con->getLabelId($userid, $markName);
			$sql = "update mark set markName = '$newMarkName' where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
		//放入废纸篓
		/*public static function deleteLabel($userid,$markName){
			$sql = "select id from mark where userid = '$userid' and markName = '$markName'";
			$arr = $con->getRow($sql);
			$id_1 = $arr['id'];
		 * 
		 * 
			$con = new connetMysqli();
			$id_1 = $con->getLabelId($userid, $markName);
			$sql = "update mark set isdelete = 1 where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}*/
		//删除
		public static function deleteLabel($userid,$markName){
			$con = new connetMysqli();
			$id_1 = $con->getLabelId($userid, $markName);
			$con->delete("mark", 'id ='.$id_1);
			$con->closeLink();
		}
		//加星标记
		public static function isStart($userid,$markName){
			$con = new connetMysqli();
			$id_1 = $con->getLabelId($userid, $markName);
			$sql = "update mark set isStart = 1 where id = '$id_1'";
			$con->runSQL($sql);
			$con->closeLink();
		}
	
	}

//$a3 = new labelClass(3,'1234567');
//labelClass::updateLabel(3, '1234567', '123');
//labelClass::isStart(3,'123');
//labelClass::deleteLabel(3,'123');
?>

<?php
header('content-type:text/html;charset=utf-8');

class connetMysqli{
	
	private $user = 'root';
	private $password = '281056769';
	private $link;
	private $servername = 'localhost:3306';
	private $database = 'dome';
	private static $conn;
	
//---------------------------------------------------------------	
	//构造方法
	public function __construct(){
		$this->link = new mysqli($this->servername,$this->user,$this->password);
		if(!$this->link){
			echo "连接失败";
		}
		//选择数据库
		mysqli_select_db($this->link,'dome');
		//设置字符集
		mysqli_query($this->link, "set names 'utf8'");
		//echo "连接";
	}



	
	
//---------------------------------------------------------------	
	//执行SQL语句
	public function runSQL($sql){
		$a = mysqli_query($this->link,"$sql");
		if($a){
			return $a;
		}
		echo mysqli_error($this->link);
		
	}
	
//---------------------------------------------------------------	
	//打印数据
	public function p($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}
	public function v($arr){
		echo "<pre>";
		var_dump($arr);
		echo "</pre>";
	}
	//获得最后一条记录id
	public function getInsertid(){
		return mysqli_insert_id($this->link);
	}
	//获得标签的id
	public function getLabelId($userid,$markName){
		$sql = "select id from mark where userid = '$userid' and markName = '$markName'";
		$arr = $this->getRow($sql);
		return $arr['id'];
	}
	
	//获得笔记id
	public function getNotelId($userid,$content){
		$sql = "select id from note where userid = '$userid' and content = '$content'";
		$arr = $this->getRow($sql);
		return $arr['id'];
	}

	//获得笔记本id
	public function getNotebooklId($userid,$bookName){
		$sql = "select id from notebook where userid = '$userid' and bookName = '$bookName'";
		$arr = $this->getRow($sql);
		return $arr['id'];
	}
//---------------------------------------------------------------

// 查询某个字段
	//获取一行记录,return array 一维数组
	public function getRow($sql,$type="assoc"){
		$query=$this->runSQL($sql);
		$funcname="mysqli_fetch_".$type;
		return $funcname($query);
	}
	//获取一条记录,前置条件通过资源获取一条记录
	public function getFormSource($query,$type="assoc"){
		$funcname="mysqli_fetch_".$type;
		return $funcname($query);
	}
	//获取多条数据，二维数组
	public function getAll($sql){
		$query=$this->runSQL($sql);
		$list=array();
		while ($r=$this->getFormSource($query)) {
			$list[]=$r;
		}
		return $list;
	}

//	------------------------------------------------------------  
    //添加数据
	public function insert($table,$data){
		//遍历数组，得到每一个字段和字段的值
		$key_str='';
		$v_str='';
		foreach($data as $key=>$v){
			$key_str.=$key.',';
			$v_str.="'$v',";
		}
		$key_str=trim($key_str,',');
		$v_str=trim($v_str,',');
		$sql="insert into $table ($key_str) values ($v_str)";
		$this->runSQL($sql);
		//返回上一次增加操做产生ID值
		return $this->getInsertid();
	}

//---------------------------------------------------------------
	//删除一条数据
	public function delete($table, $where){
		$sql = "delete from $table where $where";
		$this->runSQL($sql);
		//返回受影响的行数
		return mysqli_affected_rows($this->link);
	}

//---------------------------------------------------------------	
	//更新数据
	public function update($table,$str,$where){
		$sql="update $table set $str where $where";
		$this->runSQL($sql);
		//返回受影响的行数
		return mysqli_affected_rows($this->link);
	}


//---------------------------------------------------------------	
	//关闭连接
	public function closeLink(){
		mysqli_close($this->link);
	}
}
?>

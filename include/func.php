<?php
/*
 *
 * ================================================
 * Author: ZhangJi
 * Email: 281056769@qq.com
 * Date: 2018.4.10
 */

/**
 * _login_state登录状态的判断
 */
 global $conn;
function _login_statu() {
	if (isset($_COOKIE['userID'])) {
		// _location("您已登陆", "main.php");
	}else{
		print_r($_COOKIE);
		_location('请先登录',"index.php");
	}
}

/**
 * 删除cookies _unsetcookies()
 */
function _unsetcookies() {
	$file = '/WebNotePad/';

	setcookie('userID', '', time() - 1, $file);
	setcookie('statu', ' ', time() - 1, $file);
	// /print_r($_COOKIE);
	// session_destroy();
}

/**
 * 弹窗警告并返回
 *
 * @param
 *        	$info弹出的警告信息
 */
function alert_back($info) {
	echo "<script type='text/javascript'>alert('$info');history.back();</script>";
	exit();
}

function alert_close($info) {
	echo "<script type='text/javascript'>alert('$info');window.close();</script>";
	exit();
}


/**
 * 消息弹窗并回到指定位置
 *
 * @param string $info弹窗消息
 * @param string $url指定位置
 */
function _location($info, $url) {
	if ($info == null) {
		header('Location:' . $url);
	} else {
		echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
	}
	exit();
}

/**
 * 检测数据库是否重复
 */
function _is_repeat($_sql, $_info,$conn) {
	if ($conn->getRow ( $_sql )) {
		alert_back ( $_info );
	}
}
/**
 * _mysql_string
 * 
 * @param string $_string        	
 * @return string $_string
 */
 function _mysql_string($_string,$conn) {
	// get_magic_quotes_gpc()如果开启状态，那么就不需要转义
	if (! get_magic_quotes_gpc ()) {
		if (is_array ( $_string )) {
			foreach ( $_string as $_key => $_value ) {
				$_string [$_key] = mysqli_real_escape_string ($_value,$conn);
			}
		} else {
			$_strin = mysqli_real_escape_string ($_string,$conn);
		}
	}
	return $_string;
}
?>
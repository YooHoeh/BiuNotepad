<?php
/*
 *
 * ================================================
 * Author: ZhangJi
 * Email: 281056769@qq.com
 * Date: 2018.4.13
 */


global $conn;
/**
 * _setcookies生成登录cookies
 *
 * @param unknown_type $_username
 * @param unknown_type $_uniqid
 */
function _setcookies($_username, $status, $_time=0) {
	$_path = "/WebNotePad/";
	switch ($_time) {
		case '1' :
			// 浏览器进程
			setcookie('userID', $_username, null, $_path);
			setcookie('status', $status, null, $_path);
			break;
		case '0' :
			// 一天
			setcookie('userID', $_username, time() + 604800, $_path);
			setcookie('status', $status, time() + 604800, $_path);
			break;
		default:
			echo 11111111111111111111111;
	}
}

/**
 * 判断登录身份
 *
 * @param int $username
 *        	帐号
 * @param string $password
 *        	密码
 */
function check_login($username, $password, $time,$conn) {
	$len = strlen($username);
	if (!!$rows = $conn->getRow("select email,password,username from user where email= '$username' and password = '$password' limit 1")) {
		_setcookies($username, "1", $time);
		$conn->closeLink();
		session_destroy();
		_location($rows['name'] . '登陆成功', 'main.php');
	} else {
		$conn->closeLink();
		session_destroy();
		_location('登录失败,请检查用户信息', 'index.php');
	}
}

/**
 * 判断姓名格式是否合法
 * 
 * @param string $string姓名        	
 * @param int $min_num最短长度        	
 * @param int $max_num最长长度        	
 * @return string
 */
function check_name($string, $min_num, $max_num) {
	// 去掉空格
	$string = trim ( $string );
	
	// 限制长度
	if (mb_strlen ( $string, 'utf-8' ) < 2 || mb_strlen ( $string . 'utf-8' ) > 20) {
		alert_back ( '用户名长度超出范围！' );
	}
	
	// 限制敏感字符
	$ban_char_pattern = '/[<>\'\"\ \	]/';
	if (preg_match ( $ban_char_pattern, $string )) {
		alert_back ( '包含敏感字符' );
	}
	
	// 将字符串myaql转义
	return _mysql_string ( $string );
}

/**
 * 密码设置
 * 
 * @param string $firstpassword第一次输入的密码        	
 * @param string $repeatword第二次输入的密码        	
 * @param int $minlen密码最短长度        	
 */
function check_password($firstpassword, $repeatword, $minlen) {
	// 判断密码
	if (strlen ( $firstpassword ) < $minlen) {
		alert_back ( '密码不能小于' . $minlen . '位！' );
	}
	
	// 验证密码是否一致
	if ($firstpassword != $repeatword) {
		alert_back ( '两次密码不一致！' );
	}
	
	// 返回密码
	return sha1 ( $firstpassword );
}

/**
 * 正则检测邮箱地址是否合法
 * 
 * @param string $string
 *        	邮箱地址
 * @return string $string 符合则返回原邮箱否则报错
 */
function check_email($string) {
	$string = trim ( $string );
	if (! preg_match ( '/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $string )) {
		echo $string;
		// alert_back ( '邮箱格式不正确' );
	}
	return $string ;
}



/**
 * 判断是否将所有信息填写完毕
 * @param array $array所传数组
 */
function check_empty($array) {
	foreach ($array as $key => $value) {
		if ($value == null) {
			alert_back($key . '为空');
		}

	}
}


?>
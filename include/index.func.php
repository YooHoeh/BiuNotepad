<?php
/*
 *
 * ================================================
 * Author: ZhangJi
 * Email: 281056769@qq.com
 * Date: 2018.4.13
 */

/**
 * _setcookies生成登录cookies
 *
 * @param unknown_type $_username
 * @param unknown_type $_uniqid
 */
function _setcookies($_username, $status, $_time) {
	$_path = "/WebNotePad/";
	switch ($_time) {
		case 'no' :
			// 浏览器进程
			setcookie('userID', $_username, null, $_path);
			setcookie('status', $status, null, $_path);
			break;
		case 'yes' :
			// 一天
			setcookie('userID', $_username, time() + 604800, $_path);
			setcookie('status', $status, time() + 604800, $_path);
			break;
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
function check_login($username, $password, $time) {
	$len = strlen($username);
	if (!!$rows = _fetch_array("select email,password,name from user where email= '$username' and password = '$password' limit 1")) {
		_setcookies($username, "1", $time);
		_close();
		session_destroy();
		_location($rows['name'] . '登陆成功', 'main.html');
	} else {
		_close();
		session_destroy();
		_location('登录失败', 'index.php');
	}
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
function cheak_email($string) {
	$string = trim ( $string );
	if (! preg_match ( '/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $string )) {
		alert_back ( '邮箱格式不正确' );
	}
	return $string ;
}

/**
 * 判断密码
 */
function check_password($password, $minlen) {
	if (strlen($password) < $minlen) {
		alert_back('密码不能小于' . $minlen . '位！');
	}
	// 返回密码
	return sha1($password);
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
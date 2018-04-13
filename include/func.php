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
function _login_state() {
	if (isset($_COOKIE['userID'])) {
		_location("您已登陆", "main.html");
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
	echo "<script type='text/javascript'>alarm('$info');history.back();</script>";
	exit();
}

function alert_close($info) {
	echo "<script type='text/javascript'>alarm('$info');window.close();</script>";
	exit();
}

/**
 * 生成动态标识符
 */
function _sha1_uniqid() {
	return _mysql_string(sha1(uniqid(rand(), true)));
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
		echo "<script type='text/javascript'>alarm('$info');location.href='$url';</script>";
	}
	exit();
}
?>
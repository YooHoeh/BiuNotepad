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
	$layui =  "<script src='./layui/layui.js'></script>  <link rel='stylesheet' href='./layui/css/layui.css'>";
	echo $layui."<script>layui.use('layer', function(){var layer = layui.layer;layer.alert('$info', function(){history.back()})});</script>"; 
	exit();
}

function alert_close($info) {
	$layui =  "<script src='./layui/layui.js'></script>  <link rel='stylesheet' href='./layui/css/layui.css'>";
	echo $layui."<script>layui.use('layer', function(){var layer = layui.layer;layer.alert('$info', function(){window.close()})});</script>"; 
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
		$layui =  "<script src='./layui/layui.js'></script>  <link rel='stylesheet' href='./layui/css/layui.css'>";
		echo $layui."<script>layui.use('layer', function(){var layer = layui.layer;layer.alert('$info', function(){location.href='$url';})});</script>"; 
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
?>
<?php
/*
 *
 * ================================================
 * Author: ZhangJi
 * Email: 281056769@qq.com
 * Date: 2018.4.10
 */



// 引入函数库
require 'func.php';
require 'database.php';

// 拒绝低版本PHP
if (PHP_VERSION < '4.1.0') {
	exit ( "PHP version is too low" );
}



// 初始化数据库
$connn = new connetMysqli();


              
?>
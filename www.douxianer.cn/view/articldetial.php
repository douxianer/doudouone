<?php

header("Content-type:text/html;Charset=utf-8");
// 加载数据库连接文件

include '../MySQLDB.class.php';
$config = array(
	'pass'=>'doudou',
	'dbname'=>'doudou'
);

// 实例化数据库操作对象
$dao = MySQLDB::getInstance($config);

//获取一级目录
$sql_class1 = "select * from classfy where class_pid=0";
$class1_list = $dao->fetchAll($sql_class1);



$blog_id=$_GET['id'];
$sql_blog_content= "select * from article where art_id=$blog_id";
$blog_content_list = $dao->fetchAll($sql_blog_content);

include 'articldetialv.html';

?>


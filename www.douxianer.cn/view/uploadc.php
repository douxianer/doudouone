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
// $dao,Database Access Object 数据库操作对象(dao层)

//获取目录
//获取一级目录
$sql_class = "select * from classfy where class_pid=0";
$class1_list_be = $dao->fetchAll($sql_class);

$sql_class1 = "select class_name from classfy where class_pid !=0";
$class1_list = $dao->fetchAll($sql_class1);



include './upload.html';
?>








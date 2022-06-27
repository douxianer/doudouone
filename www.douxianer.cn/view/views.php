<?php

header("Content-type:text/html;Charset=utf-8");
// 加载数据库连接文件

include './MySQLDB.class.php';
$config = array(
	'pass'=>'doudou',
	'dbname'=>'doudou'
);
// 实例化数据库操作对象
$dao = MySQLDB::getInstance($config);
// $dao,Database Access Object 数据库操作对象(dao层)

// 获取密码
$sql = "select * from passworlds";
$pass_list = $dao->fetchAll($sql);


//获取一级目录
$sql_class1 = "select * from classfy where class_pid=0";
$class1_list = $dao->fetchAll($sql_class1);


//获取二级目录

$class2_be=$_GET['class2_before'];
if($class2_be==null)
$class2_be= $_GET['class2_before1'];
if($class2_be==null)
$class2_be=1;

$sql_class2 = "select * from classfy where class_pid=$class2_be";
$class2_list = $dao->fetchAll($sql_class2);


//获取内容

$blog_content=$_GET['blog_before'];
if($blog_content==null)
$blog_content=$class2_list[0]['class_id'];
if($blog_content==null)
$blog_content=2;

//获取所有内容量
$sql_count="select count(*) from article where cate_id=$blog_content";
$blog_count=$dao->fetchAll($sql_count);


$blog_page=$_GET['page'];
if($blog_page==null)
$blog_page=1;


$blog_limt=($blog_page-1)*10;

$next_page=$blog_page+1;
$pre_page=$blog_page-1;

//总页数
$psge_count=ceil($blog_count[0]['count(*)']/10);



$sql_blog_content= "select * from article where cate_id=$blog_content order by art_id desc limit  $blog_limt,10";
$blog_content_list = $dao->fetchAll($sql_blog_content);






include './view/index.html';
?>

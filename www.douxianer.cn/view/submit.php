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

// 获取密码
$sql = "select * from passworlds";
$pass_list = $dao->fetchAll($sql);

//根据分类名获得分类号
$class_item=$_POST['blog_classy'];
$sql_class = "select class_id from classfy where class_name='$class_item'";
$class_list = $dao->fetchAll($sql_class);





$b_title=$_POST['blog_title'];
$b_classfy=$class_list[0]['class_id'];
$b_disc=$_POST['blog_disc'];
$b_content=addslashes($_POST['blog_content']);
$b_time=$_POST['blog_time'];

$empty=0;
$passw=0;
if($_POST['blog_password']!=$pass_list[0]['id'])
{
    $passw=0;
}
else{
    $passw=1;
    if($_POST['blog_title']==null || $_POST['blog_content']==null || $_POST['blog_time']==null ||$_POST['blog_disc']==null)
    {
        $empty=0;
    }
    else{
        $empty=1;
        $sql_add="insert into article(cate_id,title,art_desc,content,addtime) 
        values($b_classfy,'$b_title','$b_disc','$b_content','$b_time');";
        $dao->my_query($sql_add);
    }
}




?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

<script>
    if(<?php echo $passw ;?>==0)
    {
        alert('密码错误');
    }
    else{
        if(<?php echo $empty ;?>==0)
        {
            alert('不允许存在空值');

        }
        else{
            alert('添加成功');
        }

    }
</script>
</body>
</html>
<?php
namespace app\index\controller;

use think\Db;

use think\Controller;

class Index extends \think\Controller
{
    public function index()
    {
        $test1=Db::table('classfy')
        ->where('class_id',1)
        ->find();
        
       return $this->fetch();

       
    }
    
  /*   public function sss()
    {
        echo 'yyyyyyy';
    }
    
    
     public function apitest()
    {
        $test1=Db::table('classfy')
        ->where('class_id',1)
        ->find();

        return $test1['class_name'];
    }*/
}

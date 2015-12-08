<?php
require_once 'CheckServer.class.php';
//接收用户要删除的用户id

$checkService=new CheckServer();

//先看看用户要分页还是删除某个
if(!empty($_REQUEST['flag']))
{
    //接收flag值
    $flag=$_REQUEST['flag'];
    //如果flag="del",说明用户要执行删除请求
    if($flag=="del")
    {
        //这是我们知道要删除out列表里面的书
        $id=$_REQUEST['id'];
        $book=$_REQUEST['book'];
        //echo $id;
        if($checkService->delOutByTime($id)==1 && $checkService->addBooks($book)==1)
        {
            //成功
          header("Location: admin/ok.php");
            exit();
        }
        else
        {
            //失败
            header("Location: admin/error.php");
            exit();
        }
    }
}
?>
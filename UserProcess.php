<?php
    require_once 'model/SelService.class.php';
    //接收用户用借书的ID
    //创建sel对象实例

    $sel=new SelService();
    //先看看用户要接哪本书
  if(!empty($_REQUEST['flag'])){
       //接收flag的值
       //upBooks($id,$Ball,$Bout)
       $id=$_REQUEST['id'];
       $Ball=$_REQUEST['Ball'];
       $Bout=$_REQUEST['Bout'];
       $Bname=$_REQUEST['Bname'];
       //接收用户名字保存到借出表中
       if(!isset($_SESSION)){
           session_start();
       }
       $Cname=$_SESSION['loginuser'];
        
      
       if($Ball>0){
           $Ball=$Ball-1;
           $Bout=$Bout+1;
          
            $res=$sel->upBooks($id,$Ball,$Bout);
           //下面这条语句,会一次插入两条语句。。
           $Cid=$sel->findId($Cname);
           $Cid= $Cid[0]['id'];
           $res3=$sel->upOutBooks($Cid,$id);
          echo $res3;
            if($res==1)
            {
                
                echo "<script language=javascript>alert('借书成功');history.back();</script>";
                exit();
            }
            else
            {
                //失败
               echo "<script language=javascript>alert('借书失败');history.back();</script>";
                exit();
            }
          
       }else{
          echo "<script language=javascript>alert('书已借完');history.back();</script>";
       }
       
   }
   
   
   ?>
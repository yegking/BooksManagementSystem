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
       if($Ball>=1){
           $Ball=$Ball-1;
           $Bout=$Bout+1;
          
            $res=$sel->upBooks($id,$Ball,$Bout);
            echo $res;
            if($res==1)
            {
                echo "<script language=javascript>alert('借书成功')</script>";
                exit();
            }
            else
            {
                //失败
               echo "<script language=javascript>alert('借书失败');history.back();</script>";
                exit();
            }
          
       }else{echo "<script language=javascript>alert('书已借完');history.back();</script>";}
       
   }

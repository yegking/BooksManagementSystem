<?php

    require_once 'AdminService.class.php';
    
    $adService=new adminService();
    
    if(!empty($_REQUEST['flag']))
    {
        //接收flag值
        $flag=$_REQUEST['flag'];
        //如果flag="del",说明用户要执行删除请求
        if($flag=="del")
        {
            $cname=$_REQUEST['cname'];
           
            if($adService->delUserByname($cname)==1)
            {
                
                    
                
                //成功
                header("Location: ok.php");
                exit();
                
            } 
            else 
            {
            //失败
            header("Location: error.php");
            exit();
            
            }
           
        }
        else if($flag=="adduser")
        {
            //说明用户希望执行添加雇员
            //接收数据
            $name=$_POST['Cname'];
            $pwd=$_POST['Cpwd'];
            $sex=$_POST['Csex'][0];
            var_dump($sex);
            $job=$_POST['Sjob'];
            
            //完成添加->数据库
            $res=$adService->addUser($name, $pwd, $sex, $job);
            if($res==1)
            {
                header("Location: ok.php");
                exit();
            }
            else 
            {
                //失败
                header("Location: error.php");
                exit();
            }
            
            
        }else if($flag=="delb"){
            
            $bname=$_REQUEST['bname'];
         if($adService->delBooks($bname)==1)
            {     
                
                //成功
                header("Location: ok.php");
                exit();
                
            } 
            else 
            {
            //失败
            header("Location: error.php");
            exit();
            
            }
            
            
            
            
        }
    }
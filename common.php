<?php
date_default_timezone_set('PRC');
//查看跟新时间，上次如果登陆了，，就把时间跟新了，，没有就在来一次，把时间跟新保存了
    function  getListTime(){
        
        if(!empty($_COOKIE['LastVisit'])){
            echo "你上次登陆时间是".$_COOKIE['LastVisit'];
            //再去跟新时间
            setcookie("LastVisit",date("Y-m-d  H:i:s"),time()+24*3600);
        }else{
            //这是你第一次登陆
            setcookie("LastVisit",date("Y-m-d  H:i:s"),time()+24*3600);
        }
    }
    
    
    //看有没有cookie  ，方便下次登录直接显示用户名
    function getCookieVal($key){
        if(empty($_COOKIE[$key])){
           
            return "";
        }else{
            return $_COOKIE[$key];
        }
    }
    
    //把验证用户是否合法封装函数
    function CheckUserVaildate(){
        session_start();
        if(empty($_SESSION['loginuser'])){
            header("Location: index.php?errno=1");
        }
        
        
    }
    
    
    
    
    
    
    
    
    
    ?>
    
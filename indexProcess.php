<?php
require_once 'model/AdminService.class.php';

$id=$_POST['id'];
$pwd=$_POST['password'];
$checkCode=$_POST['checkcode'];


//先验证验证码是否正常

session_start();

if($checkCode!=$_SESSION['myCheckCode']){
    header("Location:index.php?errno=2");
    exit();
}



//用户是否选择保存ID

if(empty($_POST['keep'])){
    if(!empty($_COOKIE['id'])){
        setcookie("id",$id,time()-100);
    }
}else{
    setcookie("id",$id,time()+24*3600);
}


$adminService=new AdminService();
$name=$adminService->checkAdmin($id, $pwd);

if($name!=""){
    session_start();
    $_SESSION['loginuser']=$name;
    header("Location: user.php?name=$name");
    exit();
}else{
    //非法用户，
    
    header("Location: index.php?errno=1");
  exit();
    
    
}



?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>

<hr/>
<?php 
  
   require_once 'common.php';
  // CheckUserVaildate();
   echo "欢迎".$_GET['name']."登陆成功";
   echo "<br/><a href='index.php'>返回重新登录</a>";
    
   //getLastTime();

?>
<h1>主界面</h1>
<a href='admin/userList.php'>管理用户</a><br/>
<a href='admin/adduser.php'>添加用户</a><br/>
<a href='admin/booksList.php'>管理图书</a><br/>

<hr/>





</html>
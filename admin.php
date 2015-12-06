<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
图书管理系统
</title>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
<link href="css/admin.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm" style="background:url(images/5.jpg);background-repeat:no-repeat;background-size:contain;background-size:height:300px">
<hr/>
<?php 
  
   require_once 'common.php';
   CheckUserVaildate();
   echo "<h4>登陆成功</h4>";//.$_GET['name'].
   echo "<br/><a href='index.php' style='font-size:15px;color:#0080ff;'>返回重新登录</a>";
    
   getListTime();

?>
<h2>主界面</h2>
<a href='admin/userList.php'>管理用户</a><br/>
<a href='admin/adduser.php'>添加用户</a><br/>
<a href='admin/booksList.php'>管理图书</a><br/>
<a href='admin/outList.php'>外借图书</a><br/>


</div>
</div>

</html>
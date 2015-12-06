<?php 
require_once 'common.php';
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
图书管理系统
</title>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm" style="background:url(images/1.jpg);background-repeat:no-repeat;background-size:contain;">
<!--  <span class="span1">图书管理系统</span>-->

<form action="indexProcess.php" method="post">

<table class="table1" style="padding:160px;">
<tr ><td>账号:</td><td><input type="text" name="id" value="<?php echo getCookieVal("id");?>"/></td></tr>
<tr><td>密码:</td><td><input type="password" name="password"/></td></tr>
<tr><td>验证码:</td><td><input type="text" name="checkcode"/><img src="checkcode.php" onclick="this.src='checkCode.php?aa='+Math.random()"></td></tr>
<tr><td colspan="2">是否保存账号：<input type="checkbox" name="keep" value="yes"/></td></tr>
<!-- 果你选择了这个checkbox后，需要将value这个值传到数据库做出相应的处理 -->

<tr>
<td><input type="submit" value="提交"/></td>
<td><input type="reset" value="重新填写"/></td>
</tr>
</table>

</form>

</div>
</div>
<?php
if(!empty($_GET['errno'])){
    $errno=$_GET['errno'];
    if($errno==1){
        
        echo "<br/><font size=3 color='red' >你的用户名或密码错误</font>";
    }else if($errno==2){
        
        echo "<br/><font size=3 color='red'>验证码错误</font>";
    }
}




?>
</html>
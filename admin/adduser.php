<?php 


?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<hr/>
<h1>添加雇员</h1>
<form action="adminProcess.php" method="post">
<table>
<tr><td>名字</td><td><input type="text" name="Cname"/></td></tr>
<tr><td>密码</td><td><input type="password" name="Cpwd"/></td></tr>
<tr><td>工作</td><td><input type="text" name="Sjob"/></td></tr>
<tr><td>性别</td><td>
<input type="radio" value="m" name="Csex[]"/>m<input type="radio" checked="checked" value="f" name="Csex[]"/>f</td></tr>
<input type="hidden" name="flag" value="adduser" />
<tr>
<td><input type="submit" value="添加用户" /></td>
<td><input type="reset" value="重新填写" /></td>
</tr>
</table>
</form>
</html>

<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
用户列表
</title>
<link href="../css/user.css" rel="stylesheet" type="text/css"/>
<link href="../css/admin.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm" style="background:url(../images/5.jpg);background-repeat:no-repeat;background-size:contain;background-size:height:300px">
<hr/>
<?php
require_once 'adminService.class.php';
require_once '../common.php';
CheckUserVaildate();

$adService=new adminService();
$arr=array();
$arr=$adService->getUserList();
echo "<table border='1px' bordercolor='#c0c0c0' cellspacing='0px' width='600px'>";
echo "<tr><th>姓名</th><th>密码</th><th>性别</th><th>工作</th><th>删除用户</th></tr>";



for($i=0;$i<count($arr);$i++)
{
   //使用了级联查询
    echo "<tr><td>{$arr[$i]['Cname']}</td><td>{$arr[$i]['Cpwd']}</td><td>{$arr[$i]['Csex']}</td><td>{$arr[$i]['Sjob']}</td><td><a onclick='return confirmDele({$arr[$i]['Cname']})' href='adminProcess.php?flag=del&cname={$arr[$i]['Cname']}'>删除用户</a></td></tr>";
}
?>
</div>
</div>
</html>
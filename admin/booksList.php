<html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>管理图书</title>
<script type="text/javascript">
<!--
	function confirmDele(val)
	{
	return window.comfirm("书名"+val)
	
	}
	
//-->
</script>
<?php
require_once 'adminService.class.php';


$adService=new adminService();
$arr=array();
$arr=$adService->getbooksList();
echo "<table border='1px' bordercolor='green' cellspacing='0px' width='600px'>";
echo "<tr><th>书名</th><th>馆存</th><th>借出</th><th>简介</th><th>作者</th></tr>";



for($i=0;$i<count($arr);$i++)
{
   //使用了级联查询
    echo "<tr><td>{$arr[$i]['Bname']}</td><td>{$arr[$i]['Ball']}</td><td>{$arr[$i]['Bout']}</td><td>{$arr[$i]['Bout']}</td><td>{$arr[$i]['Bauthor']}</td><td><a onclick='return confirmDele({$arr[$i]['Bpress']})' href='adminProcess.php?flag=delb&bname={$arr[$i]['Bname']}'>删除图书</a></td></tr>";
}


?>
</html>

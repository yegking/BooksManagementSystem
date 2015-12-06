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
$arr=$adService->getOutList();

echo "<table border='1px' bordercolor='#c0c0c0' cellspacing='0px' width='600px'>";
echo "<tr><th>借书用户</th><th>图书</th><th>借书时间</th></tr>";



for($i=0;$i<count($arr);$i++)
{
   
    $id=$arr[$i]['cid'];
    $bid=$arr[$i]['bid'];
   
    $res=$adService->getUserNameById($id);
    $bres=$adService->getBooksById($bid);
    
  
 
    
   
  
    echo "<tr><td>{$res[0]}</td><td>{$bres[0]}</td><td>{$arr[$i]['newDate']->format('Y-m-d H:i:s')}</td></tr>";
  
}
?>
</div>
</div>
</html>
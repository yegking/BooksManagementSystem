<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
图书管理系统
</title>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm">
<hr/>
<?php 
   require_once 'model/SelService.class.php';
   require_once 'FenyePage.class.php';
   require_once 'common.php';
   CheckUserVaildate();
   $selServer=new SelService();
   //创建一个分页对象
   $fenyePage=new FenyPage();
   //给分页指定必须要的参数
   $fenyePage->pageNow=1;
   $fenyePage->pageSize=6;
   $fenyePage->gotoUrl="user.php";
   //这里我们需要用户点击来修改$pageNow这个值
   //我们需要判断是否有pageNow发送，有就使用
   //如果没有，则默认显示第一页
   if(!empty($_GET['pageNow']))
   {
       $fenyePage->pageNow=$_GET['pageNow'];
   }
   $selServer->getFenyePage($fenyePage);
   
   
   
   
   echo "　　　　　　欢迎".$_GET['name']."登陆成功";
   echo "<br/>　　<a href='index.php'>返回重新登录</a>";
    
   getListTime();

echo "<h1 style=".'margin-left:150px'.">主界面</h1>";
echo  "<a href='checkBooks.php'>管理图书</a><br/>";
echo "<a href='#'>退出系统</a><br/>";
echo "<hr/>";




echo "<table border='1px' bordercolor='green' cellspacing='0px' width='600px'>";
    echo "<tr><th>id</th><th>Bname</th><th>Ball</th><th>Bout</th><th>Bpress</th><th>Bauthor</th><th>lend</th></tr>";
    //echo count($fenyePage->res_array);
    
   
   
    for($i=0;$i<count($fenyePage->res_array);$i++)
    {
        $row=$fenyePage->res_array[$i];
       
        echo "<tr><td>{$row['id']}</td><td>{$row['Bname']}</td><td>{$row['Ball']}</td><td>{$row['Bout']}</td><td>{$row['Bpress']}</td><td>{$row['Bauthor']}</td>".
        "<td><a href='UserProcess.php?flag=del&id={$row['id']}&Ball={$row['Ball']}&Bout={$row['Bout']}&Bname={$row['Bname']}'>借书</a></td></tr>";
        //onclick='return confirmDele({$row['id']})'
    }
   
   
    echo "</table>";
    
    
    //显示上一页和下一页
    
    echo $fenyePage->navigate;
    ?>
     <form action="user.php">
            跳转到:<input type="text" name="pageNow"/>
    <input type="submit" value="Go">
    </form>




</div>
</div>
</html>
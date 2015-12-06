<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
已借图书
</title>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm" style="background:url(images/2.jpeg);background-repeat:no-repeat;background-size:height:600px">

<?php 
    require_once 'CheckServer.class.php';
    require_once 'model/SelService.class.php';
    require_once 'common.php';
    CheckUserVaildate();
   
    $sel=new SelService();
    if(!isset($_SESSION)){
        session_start();
    }
    $Cname=$_SESSION['loginuser'];
    $Cid=$sel->findId($Cname);
    $Cid= $Cid[0]['id'];
    
    
    
    $checkserver =new CheckServer();
    $check=$checkserver->getOutbyId($Cid);//返回了数组二维的
    $arr=array();
    $arr3=array();
    for($i=0;$i<count($check);$i++){
      
       $arr[]=$check[$i]['bid'];
       $arr3[]=$check[$i]['newDate'];
      
       //var_dump($arr3[$i]);
       //echo $arr3[$i]->format('jS, F Y');
    }
   
   
   
    //var_dump($arr);
    
   
   // $bid=$check->getBid();
    echo "<table border='1px' bordercolor='#c0c0c0' cellspacing='0px' width='600px' style='padding:100px;'>";
    echo "<tr><th>书名</th><th>借书时间</th><th>还书</th></tr>";
    $arr2=array();
      for($i=0;$i<count($arr);$i++)
    {
       $arr2=$checkserver->getbookname($arr[$i]);
       $t="";
       for($j=0;$j<23;$j++){
           $t.=$arr3[$i]->format('Y-m-d H:i:s:u')[$j];
          
       }
    
        echo "<tr><td>{$arr2[0]}</td><td>{$arr3[$i]->format('jS, F Y')}</td><td><a onclick='return confirmDele({$arr3[$i]->format('jS, F Y')})' href='checkProcess.php?flag=del&id={$t}&book={$arr2[0]}'>还书</td></tr>";
        //var_dump("CONVERT(char,$arr3[$i],yyyy-mm-dd hh:mi:ss.mmm)") ;
       //echo Date("Y-m-d H:i:s",$arr3[$i]);format('jS, F Y')    $arr3[$i]->format('Y-m-d H:i:s:u')
        
    }
    echo "</table>";
    ?>




</div>
</div>
</html>
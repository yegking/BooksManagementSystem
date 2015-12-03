<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
查看已借图书
</title>
<link href="css/user.css" rel="stylesheet" type="text/css"/>
</head>

<div class="div1">
<div class="divm">
<hr/>
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
    echo "<table border='1px' bordercolor='green' cellspacing='0px' width='600px'>";
    echo "<tr><th>bname</th><th>time</th><th>还书</th></tr>";
    $arr2=array();
      for($i=0;$i<count($arr);$i++)
    {
       $arr2=$checkserver->getbookname($arr[$i]);
    
        echo "<tr><td>{$arr2[0]}</td><td>{$arr3[$i]->format('jS, F Y')}</td><td >还书</td></tr>"; 
    }
    echo "</table>";
    ?>




</div>
</div>
</html>
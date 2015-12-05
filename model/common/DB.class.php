<?php

Class DB{
       public $sqlserver;
       public static   $dbHost = "WQRFSVQXZPMD8KF\yangzhu";
      // public static   $uid = "myw";
       public static   $pwd = "1234abcd";
       public static   $dbName = 'master';
       //public static   $charset = 'utf-8';
       public $conn;
       public $error_log=array();
       
   
       public  static $connectionInfo = array("UID" => 'book', "PWD" => '1234abcd', "Database" => 'book','CharacterSet' => 'utf-8');
      
       
       public function __construct(){
           $this->conn=sqlsrv_connect(self::$dbHost,self::$connectionInfo);
           if($this->conn == false) {
              echo "连接失败！";
	       die(print_r(sqlsrv_errors(), true));
           }
         
          
       }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// 1.查询
      
       //执行dql语句
       public function execute_dql($sql){
           $res = sqlsrv_query($this->conn, $sql) ;
           return $res;
        
       }

       
//执行dql语句，返回数组
public function execute_dql2($sql)
{
    $arr=array();
    $res=sqlsrv_query($this->conn, $sql);
    //把$res=>$arr的结果集转移到一个数组中
    while($row=sqlsrv_fetch_array($res))
    {
       //sqlsrv_get_field( $res, 0, SQLSRV_PHPTYPE_STRING( SQLSRV_ENC_CHAR));
      
        
        $arr[]=$row;
    }
   //$row=sqlsrv_fetch_array($res);
    //这里就可以马上把$res关闭
   // sqlsrv_free_stmt($res);
   
 return $arr;
   
}




//执行dml语句
public function execute_dml($sql)
{
   
  $b=sqlsrv_query($this->conn, $sql) or die(print_r(sqlsrv_errors(),true));
    if(!$b)
    {
        return 0;
    }
    else
    {
        if(sqlsrv_rows_affected($b)>=0)          //mysql_affected_rows() 函数返回前一次 MySQL 操作所影响的记录行数。
        {
            return 1;
        }
        else{
            return -1;
        }
        
    }
}



//考虑分页查询

public function execute_dql_fenye($sql1,$sql2,$fenyePage){
    //这里我们查询要分页显示的数据
    $res=sqlsrv_query($this->conn,$sql1) ;//or die($this->sqlsrv_errors);
    $arr=array();
    while( $row=sqlsrv_fetch_array($res))
    {
        $arr[]=$row;
    }
    $row=sqlsrv_fetch_array($res);
  
   // var_dump( count($row));
    $res2=sqlsrv_query($this->conn, $sql2) ;//or die($this->sqlsrv_errors);
   
       $row2=sqlsrv_fetch_array($res2);
       $fenyePage->pageCount=ceil($row2[0]/$fenyePage->pageSize);
        $fenyePage->rowCount=$row[0];
  //  }
   sqlsrv_free_stmt($res);
   //分页导航
   $navigate="";
  
   if($fenyePage->pageNow>1)
   {
       $prePage=$fenyePage->pageNow-1;
       $navigate="<a href='user.php?pageNow=$prePage'>上一页</a>&nbsp;";
   
   }
   if($fenyePage->pageNow<$fenyePage->pageCount)
   {
       $nextPage=$fenyePage->pageNow+1;
       $navigate.="<a href='user.php?pageNow=$nextPage'>下一页</a>&nbsp;";
   
   }
   $fenyePage->res_array=$arr;
   $fenyePage->navigate=$navigate;
    
}








//关闭连接的方法
public function close_connect()
{
    if(!empty($this->conn))
    {
        sqlsrv_close($this->conn);
    }
}
}
/*while ($row = sqlsrv_fetch_array($query)) {
	
	echo $row['Sno'] . "-----" . $row['sname'] . "<br/>";
}


// 2.插入、更新
$sql = "insert into [SnsClass]([year],[month],[day],[className]) values ('2014','02','05', '初三(3)版')";
$query = sqlsrv_query($conn, $sql);
}
*/
?>
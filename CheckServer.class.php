<?php
    require_once 'model/common/DB.class.php';
    require_once 'Check.class.php';
    require_once 'FenyePage.class.php';
    class CheckServer{
        function getOutbyId($cid){
            $sql="select * from out where cid=$cid";
           
            $sqlHelper=new DB();
            $arr=$sqlHelper->execute_dql2($sql);//妈的现在为空
          // var_dump($arr);
           
            
            $sqlHelper->close_connect();
          
           return $arr;
            
        }
        function getbookname($bid){
            $sql="select Bname from books where id=$bid";
           
           $sqlHelper=new DB();
           $res=$sqlHelper->execute_dql($sql);
         $row=sqlsrv_fetch_array($res);
         
           $sqlHelper->close_connect();
           return $row;
            
            
        }
        //分页信息
        function getPageCount($pageSize)
        {
            //需要查询$rowCount
            $sql="select count(id) from out";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dql($sql);
            
            //这样就可以计算$pageCount
           
                $pageCount=ceil($res[0]/$pageSize);
            
            //释放资源
            $res->free();
            //关闭连接
            $sqlHelper->close_connect();
            return $pageCount;
        }
        
        function delOutByTime($time)
        {
            $sql="delete from out where newDate='$time'";
            $sqlHelper=new DB();
            return $sqlHelper->execute_dml($sql);
        }
        function addBooks($book){
            $sql="update books set Ball=Ball+1,Bout=Bout-1 where Bname='$book'";
            $sqlHelper=new DB();
            return $sqlHelper->execute_dml($sql);
            
        }
        
        
        
    }
    ?>
<?php
    require_once '../model/common/DB.class.php';
    class adminService
    {
        function getUserList(){
            $sql="select * from consumer";
            $sqlHelper=new DB();
            $arr=$sqlHelper->execute_dql2($sql);
            
            $sqlHelper->close_connect();
            
            return $arr;
        }
        
        function getUserIdByname($name){
            $sql="select id from consumer where Cname='$name'";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dql($sql);
            
            $sqlHelper->close_connect();
            
            return $res;
        }
        
        
        function delUserByname($name){
            $sql="delete from consumer where Cname='$name'";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dml($sql);
            
            $sqlHelper->close_connect();
            
            return $res;
        }
        
        function addUser($Cname,$Cpwd,$Csex,$Sjob){
            $sql="insert into consumer values(substring(sys.fn_sqlvarbasetostr (HASHBYTES('MD5','$Cpwd') ),3,32),'$Cname',0,'$Csex','$Sjob')";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dml($sql);
            $sqlHelper->close_connect();
            return $res;
        }
        
        function getbooksList(){
            $sql="select * from books";
            $sqlHelper=new DB();
            $arr=$sqlHelper->execute_dql2($sql);
            $sqlHelper->close_connect();
            return $arr;
        }
        
        function delBooks($name){
            $sql="delete from books where Bname='$name'";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dml($sql);
            
            $sqlHelper->close_connect();
            
            return $res;
        }
        function getOutList(){
            $sql="select * from out";
            $sqlHelper=new DB();
            $arr=$sqlHelper->execute_dql2($sql);
            $sqlHelper->close_connect();
            return $arr;
        }
        
        function getUserNameById($id){
            
            $sql="select Cname from consumer where id=$id";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dql($sql);
            if($row=sqlsrv_fetch_array($res))
            {
                return $row;
            }
            
            $sqlHelper->close_connect();
            
          
            
            
        }
        
        function getBooksById($id){
            
            $sql="select Bname from books where id=$id";
            $sqlHelper=new DB();
            $res=$sqlHelper->execute_dql($sql);
            if($row=sqlsrv_fetch_array($res))
            {
                return $row;
            }
            
            $sqlHelper->close_connect();
            
           
        }
        
      
    }
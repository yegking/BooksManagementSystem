<?php
        
    require_once 'model/common/DB.class.php';
    require_once 'sel.class.php';
    class SelService
    {
        //一个函数可以获取多少页
        function getPageCount($pageSize)
        {
            //需要查询$rowCount
            $sql="select count(id) from books";
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
        
        
        //一个函数可以获取应当显示的雇员信息
        function getEmpListByPage($pageNow,$pageSize)
        {
            //$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
            
           // $sql="select top ".($pageNow-1)*$pageSize." id from books where id not in (select top $pageSize id from books)";
            $sql="select * from books where id>0 and id<6";
            $sqlHelper=new DB();
            //这里的$res就是二维数组
            $res=$sqlHelper->execute_dql2($sql);
            
            //释放资源和关闭连接
            //关闭连接
            $sqlHelper->close_connect();
            return  $res;
            
        }
        
            //第二种使用封装的方法完成分页
            function getFenyePage($fenyePage)
            {
                
                $sql1="select top ".$fenyePage->pageSize." * from books where id not in (select top ".($fenyePage->pageNow-1)*$fenyePage->pageSize." id from books)";
                //$sql1="SELECT TOP 6 * FROM books WHERE id NOT IN(SELECT TOP 0 id FROM books ORDER BY Bname DESC, ID DESC) ORDER BY Bname DESC,id DESC";
               // $sql1="select * from books where id>0 and id<6";
                
                $sql2="select count(id) from books";
                
                //创建一个SqlHelper对象实例
                $sqlHelper=new DB();
                $sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
                
                $sqlHelper->close_connect();
            }
            
            //根据输入的name找出id
            function findId($Cname)
            {
                
               // $sql="select id from consumer where Cname='$Cname'";
                $sql="select id from consumer where Cname='chonggong'";
                //创建$sqlHelper对象实例
                $sqlHelper=new DB();
               $res= $sqlHelper->execute_dql2($sql);
               $sqlHelper->close_connect();
                return $res;
                
            }
            //跟新所剩余的图书
            function upBooks($id,$Ball,$Bout)
            {
                //做一个sql语句
                $sql="update books set Ball='$Ball',Bout='$Bout' where id='$id'";
              
                //同sqlHelper完成添加
                $sqlHelper=new DB();
                $res=$sqlHelper->execute_dml($sql);
                $sqlHelper->close_connect();
                return $res;
            }
            function upOutBooks($Cid,$id)
            {
                //做一个sql语句
                $sql="insert into out values ($Cid,$id,default)";
                //同sqlHelper完成添加
                $sqlHelper=new DB();
                $res=$sqlHelper->execute_dml($sql);
                $sqlHelper->close_connect();
                return $res;
            }
        
        
    }
    
    
?>
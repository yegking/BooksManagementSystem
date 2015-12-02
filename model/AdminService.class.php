<?php
require_once 'common/DB.class.php';

class AdminService{
    
    public function checkAdmin($id,$pwd){
        //echo "SELECT  * FROM student";
      $sql="select Cpwd,Cname from consumer where Cname='$id'";
     
        $sqlHelper=new DB();
        $res=$sqlHelper->execute_dql($sql);
        
       
       /* for($i=0;$i<count($res);$i++){
            for($j=0;$j<5;$j++){
             echo $res[$i][$j];
             
            }
            echo "<br/>";
            }*/
            ///sqlsrv_fetch_objec
            if($row=sqlsrv_fetch_array($res))
            {
                
                echo $row['Cpwd'];echo "<br/>";
              
                //比对密码
               
                echo $row['Cname'];
             
                //比对密码
                if(md5($pwd)==$row['Cpwd'])
                {
                    return $row['Cname'];  
                }
            }
            //资源
           
            //关闭连接
            $sqlHelper->close_connect();
          
            return "";
  }
    
    
    
    
}
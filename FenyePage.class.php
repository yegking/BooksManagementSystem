<?php

      //这是个用于保存分页的类
    class FenyPage{
        public $pageSize=6;
        public $res_array;//显示数据
        public $rowCount;//从数据库中获取
        public $pageNow=1;//用户指定从第几页开始
        public $pageCount;//计算得到
        public $navigate;//分页导航
        public $gotoUrl;//表示吧分页请求交给哪个页面
        
    }
?>
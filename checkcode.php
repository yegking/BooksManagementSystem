<?php
    //echo rand(2,9);
    //echo "<br/>".dechex(rand(1,15))."<br/>";
    session_start();
    $checkCode="";
    for($i=0;$i<4;$i++)
    {
        $checkCode.=dechex(rand(1,15));
        
    }
    $_SESSION['myCheckCode']=$checkCode;

    
    //创建图片，并把随机数画上去
    $img=imagecreatetruecolor(110, 40);
    //背景默认黑色，可以指定颜色
    $bgcolor=imagecolorallocate($img,0,0,0);
    imagefill($img,0,0,$bgcolor);
    //创建新的颜色
    $white=imagecolorallocate($img,255,255,255);
    $blue=imagecolorallocate($img,0,0,255);
    $red=imagecolorallocate($img, 255, 0, 0);
    $green=imagecolorallocate($img, 0, 255, 0);
    //画出干扰线
    for($i=0;$i<20;$i++)
    {
        //颜色随机
        imageline($img,rand(0,110),rand(0,30), rand(0,110), rand(0,30),imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255)));
        
    }
    
    //把四个随机值画上去
    imagestring($img, rand(1,5), rand(2,80), rand(2,10), $checkCode,$white);
    
    //如何要使用中文 自己查去
   // array imagefttext(string $font_file, string $text, $angle, $x, $y, $color, $fontfile, $text)
    
    
    
    
    header("content-type: image/png");
    imagepng($img);
    
 ?>
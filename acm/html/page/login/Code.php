<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-26
 * Time: 下午10:39
 */
    session_start();
    $time=4*60;
    session_set_cookie_params($time);
    header("Content-Type:image/png");
    $image_width=100;
    $image_height=40;
    $new_number="";
    srand(microtime()*100000);
    for($i=0;$i<4;$i++)
    {
        $new_number.=dechex(rand(0,15));
    }
    $_SESSION["check_checks"]=$new_number;
    $num_image=imagecreate($image_width,$image_height);
    imagecolorallocate($num_image,255,255,255);
    for($i=0;$i<strlen($_SESSION["check_checks"]);$i++)
    {
        $font_size=mt_rand(15,18);
        $x=mt_rand(1,8)+$image_width*$i/4;
        $y=mt_rand(15,$image_height/2+8);
        $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
        $font_path="../font/arial.ttf";
        imagettftext($num_image,$font_size,0,$x,$y,$color,$font_path,$_SESSION["check_checks"][$i]);
       // imagestring($num_image,$font,$x,$y,$_SESSION["check_checks"][$i],$color);
    }
    for($i=0;$i<150;$i++)
    {
        $x=mt_rand(1,$image_width);
        $y=mt_rand(1,$image_height);
        $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
        imagesetpixel($num_image,$x,$y,$color);
    }
    for($i=0;$i<4;$i++){
        $color=imagecolorallocate($num_image,mt_rand(220,225),mt_rand(220,225),mt_rand(220,225));
        imagedashedline($num_image,mt_rand(1,$image_width/3),mt_rand(1,$image_height/3),mt_rand(50,$image_width),mt_rand(15,$image_height),$color);
    }
    $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
    //imagearc($num_image,30,25,15,40,170,0,$color);
    $h=$image_height;
    $h1=mt_rand(-5,5);
    $h2=mt_rand(-1,1);
    $w2=mt_rand(10,15);
    $h3=mt_rand(4,6);
    $w=$image_width;
    for($i=-$w/2;$i<$w/2;$i=$i+0.1)
    {
        $y=$h/$h3*sin($i/$w2)+$h/2+$h1;
        imagesetpixel($num_image,$i+$w/2,$y,$color);
        $h2!=0?imagesetpixel($num_image,$i+$w/2,$y+$h2,$color):null;
    }
    imagepng($num_image);
    imagedestroy($num_image);
?>
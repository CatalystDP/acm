<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午1:44
 */
    $path="../../img/upload/";
    //$_SESSION["image"]=null;
    if(!empty($_FILES['picture']['name']))
    {
        $ImageInfo=$_FILES['picture'];
        if($ImageInfo['size']<1000000&&$ImageInfo['size']>0)
        {
            move_uploaded_file($ImageInfo['tmp_name'],$path.$ImageInfo['name']);
            //$_SESSION["image"]=$ImageInfo['name'];
            //setcookie("image",$ImageInfo['name'],time()+300);
            echo "img/upload/".$ImageInfo['name'];
        }
        else
        {
            echo false;
        }
    }
?>
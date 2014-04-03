<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午1:44
 */
    $path="../upload/";
    if(!empty($_FILES['picture']['name']))
    {
        $ImageInfo=$_FILES['picture'];
        if($ImageInfo['size']<1000000&&$fileinfo['size']>0)
        {
            move_uploaded_file($ImageInfo['tmp_name'],$path.$ImageInfo['name']);
            echo $path.$ImageInfo;
        }
        else
        {
            echo false;
        }
    }
?>
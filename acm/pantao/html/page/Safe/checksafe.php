<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午3:01
 */
    $safearray=array("select","drop","update","insert","delete","alter");
    $safestr="fleet";
    function check_special($str)
    {
        global $safearray;
        foreach($safearray as $key=>$a)
        {
            str_ireplace($a,$a,$str);
        }
        foreach($safearray as $key=>$a)
        {
            if(substr_count($str,$a))
            {
                return true;
            }
        }
        return false;
    }
?>
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午8:08
 */
    include_once("../DB/ObjectData.inc.php");
    $strsql="select * from school;";
    $school=$_REQUEST['school'];
    $tmp=$admindb->ExecSQL($strsql,$conn);
    $res=0;
    if($tmp)
    {
        foreach($tmp as $a)
        {
            if(!strcmp($a['Name'],$school))
            {
                $res=1;
            }
        }
    }
    if(!$res)
    {
        $strsql=sprintf("insert into school(Name) VALUES ('%s')",mysql_real_escape_string($school));
        $tmp=$admindb->ExecSQL($strsql,$conn);
        if($tmp)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    $connobj->CloseConnid();
?>
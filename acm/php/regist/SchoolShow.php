<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-24
 * Time: 下午11:00
 */
    include_once("../DB/ObjectData.inc.php");
    $strsql="select * from school;";
    header("Content-Type:text/html;charset=utf8");
    $tmp=$admindb->ExecSQL($strsql,$conn);
    if($tmp)
    {
    foreach($tmp as $a)
    {
        echo "<option value='".$a['Name']."'>".$a['Name']."</option>";
    }
    $connobj->CloseConnid();
    }
?>
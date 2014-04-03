<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-27
 * Time: 下午4:35
 */
    include_once("../DB/ObjectData.inc.php");
    $username=$_SESSION["username"];
    $strsql=sprintf("select * from users where username='%s'",mysql_real_escape_string($username));
    header("Content-Type:text/html;charset=utf8");
    $tmp=$admindb->ExecSQL($strsql,$conn);
    $connobj->CloseConnid();


?>
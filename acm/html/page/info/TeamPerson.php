<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-4-1
 * Time: 下午12:55
 */

   // include_once("../DB/ObjectDataSame.inc.php");
    $strsql3=sprintf("select * from users where username='%s' or username='%s' or username='%s'"
        ,mysql_real_escape_string($username1),mysql_real_escape_string($username2),mysql_real_escape_string($username3));
    $tmp2=$admindb->ExecSQL($strsql3,$conn);
    $connobj->CloseConnid();
?>
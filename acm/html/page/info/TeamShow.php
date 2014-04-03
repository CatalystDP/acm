<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-31
 * Time: 下午9:13
 */
    include_once("../DB/ObjectDataSame.inc.php");
    $strsql2=sprintf("select * from team where id='%s'",mysql_real_escape_string($teamid));
    $tmp1=$admindb->ExecSQL($strsql2,$conn);
  //  $connobj->CloseConnid();
?>
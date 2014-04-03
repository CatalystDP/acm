
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午8:42
 */
    include_once("../DB/ObjectData.inc.php");
    $username=$_REQUEST['username'];
    $strsql=sprintf("select * from users where username='%s'",mysql_real_escape_string($username));
    $tmp=$admindb->ExecSQL($strsql,$conn);
    if($tmp)
    {
        echo $tmp[0]['picture'];
    }
    else
    {
        echo false;
    }
    $connobj->CloseConnid();
?>
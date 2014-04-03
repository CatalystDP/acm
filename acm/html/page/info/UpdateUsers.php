<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-28
 * Time: 下午11:15
 */
    header("Content-Type:text/html;charset=utf8");
    session_start();
    include_once("../Safe/checksafe.php");
    include_once("../DB/ObjectData.inc.php");
    $username=$_SESSION["username"];
    $email=$_REQUEST['email'];
    if(check_special($email)||check_special($username))
    {
        echo "<script language='JavaScript'>alert('输入字符非法！');history.back();</script>";
    }
    $grade=$_REQUEST['grade'];
    $picture=$_REQUEST["picpath"];
    $strsql=sprintf("update users set grade='%s',email='%s',picture='%s' where username='%s'",
        mysql_real_escape_string($grade),mysql_real_escape_string($email)
        ,mysql_real_escape_string($picture),mysql_real_escape_string($username));
    $tmp=$admindb->ExecSQL($strsql,$conn);
    $connobj->CloseConnid();
    if($tmp)
    {
        echo "<script language='JavaScript'>alert('修改成功！');history.back();</script> ";
    }
    else
    {
        echo "<script language='JavaScript'>alert('修改失败！');history.back();</script> ";
    }

?>
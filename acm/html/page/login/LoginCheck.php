<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午8:54
 */
    session_start();
    session_set_cookie_params(10*60);
    header("Content-Type:text/html;charset=utf8");
    include_once("../DB/ObjectData.inc.php");
    include_once("../Safe/checksafe.php");
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $validate=$_REQUEST['validate'];
    $check=$_SESSION["check_checks"];
  // var_dump($check);
    if(check_special($username))
    {
        echo "<script language='JAVASCRIPT'>alert('输入内容非法！');history.back();</script>";
    }
    if($validate!=$check)
    {
        echo "<script language='JavaScript'>alert('验证码错误！');history.back();</script>";
    }
    $sqlstr=sprintf("select * from users where username='%s'",mysql_real_escape_string($username));
    $tmp=$admindb->ExecSQL($sqlstr,$conn);
   // print_r($tmp);
 //   $pwd=trim(md5($tmp[0]['password']).$safestr);
 //  var_dump($pwd);
   if($tmp)
    {
        $pwd=trim(md5($password).$safestr);
        if(!strcmp($pwd,$tmp[0]['password']))
        {
            $_SESSION["username"]=$username;
            echo "<script language='JavaScript'>alert('登陆成功!');window.location.href='../index/index.html';</script>";
        }
        else
        {
            echo "<script language='JavaScript'>alert('密码错误');history.back();</script>";
        }
    }
    else
    {
        echo "<script language='JavaScript'>alert('无此用户名');history.back();</script>";
    }

?>
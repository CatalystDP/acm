<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-29
 * Time: 上午10:36
 */
    session_start();
    session_unset($_SESSION["username"]);
    header("Content-Type:text/html;charset=utf8");
    echo "<script language='JavaScript'>alert('注销成功');window.location.href='../index/'</script>";
?>
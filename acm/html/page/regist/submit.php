<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午1:54
 */
   header("Content-Type:text/html;charset=utf8");

   include_once("../Safe/checksafe.php");
   include_once("../DB/ObjectData.inc.php");
   $username=$_REQUEST['username'];
   if(check_special($username))
   {
       echo "<script language='JavaScript'>alert('输入字符非法！');history.back();</script>";
   }
   $password=trim(md5($_REQUEST['password']).$safestr);
   $email=$_REQUEST['email'];
   $school=$_REQUEST['school'];
   $sex=$_REQUEST['sex'];
   $grade=$_REQUEST['grade'];
   $stuname=$_REQUEST['stuname'];
   $picture=$_REQUEST["picpath"];
    /*if(isset($_COOKIE["image"]))
    {
       // echo "dsaa";
        $picture=$_COOKIE["image"];
    }
  /* if(!empty($_FILES['picpath']['name']))
   {
       $picture=$_FILES['picpath']['name'];
   }*/
   $strsql=sprintf("insert into users (username,password,email,school,sex,grade,stuname,picture) values
   ('%s','%s','%s','%s','%s','%s','%s','%s');",mysql_real_escape_string($username),mysql_real_escape_string($password)
   ,mysql_real_escape_string($email),mysql_real_escape_string($school),mysql_real_escape_string($sex),
   mysql_real_escape_string($grade),mysql_real_escape_string($stuname),mysql_real_escape_string($picture));
   header("Content-Type:text/html;charset=utf8");
  // echo $strsql;
   $tmp=$admindb->ExecSQL($strsql,$conn);
   if($tmp)
   {
       echo "<script language='JavaScript'>alert('注册成功');window.location.href='../login/index.html';</script>";
   }
   else
   {
       echo "<script language='JavaScript'>alert('注册失败');history.back();</script>";
   }
    $connobj->CloseConnid();
?>
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-25
 * Time: 下午1:54
 */
   include_once("../Safe/checksafe.php");
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
   if(!empty($_FILES['picture']['name']))
   {
       $picture=$_FILES['picture']['name'];
   }
   $strsql="insert into users(username,password,email,school,sex,grade,stuname,picture) values
   ('".$username."','".$password."','".$email."','".$school."','".$sex."','".$grade."','".$stuname."','".$picture."')";
   include_once("../DB/ObjectData.inc.php");
   $tmp=$admindb->ExecSQL($strsql,$conn);
   if($tmp)
   {
       echo "<script language='JavaScript'>alert('注册成功');window.location.href='../login/';</script>";
   }
   else
   {
       echo "<script language='JavaScript'>alert('注册失败');history.back();</script>";
   }
?>
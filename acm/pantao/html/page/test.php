<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-24
 * Time: 下午11:27
 */
    include_once("DB/ObjectData.inc.php");
    $strsql="select * from school;";
    header("Content-Type:text/html;charset=utf8");
    $tmp=$admindb->ExecSQL($strsql,$conn);
   // print_r($tmp);
    if($tmp)
    {
        foreach($tmp as $a)
        {
            echo $a['Name']."<br>";
        }
    }
    $connobj->CloseConnid();
    /*$conn=mysql_connect("localhost","root","111");
    mysql_select_db("testinfo",$conn);
    mysql_query("set names utf8");
    $strsql="select * from school";
    header("Content-Type:text/html;charset=utf8");
    $rs=mysql_query($strsql);
    $arrays=array();
    while($array=mysql_fetch_array($rs))
    {
        array_push($arrays,$array);
    }
    foreach($arrays as $tmp)
    {
        echo $tmp['Name']."<br>";
    }*/
?>
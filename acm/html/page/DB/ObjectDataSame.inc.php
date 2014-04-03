<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-3-24
 * Time: 下午8:54
 */
//数据库类实例化
  //  require("Db.inc.php");
    $connobj=new ConnDB("mysql","localhost","root","111","testinfo");
    $conn=$connobj->GetConnidSame();
    $admindb=new AdminDb();
    $seppage=new SepPage();

?>
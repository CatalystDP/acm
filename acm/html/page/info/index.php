<!DOCTYPE
        html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="cn" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <title></title>
    <base href="http://192.168.63.1/acm/html/"/>
    <!-- <base href="http://localhost/acm/html/"/>
    -->
    <link rel="stylesheet" href="css/info/index.css"/>
    <link rel="stylesheet" href="css/tools/dp&mz_tools.css"/>
</head>
<body>
    <div class="hd-wp">
        <div class="l-hd-c center">
            <div class="hd-logo-wp float-left position-relative">
                <a href="page/index">
                    <img src="img/index/logo.gif" alt=""/>
                </a>
            </div>
            <div class="hd-login-wp float-right">
                <!--<a class="float-left hd-login-logined" href="">某用户</a>
                <!-- php控制登录后 a标签加上 hd-login-logined类，
                链接为当前用户修改信息页 -->
                <?php
                    session_start();
                    header("Content-Type:text/html;charset=utf8");
                    if(!empty($_SESSION["username"]))
                    {
                        echo "<a class='float-left hd-login-logined' href='page/info/index.php'>".$_SESSION["username"]."</a>";
                echo "<a class='float-left' href='page/logout/logout.php'>退出</a>";
                }
                else
                {
                    echo "<script language='JavaScript'>alert('请先登陆！！');window.location.href='page/login/';</script>";
                }
                ?>
               <!-- <a class="float-left" href="">退出</a>-->
                <!-- 注销--> </div>
        </div>
    </div>
    <div class="nav-wp center">
        <div class="l-nav-c float-right">
            <ul>
                <li>
                    <a href="">测试</a>
                </li>
                <li>
                    <a href="">测试</a>
                </li>
                <li>
                    <a href="">测试</a>
                </li>
                <li>
                    <a href="">测试</a>
                </li>
                <li>
                    <a href="">测试</a>
                </li>
                <li>
                    <a href="">测试</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="v-marginfix" ></div>
    <div class="l-info-wp sk-info-wp center">
        <div class="v-marginfix"></div>
        <div class="l-baseinfo-wp sk-baseinfo-wp">
            <h1 class="l-personinfo-title sk-personinfo-title float-left">个人信息</h1>
            <div class="l-btn l-edit-btn sk-btn sk-edit-btn  float-right">
                <span class="l-btn-icon sk-btn-icon float-left"></span>
                <span class="js-btn-content">编辑</span>
            </div>
            <div class="v-marginfix clearfix"></div>
            <div class="l-main">
                <div class="l-display-baseinfo-wp sk-display-baseinfo-wp float-left">
                    <ul class="l-baseinfo-display js-display-block">
                        <!-- 
                            该部分为显示个人信息
                            每个li里面的 span.l-label span.l-content内容由php 渲染
                                其他部分由php原样输出,php demo

                                echo "<li>
                        <span class="l-label sk-label">$variable</span>
                        <span class="l-content sk-content">.$variable1.</span>
                    </li>
                    "
                                还需要ajax接口，用来返回保存后更新的数据，
                                格式同上
                            php调用的文件为
                            elements/info/baseinfodisplay.html
                            -->
                        <?php
                        // session_start();
                        include_once("PersonShow.php");
                        $username=$_SESSION["username"];
                        $email=$tmp[0]['email'];
                        $school=$tmp[0]['school'];
                        $sex=$tmp[0]['sex'];
                        $grade=$tmp[0]['grade'];
                        $stuname=$tmp[0]['stuname'];
                        include_once("../../elements/info/baseinfodisplay.php");
                        ?>
                </ul>
                <form action="" class="l-baseinfo-form">
                    <ul class="js-display-none">
                        <!--
                                该部分为编辑状态时，可编辑的email 年级
                                每个li里面的 span.l-label span.l-content内容由php 渲染
                                php demo
                                echo "<li>
                        <span class="l-label sk-label">$variable</span>
                        <span class="l-content sk-content">.$variable1.</span>
                    </li>
                    "
                                如果碰到input标签则渲染input 的value属性
                                select里面需要渲染option,与注册一样
                                php调用的文件为
                                elements/info/baseinfoedit.html
                            -->
                        <?php
                        include_once("PersonShow.php");
                        $username=$_SESSION["username"];
                        $school=$tmp[0]['school'];
                        $sex=$tmp[0]['sex'];
                        $stuname=$tmp[0]['stuname'];
                        include("../../elements/info/baseinfoedit.php");
                        ?>
                </ul>
                <input type="hidden" id="picpath" name="picpath" value=/>
            </form>
        </div>
        <div class="l-uploadpic-wp sk-uploadpic-wp float-right">
            <img src="img/defaultpic/defaultpic.gif" alt="未上传头像" class="l-registpic sk-personpic float-right" />
            <p class="clearfix">图片尺寸不可以超过150*150</p>
            <form class="l-uploadpic-form position-relative" method="post" enctype="multipart/form-data" encoding="multipart/form-data"  action="page/regist/ImageUpload.php" target="uploadiframe">
                <input type="button" class="l-upload-pic sk-upload-pic js-upload-pic js-display-none position-absolute" value="上传图片"/>
                <input type="file" name="picture" id="picture" class="position-absolute" class="js-display-none"/>
            </form>
            <iframe id="piciframe" style="width:0;height:0;" src="" name="uploadiframe" frameborder="0"></iframe>
        </div>
    </div>
</div>
<div class="v-marginfix l-split-line sk-split-line clearfix"></div>
<div class="l-teaminfo-wp l-main sk-teaminfo-form">
    <!-- 在l-teaminfo-wp要渲染两种状态，如果已经创建队伍就渲染elements/info中的teamlist.html
        如果，未创建队伍则渲染teamcreate.html的内容
     -->
    <?php
        include_once("PersonShow.php");
        $teamid=$tmp[0]['teamid'];
        $school=$tmp[0]['school'];
        if($teamid)
        {
            include_once("TeamShow.php");
            $username1=$tmp1[0]['username1'];
            $username2=$tmp1[0]['username2'];
            $username3=$tmp1[0]['username3'];
            $coach=$tmp1[0]['coach'];
            $property=$tmp1[0]['property'];
            $name=$tmp1[0]['name'];
            $status=$tmp1[0]['status'];
            include("../../elements/info/teamlist.php");
        }
        else
        {
            include("../../elements/info/teamcreate.php");
        }
    ?>

</div>
</div>

<div class="v-marginfix"></div>
<div id="footer" class="l-footer-wp sk-footer-wp">
<div class="l-footer-c sk-footer-c center">
    <span>联系方式:</span>
    <span class="block-margin">898088908900</span>
    <span class="footer-margin">email:</span>
    <span class="block-margin">dasasdddas@ddas.com</span>
</div>
</div>
<script src="seajs/sea.js"></script>
<script>
    seajs.config({
        alias: {
            "jquery": "js/tools/jquery-1.10.2.min.js",
            "jqueryColor": "js/tools/jquery.color-2.1.2.min.js"
        }
    });
    seajs.use("js/app/info/index.js");
</script>
</body>
</html>
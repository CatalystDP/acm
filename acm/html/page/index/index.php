<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="cn" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://localhost/acm/html/"/>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Emulate=IE7">
    <title></title>
    <link rel="stylesheet" href="css/index/index.css"/>
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
                echo"<a class='float-left' href='page/login'>登录</a>";
                echo"<a class='float-left' href='page/regist'>注册</a>";
            }
            ?>
            <!--<a class="float-left" href="page/login">登录</a>-->
            <!-- php控制登录后 a标签加上 hd-login-logined类，
                链接为当前用户修改信息页 -->
             <!--  <a class="float-left" href="page/regist">注册</a>-->
            <!-- 登录后php 修改为退出，href为退出对应的php -->
        </div>
    </div>
</div>
<div class="nav-wp center">
    <div class="l-nav-c float-right">
        <ul>
            <li><a href="">测试</a></li>
            <li><a href="">测试</a></li>
            <li><a href="">测试</a></li>
            <li><a href="">测试</a></li>
            <li><a href="">测试</a></li>
            <li><a href="">测试</a></li>
        </ul>
    </div>
</div>
<div id="banner-wp" class="l-banner-wp">
    <div id="banner-key-prev" class="banner-key sk-banner-key">
    </div>
    <div id="banner-key-next" class="banner-key sk-banner-key">
    </div>
    <div class="banner">
        <img src="img/index/02_slide_1.jpg" alt=""/>
        <img src="img/index/03_slide_1.jpg" alt=""/>
        <img src="img/index/04_slide_1.jpg" alt=""/>
        <img src="img/index/05_slide_1.jpg" alt=""/>
        <img src="img/index/06_slide_1.jpg" alt=""/>
        <img src="img/index/08_slide_1.jpg" alt=""/>
        <img src="img/index/09_slide_1.jpg" alt=""/>
    </div>
</div>
<div class="l-content-wp">
    <div class="l-content-first sk-content-first l-content">
        <div class="center">
            <img class="display-block center" src="img/index/icon1.png" alt=""/>

            <h1>
                Hello there! We are awesome creative agency. Here is some of our works.
            </h1>
        </div>
    </div>
    <div class="l-content-second l-content sk-content-second">
        <div class="center">
            <h2 class="text-horizon-align-center">Featured work</h2>
            <img class="display-block center" src="img/index/img01.png" alt=""/>

            <p class="center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
        </div>
    </div>
    <div class="l-content-third l-content sk-content-third">
        <div class="l-col-wp center">
            <div class="l-col-1 l-col sk-col">
                <p>测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                    测试测试测试测试测试测试测试测试测试测试
                </p>
            </div>
            <div class="l-col-2 sk-col-2 l-col sk-col">
                <p></p>
            </div>
            <div class="l-col-3 l-col sk-col">
                <p></p>
            </div>
        </div>
    </div>
    <div class="v-marginfix clearfix"></div>
    <div class="l-content-fourth  l-content sk-content-fourth">
        <div class="l-fourth-c center">
            <div class="v-marginfix"></div>
            <img class="center" src="img/index/icon5.png" alt=""/>
            <div class="l-img-wp">
                <div class="no-margin">
                    <img src="img/index/img06.jpg" alt=""/>
                    <a class="l-img-detail" href="">Detail</a>
                </div>
                <!--这里可以不断加div，img里放不同图片 a的链接，由php生成-->
                <div>
                    <img src="img/index/img06.jpg" alt=""/>
                    <a class="l-img-detail" href="">Detail</a>
                </div>
                <div>
                    <img src="img/index/img06.jpg" alt=""/>
                    <a class="l-img-detail" href="">Detail</a>
                </div>
                <div class="no-margin marginTop">
                    <img src="img/index/img06.jpg" alt=""/>
                    <a class="l-img-detail" href="">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="v-marginfix clearfix"></div>
    <div class="l-content-fifth l-content sk-content-fifth">
        <div class="l-fifth-c center">
            <div class="v-marginfix"></div>
            <img class="display-block center" src="img/index/icon6.png" alt=""/>
            <div class="l-fifth-form-wp">
                <form action="">
                    <div class="l-input-wp sk-input-wp">
                        <label for="name">姓名</label>
                        <input id="name" class="center" name="name" type="text"/>
                    </div>
                    <div class="l-input-wp sk-input-wp">
                        <label for="studentid">学号</label>
                        <input id="studentid" class="center" name="studentid" type="text"/>
                    </div>
                    <div class="l-input-wp sk-input-wp">
                        <label for="content">内容</label>
                        <textarea id="content" name="content" class="center"></textarea>
                    </div>
                    <div class="l-submit sk-submit center">提交</div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="l-footer-wp sk-footer-wp">
    <div class="l-footer-c sk-footer-c center">
            <span class="footer-margin">Email :</span>
            <span class="block-margin">dlmu_acm2013@163.com</span>
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
    seajs.use("js/app/index/index.js");
</script>
</body>
</html>
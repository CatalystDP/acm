    <?php
        $username=$_REQUEST['username'];
        include_once("../../page/info/PersonShow.php");
    ?>
    <span>用户名</span>
    <span><!-- 渲染用户--><?php echo $tmp[0]['username'];?></span>
    <div class="v-marginfix"></div>
    <span>姓名</span>
    <span><!-- 渲染姓名 --><?php echo $tmp[0]['stuname'];?></span>
    <div class="v-marginfix"></div>
    <span>性别</span>
    <span><!-- 渲染性别--><?php echo $tmp[0]['sex'];?></span>
    <div class="v-marginfix"></div>
    <span>邮箱</span>
    <span><!-- 渲染邮箱 --><?php echo $tmp[0]['email'];?></span>
    <div class="v-marginfix"></div>
    <span>年级</span>
    <span><!-- 渲染年级 --><?php echo $tmp[0]['grade'];?></span>
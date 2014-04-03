<li>
    <span class="l-label sk-label">用户名</span>
    <span class="l-content sk-content"><?php echo $username;?></span>
</li>

<li class="l-left-margin">
    <span class="l-label sk-label">邮箱</span>
    <input type="text" class="l-content sk-content" name="email" id="email" value=""/>
</li>

<li class="l-top-margin">
    <span class="l-label sk-label">学校</span>
    <span class="l-content sk-content"><?php echo $school;?></span>
</li>

<li class="l-left-margin l-top-margin">
    <span class="l-label sk-label">性别</span>
    <span class="l-content sk-content"><?php echo $sex; ?></span>
</li>

<li class="l-top-margin">
    <span class="l-label sk-label">年级</span>
    <select name="grade" id="grade">
        <option value="大一">大一</option>
        <option value="大二">大二</option>
        <option value="大三">大三</option>
        <option value="大四">大四</option>
        <option value="研一">研一</option>
    </select>
</li>

<li class="l-left-margin l-top-margin">
    <span class="l-label sk-label">姓名</span>
    <span class="l-content sk-content"><?php echo $stuname; ?></span>
</li>
<!-- 所有的php渲染都是对<td>标签的内容进行渲染 -->
<div class="l-btn l-edit-btn sk-btn sk-edit-btn  float-right">
        <span class="l-btn-icon sk-btn-icon float-left"></span>
        <span class="js-btn-content">编辑</span>
    </div>
    <div class="v-marginfix clearfix"></div>
      <table class="js-teaminfo-display" style="display:block;">
        <tr>
            <th>队名</th>
            <th>学校</th>
            <th>赛制</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年级</th>
            <th>邮箱</th>
            <th>教练</th>
            <th>状态</th>
        </tr>
        <tr>
            <td><?php echo $name; ?></td>
            <!-- 渲染队名 -->
            <td><?php echo $school;?></td>
            <!-- 渲染学校 -->
            <td><?php echo $property?></td>
            <!-- 渲染赛制 -->
            <?php
                include_once("../../page/info/TeamPerson.php");
            ?>
            <td>
                <p><?php echo $tmp2[0]['stuname'];?></p>
                <p><?php
                    if(isset($tmp2[1]))
                    {
                        echo $tmp2[1]['stuname'];
                    }
                   ?></p>
                <p><?php
                    if(isset($tmp2[2]))
                    {
                        echo $tmp2[2]['stuname'];
                    }
                    ?></p>
            </td>
            <!-- 渲染姓名格式:<p>人名</p> -->
            <td>
                <p><?php echo $tmp2[0]['sex'];?></p>
                <p><?php
                    if(isset($tmp2[1]))
                    {
                        echo $tmp2[1]['sex'];
                    }
                    ?></p>
                <p><?php
                    if(isset($tmp2[2]))
                    {
                        echo $tmp2[2]['sex'];
                    }
                    ?></p>
            </td>
            <!-- 渲染性别格式同人名 -->
            <td>
                <p><?php echo $tmp2[0]['grade'];?></p>
                <p><?php
                    if(isset($tmp2[1]))
                    {
                        echo $tmp2[1]['grade'];
                    }
                    ?></p>
                <p><?php
                    if(isset($tmp2[2]))
                    {
                        echo $tmp2[2]['grade'];
                    }
                    ?></p>
            </td>
            <!-- 渲染年级格式同人名 -->
            <td>
                <p><?php echo $tmp2[0]['email'];?></p>
                <p><?php
                    if(isset($tmp2[2]))
                    {
                        echo $tmp2[2]['email'];
                    }
                    ?></p>
                <p><?php
                    if(isset($tmp2[2]))
                    {
                        echo $tmp2[2]['email'];
                    }
                    ?></p>
            </td>
            <!-- 渲染邮箱格式同人名 -->
            <td><?php echo $coach ?></td>
            <!-- 教练 -->
            <?php
                if($status=="pending")
                {
                    echo "<td style='color: red'>$status</td>";
                }
                else
                {
                    echo "<td style='color: green'>$status</td>";
                }
            ?>
            <!-- 状态 -->
        </tr>
    </table>  
    <form action="" class="js-teaminfo-edit" style="display: none;">
        <table cellpadding="0">
            <tr>
                <th>队名</th>
                <th>学校</th>
                <th>赛制</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年级</th>
                <th>邮箱</th>
                <th>教练</th>
                <th>状态</th>
            </tr>
            <tr>
                <td class="l-can-edit js-can-edit">
                    <textarea type="text" name="teamname" id="teamname"><?php echo $name; ?></textarea>
                </td>
                <td><?php echo $school?></td>
                <td class="l-can-edit js-can-edit">
                    <select name="rules" id="rules" style="width:80px;">
                        <?php
                            if($property=="网络赛")
                            {
                                echo " <option value='网络赛' selected='selected'>网络赛</option>
                        <option value='现场赛'>现场赛</option>";
                            }
                            else
                            {
                                echo " <option value='网络赛'>网络赛</option>
                        <option value='现场赛' selected='selected'>现场赛</option>";
                            }
                        ?>

                        <!-- 根据数据库的比赛信息，php给option动态添加selected=selected -->
                    </select>
                </td>
                <td>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="personname[]" value="<?php echo $tmp2[0]['stuname'];?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="personname[]" value="<?php
                        if(isset($tmp2[1]))
                        {
                            echo $tmp2[1]['stuname'];
                        }
                        ?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="personname[]" value="<?php
                        if(isset($tmp2[2]))
                        {
                            echo $tmp2[2]['stuname'];
                        }
                        ?>"/>
                    </p>
                </td>
                <td>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="sex[]" value="<?php echo $tmp2[0]['sex'];?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="sex[]" value="<?php
                        if(isset($tmp2[1]))
                        {
                            echo $tmp2[1]['sex'];
                        }
                        ?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="sex[]" value="<?php
                        if(isset($tmp2[2]))
                        {
                            echo $tmp2[2]['sex'];
                        }
                        ?>"/>
                    </p>
                </td>
                <td>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="grade[]" value="<?php echo $tmp2[0]['grade'];?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="grade[]" value="<?php
                        if(isset($tmp2[1]))
                        {
                            echo $tmp2[1]['grade'];
                        }
                        ?>"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="grade[]" value="<?php
                        if(isset($tmp2[2]))
                        {
                            echo $tmp2[2]['grade'];
                        }
                        ?>"/>
                    </p>
                </td>
                <td>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="email[]" value="人"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="email[]" value="人"/>
                    </p>
                    <p class="l-can-edit js-can-edit">
                        <input type="text" name="email[]" value="人"/>
                    </p>
                </td>
                <td><?php echo $coach;?></td>
                <?php
                if($status=="pending")
                {
                    echo "<td style='color: red'>$status</td>";
                }
                else
                {
                    echo "<td style='color: green'>$status</td>";
                }
                ?>
            </tr>
            <!-- 这里的渲染是对textarea标签的内容和input value的渲染 -->
        </table>
    </form>
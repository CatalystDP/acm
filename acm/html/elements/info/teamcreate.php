 <div class="l-create-team sk-create-team js-team-btn float-left">创建队伍</div>
    <div class="v-marginfix clearfix"></div>
    <form action="">
        <div class="l-teamregist">
            <label for="rules">
                赛制
                <span>*</span>
            </label>
            <select name="rules" id="rules">
                <option value="网络赛" selected="selected">网络赛</option>
                <option value="现场赛">现场赛</option>
            </select>
        </div>
        <div class="l-teamregist">
            <label for="teamname">
                队名
            <span>*</span>
            </label>
            <input type="text" name="teamname" id="teamname"/>
        </div>
        <div class="l-teamregist">
            <label for="">
                教练
            <span>*</span>
            </label>
            <input type="text" name="coach" id="coach"/>
        </div>
        <div class="l-teamregist">
            <label for="teammember1">
                队员1
                <span>*</span>
            </label>
            <input type="text" name="teammember[]" id="teammember1"/>
            <input type="button" class="js-addmember" value="添加"/>
            <div class="v-marginfix"></div>
            <div class="js-user-detail">
            <!-- php渲染elements/info/memberinfo中的内容并回传过来-->
            </div>
        </div>
        <div class="l-teamregist">
            <label for="teammember2">
                队员2
                <span>*</span>
            </label>
            <input type="text" name="teammember[]" id="teammember2" />
            <input type="button" class="js-addmember" value="添加"/>
            <div class="v-marginfix"></div>
            <div class="js-user-detail">
            <!-- php渲染elements/info/memberinfo中的内容并回传过来-->
            </div>
        </div>
        <div class="l-teamregist">
            <label for="teammember3">
                队员3
                <span>*</span>
            </label>
            <input type="text" id="teammember3" name="teammember[]" />
            <input type="button" class="js-addmember" value="添加"/>
            <div class="v-marginfix"></div>
            <div class="js-user-detail">
            <!-- php渲染elements/info/memberinfo中的内容并回传过来-->
            </div>
        </div>
    </form>
/**
 * Created by dp on 14-2-11.
 */
define(function (require, exports, module) {
    var $dm = dm, $ = jQuery,
        body = $("body");
    var view = require("./view");
    view.init(body);
    var model = require("./model");
    model.init(body);
    //your code goes here
    $dm.SandBox(undefined, function (undefined) {
        require.async("js/selfmodule/formvalidator.js",
            function () {
                run();
            });
        function run() {
            var validator = $dm.form.create(),
                form = body.find(".l-form-wp").find("form"),
                event = $dm.event.create();
            var userInfo = {
                oldpassword: undefined,
                password: undefined,
                confirmpassword: undefined
            };
            validator.config('instance', {
                lengthCheck: function (str) {
                    var length = str.length;
                    return (length >= 6 && length <= 16) ? true : false;
                }
            });
            var errMsg={
                1:"长度非法",
                2:"非法字符串",
                length:2
            };
            function commonCheck(str){
                /*
                * @return int {
                *   0:代表无错误,
                *   1:长度错误,
                *   2:非法字符串
                * }错误类型*/
                if (!validator.lengthCheck(str)) {
                    return 1;
                }
                if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                    return 2;
                }
             }
            formCollection={
                oldpassword:function(str){
                    var errType=commonCheck(str);
                    if(errType!=0)
                        return "旧密码"+errMsg[errType];
                    model.exModel.oldpasswordCheck(str,function(data){
                        event.eventHandler.emit("oldpasswordCheck",
                            form.find("#oldpassword"),data);
                    });
                },
                newpassword:function(str){
                    var errType=commonCheck(str);
                    userInfo.password=undefined;
                    if(errType!=0)
                        return "密码"+errMsg[errType];
                    userInfo.password=str;
                },
                confirmpassword:function(str){
                    var errType=commonCheck(str);
                    userInfo.confirmpassword=undefined;
                    if(errType!=0)
                        return "确认密码"+errMsg[errType];
                    if(userInfo.password!=str)
                        return "密码不一致";
                    userInfo.confirmpassword=str;
                }
            };
            event.eventHandler.on('oldpasswordCheck', function (selector, data) {
                if (data)
                    view.exView.formView.render.renderRouter("passwordErr", {
                        selector: selector,
                        data: "旧密码错误"
                    });
                else{
                    view.exView.formView.render.renderRouter("resetStatus", {
                        selector: selector,
                        data: ""
                    });
                    userInfo.oldpassword=selector.val();
                }

            });//添加用户名是否存在检测事件
            form.on("blur", ".l-input", function (e) {
                var target = $(e.currentTarget),
                    val = target.val(),
                    id=target.attr("id");
                view.exView.formView.render.renderRouter("resetStatus", {
                    selector: target,
                    data: ""
                });
                view.exView.formView.render.renderRouter("checkErr",{
                    selector:target,
                    data:formCollection[id](val)
                });
            });
            form.on("submit", function (e) {
                var target = $(e.currentTarget),
                    count = 0;
                for (var p in userInfo)
                    if (userInfo[p])
                        count += 1;
                return count==3? true:false;
            });
        }
    });
});
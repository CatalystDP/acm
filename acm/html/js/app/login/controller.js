/**
 * Created by dp on 14-2-11.
 */
define(function(require, exports, module) {
    var $dm = dm,
        $ = jQuery,
        body = $("body");
    var view = require("./view");
    view.init(body);
    var model = require("./model");
    model.init(body);
    //your code goes here
    require("js/selfmodule/formvalidator");
    $dm.SandBox(undefined, function(undefined) {

        var validator = $dm.form.create(),
            form = body.find(".l-form-wp").find("form");
        form.on("submit", function(e) {
            var target = $(e.currentTarget),
                inputArr = target.serializeArray(),
                userInfoArr=[inputArr[0]["value"],inputArr[1]["value"]],
                validateCode=inputArr[2]["value"];
            for (var i = 0, j = userInfoArr.length; i < j; i++) {
                if ((validator.hasSpace(userInfoArr[i])) || (!validator.isLegal(userInfoArr[i]))) {
                    view.exView.formview.render.renderRouter("inputerr", {
                        selector: undefined,
                        data: "用户名或密码非法"
                    });
                    return false;
                }
            }
            if(validateCode==""){
                alert("请输入验证码");
                return false;
            }
            if(validateCode.length!=4){
                alert("验证码错误");
                return false;
            }
            return true;
        });
        form.on(navigator.userAgent.indexOf("MSIE 7.0") ? "focusout" : "blur", "#username", function(e) {
            var target = $(e.currentTarget),
                usr = target.val();
            pic = $(e.delegateTarget).parent().siblings('.l-personpic');
            model.exModel.getUserPic(usr, function(data) {
                view.exView.userPicView.render.renderRouter("userpic", {
                    selector: pic,
                    data: data
                });
            });
        });//获取用户头像
        form.on("click", ".js-validate-code", function(e) {
            var target = $(e.currentTarget);
            target.attr("src","page/login/Code.php?r="+Math.random()+"");
        });
        form.on("click",".js-change-validate",function(e){
            var target=$(e.currentTarget),
                pic=target.siblings(".js-validate-code");
            pic.attr("src","page/login/Code.php?r="+Math.random()+"");
            e.preventDefault();
        });
    });
});
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
    $dm.SandBox(undefined, function(undefined) {
        require.async("js/selfmodule/formvalidator.js",
            function() {
                run();
            });

        function run() {
            var validator = $dm.form.create(),
                form = body.find(".l-form-wp").find("form"),
                event = $dm.event.create();
            var userInfo = {
                username: undefined,
                password: undefined,
                confirmpassword: undefined,
                stuname: undefined,
                email: undefined,
            };
            validator.config('instance', {
                userIsExist: function(str, selector) {
                    model.exModel.userNameCheck(str, function(data) {
                        event.eventHandler.emit("userCheck", selector, data);
                    });
                },
                lengthCheck: function(str) {
                    var length = str.length;
                    return (length >= 6 && length <= 16) ? true : false;
                },
                stunameCheck: function(str) {
                    var reg = /[\u4100-\u9FA5]|[\uF130-\uFFA0]/ig;
                    var s = str.match(reg);
                    return s ? s.join("") : undefined;
                },
                emailCheck: function(str) {
                    var reg = /\w+@[A-Za-z0-9]+\.[A-Za-z0-9]+(\.[A-Za-z0-9])*/g;
                    var s = str.match(reg);
                    return s ? (s.length == 1 ? true : false) : false;
                }
            });
            formCollection = {
                username: function(str) {
                    userInfo.username = undefined;
                    if (!validator.lengthCheck(str)) {
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                        return "用户名包含非法字符串";
                    }
                    validator.userIsExist(str, form.find("#username"));
                },
                password: function(str) {
                    userInfo.password = undefined;
                    if (!validator.lengthCheck(str)) {
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                        return "密码包含非法字符串";
                    }
                    userInfo.password = str;
                },
                confirmpassword: function(str) {
                    userInfo.confirmpassword = undefined;
                    if (!validator.lengthCheck(str)) {
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                        return "确认密码包含非法字符串";
                    }
                    if (userInfo.password != str)
                        return "密码不一致";
                    userInfo.confirmpassword = str;
                },
                email: function(str) {
                    userInfo.email = undefined;
                    if (!validator.emailCheck(str))
                        return "邮件格式错误";
                    userInfo.email = str;
                },
                stuname: function(str) {
                    stuname.coach = undefined;
                    if (validator.hasSpace(str))
                        return "姓名不能有空格";
                    if ((userInfo.stuname = validator.stunameCheck(str)) == undefined)
                        return "姓名格式不符合要求";
                }
            };
            event.eventHandler.on('userCheck', function(selector, data) {
                if (data)
                    view.exView.formView.render.renderRouter("userErr", {
                        selector: selector,
                        data: "用户名存在"
                    });
                else {
                    view.exView.formView.render.renderRouter("resetStatus", {
                        selector: selector,
                        data: ""
                    });
                    userInfo.username = selector.val();
                }

            }); //添加用户名是否存在检测事件
            form.on("blur", ".l-input", function(e) {
                var target = $(e.currentTarget),
                    val = target.val(),
                    id = target.attr("id");
                view.exView.formView.render.renderRouter("resetStatus", {
                    selector: target,
                    data: ""
                });
                view.exView.formView.render.renderRouter("checkErr", {
                    selector: target,
                    data: formCollection[id](val)
                });
            });
            var wp = form.find('.js-school-input-wp');
            form.on("click", ".l-other-school", function() {
                var isDisplayed = wp.css("display") == "block" ? true : false;
                view.exView.formView
                    .render.renderRouter("customschool", wp,
                        isDisplayed ? "none" : "block");
            });
            form.on("click", ".l-save-school", function(e) {
                var target = $(e.currentTarget),
                    schoolName = target.siblings(".js-school-input").val();
                model.exModel.saveSchool(str, function(data) {
                    if (schoolName != '')
                        view.exView.formView.render.renderRouter("addschool", {
                            selector: target.parent().siblings('#school'),
                            data: "<option value=" + schoolName + ">" + schoolName + "</option>"
                        });
                });
            });
            var uploadPicWrap=form.parent().siblings(".l-uploadpic-wp");
            uploadPicWrap.find('.l-uploadpic-form').
            on("click",".js-upload-pic",function(e){
               var target=e.target;
               target.previousSibling.previousSibling.click();
            }).on("change","#picture",function(e){
                
            });
            form.on("submit", function(e) {
                var target = $(e.currentTarget),
                    count = 0;
                for (var p in userInfo)
                    if (userInfo[p])
                        count += 1;
                console.log(target.serializeArray());
                return count == 5 ? true : false;
            });
        }
    });
});
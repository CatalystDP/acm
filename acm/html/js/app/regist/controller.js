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
                username: null,
                password: null,
                confirmpassword: null,
                stuname: null,
                email: null,
                phone:null
            };
            var errorList=[];
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
                },
                phoneCheck:function(str){
                    var reg=/\D+/g,
                        s=str.match(reg);
                    return s ? false:true;
                }
            });
            formCollection = {
                username: function(str) {
                    if (!validator.lengthCheck(str)) {
                        userInfo["username"]=false;
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                        userInfo["username"]=false;
                        return "用户名包含非法字符串";
                    }
                    userInfo["username"]=true;
                    // validator.userIsExist(str, form.find("#username"));
                },
                password: function(str) {
                    if (!validator.lengthCheck(str)) {
                        userInfo["password"]=false;
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                         userInfo["password"]=false;
                        return "密码包含非法字符串";
                    }
                         userInfo["password"]=true;
                },
                confirmpassword: function(str) {
                    if (!validator.lengthCheck(str)) {
                        userInfo["confirmpassword"]=false;
                        return "长度非法";
                    }
                    if ((validator.hasSpace(str)) || (!validator.isLegal(str))) {
                        userInfo["confirmpassword"]=false;
                        return "确认密码包含非法字符串";
                    }
                    if (form.find('#confirmpassword').val() != str){
                         userInfo["confirmpassword"]=false;
                         return "密码不一致";
                    }
                       userInfo["confirmpassword"]=true;
                },
                email: function(str) {
                    if (!validator.emailCheck(str)){
                        userInfo["email"]=false;
                         return "邮件格式错误";
                    }
                       userInfo["email"]=true;
                },
                stuname: function(str) {
                    if (validator.hasSpace(str)){
                        userInfo["stuname"]=false;
                        return "姓名不能有空格";
                    }
                        
                    if ((userInfo.stuname = validator.stunameCheck(str)) == undefined){
                        userInfo["stuname"]=false;
                        return "姓名格式不符合要求";
                    }
                        userInfo["stuname"]=true;
                },
                phone:function(str){
                    if(validator.hasSpace(str))
                    {
                        userInfo["phone"]=false;
                        return "电话号码不能有空格";
                    }
                    if(!validator.phoneCheck(str))
                    {
                        userInfo["phone"]=false;
                        return "电话号码格式非法";
                    }
                    userInfo["phone"]=true;
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
            event.eventHandler.on("validate",function(){

            });
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
                var select = target.parent().siblings('#school');
                var isExit=false;
                var options=select.find('option');
                for(var i=0,j=options.length;i<j;i++)
                    if(options[i].value==schoolName)
                        isExit=true;
                model.exModel.saveSchool(schoolName, function(data) {
                    if (schoolName != '') {
                        if (!isExit)
                            view.exView.formView.render.renderRouter("addschool", {
                                selector: target.parent().siblings('#school'),
                                data: "<option value=" + schoolName + " selected=selected>" + schoolName + "</option>"
                            });
                    }
                });
            });
            var uploadPicWrap = form.parent().siblings(".l-uploadpic-wp");
            uploadPicWrap.find('.l-uploadpic-form')
                .on("change", "#picture", function(e) {
                    e.delegateTarget.submit();
                });
            uploadPicWrap.find('#piciframe').on("load", function(e) {
                var target = e.currentTarget;
                var url = target.contentWindow.document.
                getElementsByTagName("body")[0].innerText;
                uploadPicWrap.find(".l-registpic").attr('src', url);
                form.find("#picpath").val(url);
            });
            form.on("submit", function(e) {
                var target = $(e.currentTarget),
                    count = 0,p;
                var arr,m;
                if(userInfo["username"]==null){
                    arr=target.serializeArray();
                    for(var i=0,j=arr.length;i<j;i++){
                        if(m=formCollection[arr[i]["name"]])
                            m(arr[i]["value"]);
                    }
                }
                   
                for (p in userInfo)
                    if (userInfo[p])
                        count += 1;
                return count == 6 ? true : false;
            });

        }
    });
});
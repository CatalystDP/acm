/**
 * Created by dp on 14-2-11.
 */
define(function (require, exports, module) {
    var $dm = dm,
        $ = jQuery,
        body = $("body");
    var _window = window;
    var Model = new dm.Model();
    var View = new dm.View();
    var Controller = new dm.Controller({
        domStore: {
            "info": body.find(".l-info-wp")
        }
    });
    require("js/app/header/header.js").init(body);
    View.addRender({
        changebtncontent: function (selector, data) {
            selector.text(data);
        }, //点击保存编辑按钮时改变内容
        baseinfo_edit: function (selector, data) {
            selector["baseinfodisplay"].css("display", "none");
            selector["baseinfoedit"].css("display", "block");
            selector["uploadpicbtn"].css("display", "block");
        },
        baseinfo_display: function (selector, data) {
            selector["baseinfodisplay"].css("display", "block");
            selector["baseinfoedit"].css("display", "none");
            selector["uploadpicbtn"].css("display", "none");
        },
        baseinfo_error: function (selector, data) {
            alert("保存失败");
        },
        toggle_team_btn: function (selector, data) {
            selector.text(data);
        },
        toggle_team_regist: function (selector, data) {
            selector.css("display", data);
        },
        toggle_team_edit_display: function (selector, data) {
            selector.css("display", data);
        },
        refresh_teaminfo: function (selector, data) {
            selector.html(data);
        },
        member_display: function (selector, data) {
            selector.html(data);
        }//.js-user-detail添加内容
    }); //View
    Model.addRequest({
        savebaseinfo: function (data, callback) {
            this.fetchData({
                reqWay: "post",
                reqUrl: "/*这里填写php*/",
                reqData: data,
                reqDone: function (data) {
                    callback(data || false);
                },
                reqFail: function () {
                    callback(false);
                }
            });
        },
        saveteaminfo: function (data, callback) {
            this.fetchData({
                reqWay: "post",
                reqUrl: "../php/test.php",
                reqData: data,
                reqDone: function (data) {
                    callback(data);
                }
            });
        },
        getMemberInfo: function (data, callback) {
            var _ = this;
            this.fetchData({
                reqWay: "get",
                reqUrl: "这里填写返回用户信息的php",
                reqData: {username: data},
                reqDone: function (data) {
                    //data为php渲染好的html，php读取memberinfo.html进行渲染
                    callback(data);
                }
            });
        },
        deleteTeam: function () {
            var _ = this;
            this.fetchData({
                reqWay: "post",
                reqUrl: "这里填写删除队伍的php接口",
                reqDone: function (data) {
                    //data为返回的创建队伍的界面既element/teamcreate.html中的内容
                    _.events.emit("team:display:create", data);
                },
                reqFail: function () {
                    _.events.emit("team:display:create", "请求失败");
                }
            });
        }
    });

    Controller.addRouter("dom", function (context, ex) {
        var domStore = context.domStore;
        Controller.addDom({
            "baseinfowp": domStore["info"].find('.l-baseinfo-wp'),
            "baseinfodisplay": domStore["info"].find('.l-baseinfo-display'),
            "baseinfoedit": domStore["info"].find('.l-baseinfo-form').find("ul"),
            "uploadpicform": domStore["info"].find(".l-uploadpic-form")
        }); //个人信息DOM对象
        Controller.addDom("teaminfo", domStore["info"].find('.l-teaminfo-wp')); //创建队伍相关dom对象
        //队伍信息DOM对象
    });

    Controller.addRouter("baseinfo_edit_display",function (context, ex) {
        var domStore = context.domStore;
        domStore["baseinfowp"].on("click", ".l-btn", function (e) {
            var target = $(e.currentTarget);
            if (target.hasClass('sk-edit-btn')) {
                target.removeClass("sk-edit-btn").addClass("sk-save-btn");
                View.useRender("changebtncontent",
                    target.find(".js-btn-content"), "保存");
                View.useRender("baseinfo_edit", {
                    baseinfodisplay: domStore["baseinfodisplay"],
                    baseinfoedit: domStore["baseinfoedit"],
                    uploadpicbtn: domStore["uploadpicform"].find('.js-upload-pic')
                }, "");
                return;
            }
            if (target.hasClass("sk-save-btn")) {
                //model请求数据

                Model.useRequest("savebaseinfo",
                    domStore["baseinfoedit"].parent().serialize(),
                    function (data) {
                        if (data)
                            domStore["baseinfodisplay"].html(data);
                        else {
                            target.removeClass("sk-save-btn").addClass("sk-edit-btn");
                            View.useRender("changebtncontent",
                                target.find(".js-btn-content"), "编辑");
                            View.useRender("baseinfo_display", {
                                baseinfodisplay: domStore["baseinfodisplay"],
                                baseinfoedit: domStore["baseinfoedit"],
                                uploadpicbtn: domStore["uploadpicform"].find('.js-upload-pic')
                            }, "");
                        }

                    });

                return;
            }
        });
    }).//该ROUTER是用来切换显示和编辑两种状态,保存时ajax提交表单
        addRouter("uploadpic", function (context, ex) {
            var uploadpicform = context.domStore["uploadpicform"];
            uploadpicform.on("change", "#picture", function (e) {
                var target = $(e.delegateTarget);
                target.submit();
            });
            uploadpicform.siblings('#piciframe').on("load", function (e) {
                var target = e.currentTarget;
                var url = target.contentWindow.document.
                    getElementsByTagName("body")[0].innerText;
                context.domStore["uploadpicform"].
                    siblings(".l-registpic").attr('src', url);
                context.domStore["baseinfoedit"].siblings("#picpath").val(url);
            });
        }); //图片上传

    Controller.addRouter({
        teambtn: function (context, ex) {
            var isStartCreate = true;
            context.domStore["teaminfo"].on("click", ".js-team-btn", function (e) {
                var target = $(e.currentTarget);
                if (isStartCreate) {
                    View.useRender("toggle_team_btn", target, "取消创建");
                    View.useRender("toggle_team_regist",
                        target.siblings('form'), "block");
                    isStartCreate = false;
                }
                else {
                    View.useRender("toggle_team_btn", target, "创建队伍");
                    View.useRender("toggle_team_regist", target.siblings("form"), "none");
                    isStartCreate = true;
                }
            });
        },
        teaminfo_edit_display: function (context, ex) {
            context.domStore["teaminfo"].on("click", ".l-btn", function (e) {
                var target = $(e.currentTarget);
                if (target.hasClass("sk-edit-btn")) {
                    target.removeClass('sk-edit-btn').addClass("sk-save-btn");
                    View.useRender("changebtncontent",
                        target.find(".js-btn-content"), "保存");
                    View.useRender("toggle_team_edit_display",
                        target.parent().siblings(".js-teaminfo-display"),
                        "none");
                    View.useRender("toggle_team_edit_display", target.parent().siblings('.js-teaminfo-edit'),
                        "block");
                    return;
                }
                if (target.hasClass('sk-save-btn')) {
                    //model请求数据
                    Model.useRequest("saveteaminfo",
                        target.siblings(".l-teaminfo-form").
                            siblings(".js-teaminfo-edit").serialize(),
                        function (data) {
                            View.useRender("refresh_teaminfo",
                                context.domStore["teaminfo"], data);
                        });
                    View.useRender("toggle_team_edit_display", target.parent().siblings('.js-teaminfo-edit'),
                        "none");
                    View.useRender("toggle_team_edit_display",
                        target.parent().siblings(".js-teaminfo-display"),
                        "block");
                    target.removeClass("sk-save-btn").addClass("sk-edit-btn");
                    View.useRender("changebtncontent",
                        target.find(".js-btn-content")
                        , "编辑");
                    return;
                }
            });
        },//按钮点击后路由（控制按钮文字、表格显示或隐藏）
        deleteTeam: function (context, ex) {
            var events = context.events;
            events.on("team:display:create", function (data) {
                console.log(data);
            });
            context.domStore["teaminfo"].on("click", ".js-delete-btn", function (e) {
                if (_window.confirm("是否删除队伍?")) {
                    Model.useRequest("deleteTeam");//model向服务启提交删除队伍请求
                }
            });
        },//删除队伍
        addMember: function (context, ex) {
            context.domStore["teaminfo"].on("click", ".js-addmember", function (e) {
                var target = $(e.currentTarget),
                    username = target.siblings("input").val();
                Model.useRequest("getMemberInfo", username, function (data) {
                    View.useRender("member_display",
                        target.siblings(".js-user-detail"), data);
                });//model请求该用户信息
            });
        },
        registTeam: function (context, ex) {
            var input_name={

            };
            context.domStore["teaminfo"].on("click", "#teamsubmit", function (e) {
                var target = $(e.currentTarget),
                    form = target.parent().serializeArray(),
                    reg=/\s+/g,
                    value,name;
                for(var i= 0,j=form.length;i<j;i++)
                {
                    name=form[i].name;
                    value=form[i].value;
                    if(value==""||(!value.match(reg)))
                    {
                        alert("当前信息不完整或内容包含非法字符");
                        return;
                    }
                }
            });
        }
    });//队伍信息控制器

    dm.connect(Controller, Model,["team:display:create"]);//
});
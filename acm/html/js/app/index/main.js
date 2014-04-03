/**
 * Created by dp on 14-2-11.
 */
define(function (require, exports, module) {
    var $dm = dm, $ = jQuery,
        body = $("body");
    var effect = require("./effect.js");
    effect.init(body);//启动effect.js
    //your code goes here
    var View = new dm.View();
    var Model = new dm.Model();
    var Controller = new dm.Controller();

    View.addRender("question:clearContent", function (selector, data) {
        selector.val("");
    });
    Model.addRequest({"question:submitQuestion": function (data, callback) {
        this.fetchData({
            reqWay:"post",
            reqUrl:"这里填写提交疑问的php地址",
            reqData:{question:data},
            reqDone:function(data){
                callback(data);
            },
            reqFail:function(){
                callback(false);
            }
        });
    }
    });

    Controller.addRouter("dom",function (context, ex) {
        context.addDom({
            "content-fifth": body.find(".l-content-fifth")
        });
    }).//添加dom控制器
        addRouter({
            submitQuestion: function (context, ex) {
                var domStore = context.domStore;
                domStore["content-fifth"].find(".l-submit").on("click", function (e) {
                    var target = $(e.currentTarget);
                    var inp=target.siblings(".l-input-wp")
                        .find("#content");
                    var content =inp.val();
                    Model.useRequest("question:submitQuestion",
                        content,function(data){
                        if(!data)
                        {
                            alert("提交失败");
                            return;
                        }
                        View.useRender("question:clearContent",inp,"");
                    });//model向服务器提交问题
                });
            }
        });//疑问提交控制器
});
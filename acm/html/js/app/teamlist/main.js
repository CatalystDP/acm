/**
 * Created by dp on 14-4-2.
 */
define(function(require,exports,module){
    var body=jQuery("body"),$=jQuery,$dm=dm;
    require("js/app/header/header.js").init(body);

    var View=new $dm.View();
    var Model=new $dm.Model();
    var Controller=new $dm.Controller();

    View.addRender("displaylist",function(selector,data){
        selector.html(data);
    });

    Model.addRequest("pagereq",function(data){
       var _=this;
       this.fetchData({
           reqWay:"get",
           reqUrl:"这里填写分页php",
           reqData:{page:data},
           reqDone:function(data){
               _.events.emit("teamlist",data);
           },
           reqFail:function(){
               _.events.emit("teamlist","");
           }
       });
    });

    Controller.addRouter("dom",function(context,ex){
        context.addDom("teamlistwp",body.find(".js-teamtable-wp"));
    }).
    addRouter("page",function(context,ex){
            var domStore=context.domStore;
            context.events.on("teamlist",function(data){
                View.useRender("displaylist",
                domStore["teamlistwp"],data);
            });
            domStore["teamlistwp"].on("click","a",function(e){
                e.preventDefault();
            });
            domStore["teamlistwp"].on("click",".js-page",function(e){
                var target=$(e.currentTarget);
                var page=target.find("a").attr("href");
                Model.useRequest("pagereq",page);
            });
        });
    $dm.connect(Controller,Model);
});
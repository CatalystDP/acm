/**
 * Created by dp on 14-2-11.
 */
define(function(require,exports,module){
    var body,$=jQuery,$dm=dm;
    module.exports={
        exView:null,
        init:function(b){
            body=b;
            this.exView=run();
        }
    };
    function run(){
        var viewCollection={};
        var header=require("js/app/header/header.js");
        header.init(body);//加载headerjs效果
        $dm.SandBox($dm,function($dm){
            var formview=viewCollection.formview=$dm.view.create();
            formview.render.registerRender("inputerr",function(selector,data){
                alert(data);
            });
        });
        $dm.SandBox(function(){
            var userPicView=viewCollection.userPicView=$dm.view.create();
            userPicView.render.registerRender("userpic",function(selector,data){
                selector.attr(data? "src":"alt",data||"网络不给力");
            });
        });
        $dm.SandBox(function(){
            var validateCodeView=viewCollection.validateCodeView=$dm.view.create();
            validateCodeView.render.registerRender("validatecode",function(selector,data){
                selector.attr(data? "src":"alt",data||"网络不给力");
            });
        });
        //your code goes here
        return viewCollection;
    }
});

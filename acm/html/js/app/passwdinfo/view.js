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
        $dm.SandBox(function(){
            var form=viewCollection.formView=$dm.view.create(),
                sibling=".js-input-status";
            form.render.registerRender("resetStatus",function(selector,data){
                selector.siblings(sibling).text(data);
            });
            form.render.registerRender("passwordErr",function(selector,data){
                selector.siblings(sibling).text(data);
            });
            form.render.registerRender("checkErr",function(selector,data){
                selector.siblings(sibling).text(data);
            });
        });//显示表单错误信息
        //your code goes here
        return viewCollection;
    }
});

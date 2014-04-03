/**
 * Created by dp on 14-2-11.
 */
define(function(require,exports,module){
    var body,$=jQuery,$dm=dm;
    module.exports={
        exModel:null,
        init:function(b){
            body=b;
            this.exModel=run();
        }
    };
    function run(){
        var modelCollection={};

        //your code goes here
        $dm.SandBox(function(){
           modelCollection.oldpasswordCheck=function(str,callback){
               var form=$dm.model.create();
               form.fetchData({
                   reqWay:"get",
                   reqUrl:"/*这里需要加php*/",
                   reqData:{oldpassword:str},
                   reqDone:function(data){callback(data);}
               });
           }
        });

        return modelCollection;
    }
});
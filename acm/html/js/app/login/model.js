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

        $dm.SandBox(function(){
            var model=$dm.model.create();
            modelCollection.getUserPic=function(username,callback){
                model.fetchData({
                    reqWay:"get",
                    reqUrl:"page/login/ImageReturn.php",
                    reqData:{username:username},
                    reqDone:function(data){
                        callback(data);//data为图片链接
                    },
                    reqFail:function(){
                        callback(false);
                    }
                });
            };
            modelCollection.getValidateCode=function(callback){
                model.fetchData({
                    reqWay:"get",
                    reqUrl:"../php/test.php"/*获取验证码图片链接的php*/,
                    reqDone:function(data){
                        callback(data);//data 为验证码图片地址
                    },
                    reqFail:function(){
                        callback(false);
                    }
                });
            }
        });
        //your code goes here

        return modelCollection;
    }
});
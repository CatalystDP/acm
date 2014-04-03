/**
 * Created by dp on 14-2-11.
 */
define(function (require, exports, module) {
    var $dm = dm, $ = jQuery,
        body = $("body");
    var view = require("./view");
    view.init(body);
    var model = require("./model");
    model.init(body);
    //your code goes here
    require("js/selfmodule/formvalidator");
    $dm.SandBox(undefined,function(undefined){

        var validator = $dm.form.create(),
            form = body.find(".l-form-wp").find("form");
        form.on("submit", function (e) {
            var target = $(e.currentTarget),
                inputArr = target.serializeArray();
            for (var i = 0, j = inputArr.length; i < j; i++) {
                if ((validator.hasSpace(inputArr[i].value)) || (!validator.isLegal(str))) {
                    view.exView.formview.render.renderRouter("inputerr",{
                        selector:undefined,
                        data:"用户名或密码非法"
                    });
                    return false;
                }
            }
            return true;
        });
    });
});
/**
 * Created by dp on 14-2-11.
 */
define(function(require, exports, module) {
  var body, $ = jQuery,
    $dm = dm;
  module.exports = {
    exModel: null,
    init: function(b) {
      body = b;
      this.exModel = run();
    }
  };

  function run() {
    var modelCollection = {};

    //your code goes here
    $dm.SandBox(function() {
      modelCollection.userNameCheck = function(str, callback) {
        var form = $dm.model.create();
        form.fetchData({
          reqWay: "get",
          reqUrl: "/*这里需要加php*/",
          reqData: {
            username: str
          },
          reqDone: function(data) {
            callback(data);
          }
        });
      }
    });
    $dm.SandBox(function() {
      modelCollection.saveSchool = function(school, callback) {
        var saveSchoolModel = $dm.model.create();
        saveSchoolModel.fetchData({
          reqWay:"post",
          reqUrl:"/*学校保存PHP*/",
          reqData:{school:school},
          reqDone:function(data){
            callback(data);//data为bool值表示学校是否添加成功
          }
        });
      }
    });
    return modelCollection;
  }
});
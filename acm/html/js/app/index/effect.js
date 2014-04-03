define(function (require, exports, module) {


    function run(b) {
        require("js/selfmodule/banner.js");
        var $ = jQuery;
        var body = b,
            tree = {
                banner:body.children("#banner-wp"),
                content:body.find(".l-content-wp")
            },
            effect = {
                textHover:function(){
                    require.async("../header/header.js",function(header){
                        header.init(body);
                    });
                },
                bannerEff:function(){
                    var banner=tree.banner.find(".banner");
                    banner.bannerFade({speed:500});
                },
                bannerKeyEff:function(){
                    var keys=tree.banner.find(".banner-key");
                    keys.on("mouseenter",function(e){
                        var target=$(e.currentTarget);
                        target.stop(true,true).animate({opacity:1},250);
                    })
                        .on("mouseout",function(e){
                            var target=$(e.currentTarget);
                            target.stop(true,true).animate({opacity:0.5},250);
                        });
                },
                fourthContent:function(){
                    var img=tree.content.find(".l-content-fourth").find(".l-img-wp").find("div");
                    img.on("mouseenter",function(e){
                        var target=$(e.currentTarget);
                        target.children(".l-img-detail").
                        stop(true,true).
                            animate({opacity:0.7},250);
                    }).on("mouseleave",function(e){
                        var target=$(e.currentTarget)
                            .children(".l-img-detail").stop(true,true).
                            animate({opacity:0},250);
                    });
                },
                submitEffect:function(){
                    var submit=tree.content.find(".l-content-fifth")
                        .find(".l-submit");
                    submit.hover(function(){
                        submit.stop().animate({
                            backgroundColor:"#ebebeb",
                            borderColor:"#adadad"
                        },250);
                    },function(){
                        submit.stop().animate({
                            backgroundColor:"transparent",
                            borderColor:"#ffffff"
                        },250);
                    });
                }
            };
        effect.textHover();
        effect.bannerEff();
        effect.bannerKeyEff();
        effect.fourthContent();
        effect.submitEffect();
    }
    module.exports = {
        init: function (b) {
            run(b);
        }
    };
});
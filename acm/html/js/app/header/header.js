define(function(require,exports,module){
    var body,$=jQuery;
    module.exports = {
        init: function (b) {
            body=b;
            run();
        }
    };
    function run(){
        var tree={
            header:body.children(".hd-wp"),
            nav:body.children(".nav-wp")
            },
        textHover=function (selector) {
            var args = Array.prototype.slice.call(arguments, 0),
                length, delegate;
            args.shift();
            length = args.length;
            if (length == 0)
                selector.on("mouseenter",function (e) {
                    e.stopPropagation();
                    var target = $(e.target);
                    target.stop(true, true)
                        .animate({color: "#3ea5e0"}, 300);
                }).on("mouseout",function (e) {
                        e.stopPropagation();
                        var target = $(e.target);
                        target.stop(true, true)
                            .animate({color: "#2d2d2d"}, 300);
                    });
            if (length == 1) {
                delegate = args[0];
                selector.on("mouseenter", delegate,function (e) {
                    e.stopPropagation();
                    var target = $(e.target);
                    target.stop(true, true)
                        .animate({color: "#3ea5e0"}, 250);
                }).on("mouseout", delegate, function (e) {
                        e.stopPropagation();
                        var target = $(e.target);
                        target.stop(true, true)
                            .animate({color: "#2d2d2d"}, 250);
                    });
            }
        };
        textHover(tree.nav,"a");
        textHover(tree.header.find(".hd-login-wp"),"a");
    }
});

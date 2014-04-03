(function ($dm) {
    $dm.SandBox($dm, function ($dm) {
        var map = $dm.map = {};
        var Map = $dm.klass(null, {
            __construct: function () {
                this.size = 0;
                this.map = {};
            },
            add: function () {
                if (!arguments[0])
                    return this;
                var args = Array.prototype.slice.call(arguments, 0),
                    len = args.length,
                    map = this.map,size=this.size,
                    tmp;
                if (len == 1 && typeof args[0] === "object") {
                    tmp = args[0];
                    for (var p in tmp) {
                        if (tmp.hasOwnProperty(p)){
                            map[p] = tmp[0];
                            size++;
                        }
                    }
                    this.size=size;
                    return this;
                }
                if (len == 2) {
                    if (typeof args[0] == "string"){
                        map[args[0]] = args[1];
                        (this.size)++;
                    }
                    return this;
                }
                return this;
            },
            remove: function () {
                if (!arguments[0])
                    return this;
                var args = Array.prototype.slice.call(arguments, 0),
                    len = args.length,
                    map = this.map,size=this.size,
                    tmp;
                if (len >= 2)
                    return this;
                tmp = args[0];
                if (typeof tmp == "string") {
                    if (map.hasOwnProperty(tmp)) {
                        delete map[tmp];
                        this.size--;
                        return this;
                    }
                }
                if (Object.prototype.toString.call(tmp) == "[object Array]") {
                    for (var i = 0, j = tmp.length; i < j; i++) {
                        if (map.hasOwnProperty(tmp[i])){
                            delete map[tmp[i]];
                            size--;
                        }
                    }
                    this.size=size;
                    return this;
                }
                return this;
            },
            values:function(keys){
                var result, i, j, p,map=this.map;
                if(!keys){
                    result=[];
                    for(p in map){
                        if(map.hasOwnProperty(p))
                            result.push(map[p]);
                    }
                    return result;
                }
                if(typeof keys=="string")
                    return map[keys];
                if(Object.prototype.toSource.call(keys)=="[object Array]"){
                    result=[];
                    for(i=0,j=keys.length;i<j;i++)
                        result.push(map[keys[i]]);
                    return result;
                }
            },
            keys:function(value){

            }
        });


        map.create = function () {
            return new Map();
        }
    });

})(dm);

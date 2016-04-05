var common = {};

/**
 * Get the parameters from the pages GET args
 * @returns A map of the key value get pairs
 */
common.getParameters = function(){
    var p = {};
    var location = window.location.search.substring(1);
    var args = location.split("&");
    for (i=0; i<args.length; i++){
        var param = args[i].split("=");
        p[param[0]] = param[1];
    }
    return p;
};

common.buildUrl = function(base, params){
    var strParams = $.param(params);
    return base + '?' + strParams;
};
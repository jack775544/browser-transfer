var common = {};

/**
 * Get the parameters from the pages GET args
 * @returns An array of maps for key => value
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
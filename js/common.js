var common = {};

common.extensions = [];
common.extensions['py'] = 'ace/mode/python';
common.extensions['conf'] = 'ace/mode/apache_conf';
common.extensions['cpp'] = 'ace/mode/c_cpp';
common.extensions['cs'] = 'ace/mode/csharp';
common.extensions['css'] = 'ace/mode/css';
common.extensions['d'] = 'ace/mode/d';
common.extensions['elm'] = 'ace/mode/elm';
common.extensions['gitignore'] = 'ace/mode/gitignore';
common.extensions['html'] = 'ace/mode/html';
common.extensions['js'] = 'ace/mode/javascript';
common.extensions['make'] = 'ace/mode/makefile';
common.extensions['m'] = 'ace/mode/matlab';
common.extensions['php'] = 'ace/mode/php';
common.extensions['ps1'] = 'ace/mode/powershell';
common.extensions['r'] = 'ace/mode/r';
common.extensions['rb'] = 'ace/mode/ruby';
common.extensions['sass'] = 'ace/mode/sass';
common.extensions['scss'] = 'ace/mode/scss';
common.extensions['sql'] = 'ace/mode/sql';
common.extensions['tex'] = 'ace/mode/tex';
common.extensions['txt'] = 'ace/mode/text';
common.extensions['text'] = 'ace/mode/text';
common.extensions['ts'] = 'ace/mode/typescript';
common.extensions['xml'] = 'ace/mode/xml';

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
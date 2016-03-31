$(document).ready(function(){
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/python");

    var params = common.getParameters();
    var name = params['filename'];
    var parts = name.split('.');
    var ext = parts[parts.length-1];

    if (common.extensions.hasOwnProperty(ext)){
        editor.session.setMode(common.extensions[ext]);
    } else {
        editor.session.setMode(common.extensions['txt']);
    }
});

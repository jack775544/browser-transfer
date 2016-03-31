$(document).ready(function(){
    // Create editor and set the mode for it
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/python");
    var modelist = ace.require("ace/ext/modelist");
    var params = common.getParameters();
    var name = params['filename'];
    var mode = modelist.getModeForPath(name).mode;
    editor.session.setMode(mode);
});

$(document).ready(function () {
    var username;
    var password;

    $('#submit').click(function () {
        $('#test').text('');
        username = $('#username').val();
        password = $('#password').val();
        console.log('clicked');
        setSession();
    });

    function setSession(){
        $.ajax({
            type: "POST",
            url: './session.php',
            data: {"username": username, "password": password}
        }).done(function (r) {
            console.log('Session Done');
            ajaxConnect();
        });
    }

    function ajaxConnect() {
        $.ajax({
            type: "POST",
            url: './ls.php',
            context: document.body
            //data: {"username": username, "password": password}
        }).done(function (r) {
            //console.log(r);
            connect(r);
        });
    }

    function connect(r) {
        console.log(r);
        $('#test').append('<ol id="items" style="list-style-type: none"></ol>');
        for (var i = 0; i < r.items.length; i++) {
            var file = r.items[i].filename;
            var type;
            var close;
            var size = '';
            if (file[5] == 2) {
                type = '<span style="color:red">Folder: ';
                close = '</span></li>';
            } else if (file[5] == 1) {
                type = '<span>File: <a href="get.php?filename=' + file[8] + '">';
                size = ' ' + file[0] + 'kb';
                close = '</span></a>' + size + '</li>';
            } else {
                type = '<span>Other: ';
                close = '</span></li>';
            }
            $('#items').append('<li>');
            $('#items').append(type + file[8]);
            $('#items').append(close);
            console.log('rip');
        }
    }

});
var buildLightbox;
$(document).ready(function () {
    var username;
    var password;

    $('.itemlink').click(function(e){
        e.preventDefault();
        var url = this.href;
        var name = this.dataset.name;
        var lightbox = buildLightbox(this.dataset.name, this.href, this.dataset.created, this.dataset.modified, this.dataset.size);
        $("body").append(lightbox);
    });

    buildLightbox = function(name, url, created, modified, size){
        var lightbox = $('<div></div>', {id: 'lightbox'});
        var content = $('<div></div>', {class: 'container'});
        var jumbo = $('<div></div>', {class: 'jumbotron'});
        $('<div id="closeLightbox"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>').appendTo(jumbo);
        $('<h2>' + name + '</h2>').appendTo(jumbo);
        $('<div> Date Created: ' + created + '</div>').appendTo(jumbo);
        $('<div> Last Modified: ' + modified + '</div>').appendTo(jumbo);
        $('<div> Size: ' + size + ' bytes</div>').appendTo(jumbo);
        $('<a href="'+ url + '">Download</a>').appendTo(jumbo);

        content.append(jumbo);
        lightbox.append(content);

        content.click(stopProp);
        lightbox.click(closeLightbox);
        return lightbox;
    };

    function stopProp(e){ // and roll!
        e.stopPropagation();
    }

    function closeLightbox(e){
        e.stopPropagation();
        $("#lightbox").remove();
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
                close = '</span>';
            } else if (file[5] == 1) {
                type = '<span>File: <a href="get.php?filename=' + file[8] + '">';
                size = ' ' + file[0] + 'kb';
                close = '</span></a>' + size;
            } else {
                type = '<span>Other: ';
                close = '</span>';
            }
            //$('#items').append();
            $('#items').append('<li>' + type + file[8] + '</li>');
            //$('#items').append(close);
            //$('#items').append('</li>');
            console.log('rip');
        }
    }

});
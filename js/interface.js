var ajaxConnect;

$(document).ready(function () {
    $('.itemlink').click(function (e) {
        e.preventDefault();
        var url = this.href;
        var name = this.dataset.name;
        var lightbox = buildLightbox(this.dataset.name, this.href, this.dataset.created, this.dataset.modified, this.dataset.size, this.dataset.linkname);
        $("body").append(lightbox);
    });

    var buildLightbox = buildLightbox = function (name, url, created, modified, size, linkname) {
        var lightbox = $('<div></div>', {id: 'lightbox'});
        var content = $('<div></div>', {class: 'container'});
        var jumbo = $('<div></div>', {class: 'jumbotron'});
        var titlerow = $('<div class="row"></div>').appendTo(jumbo);
        $('<h2>' + name + '</h2>').appendTo(titlerow);
        var closeSpan = $('<span></span>');
        var closeLink = $('<a id="closeLink">[X]</a>');
        closeLink.appendTo(closeSpan);
        closeSpan.appendTo(titlerow);
        $('<div> Date Created: ' + created + '</div>').appendTo(jumbo);
        $('<div> Last Modified: ' + modified + '</div>').appendTo(jumbo);
        $('<div> Size: ' + size + ' bytes</div>').appendTo(jumbo);
        $('<a href="' + url + '">Download</a>').appendTo(jumbo);
        $('<br>').appendTo(jumbo);
        var url = common.buildUrl('edit.php', {filename: linkname, pwd: $('#pwd').text()});
        $('<a href="' + url + '" target="_blank">Edit</a>').appendTo(jumbo);

        content.append(jumbo);
        lightbox.append(content);

        content.click(stopProp);
        lightbox.click(closeLightbox);
        closeLink.click(closeLightbox);
        return lightbox;
    };

    function stopProp(e) { // and roll!
        e.stopPropagation();
    }

    function closeLightbox(e) {
        e.stopPropagation();
        $("#lightbox").remove();
    }

    ajaxConnect = function() {
        $.ajax({
            type: "GET",
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

        for (var i=0; i<r.items.length; i++){
            var item = r.items[i].filename;
            var size = item[0];
            var type = item[5]; // 1 is file, 2 is folder, 3 is symlink, 4 is other
            var created = item[6];
            var modified = item[7];
            var filename = item[8];
            var textType = 'type';
            var img = 'img';
            var url = 'get.php?filename=' + item[8];

            switch (Number(type)) {
                case 1:
                    img = 'img/icons/document.png';
                    url = 'get.php?filename=' + filename;
                    textType = 'file';
                    break;
                case 2:
                    img = 'img/icons/folder.png';
                    url = '#';
                    textType = 'folder';
                    break;
                default:
                    img = 'img/icons/folder.png';
                    url = '#';
                    textType = 'other';
                    break;
            }

            console.log(buildListItem(url, modified, created, filename, size, textType, img));
        }
    }

    function buildListItem(url, modified, created, filename, size, textType, img){
        var tag = "<li><a class='itemlink' href='{0}' data-modified='{1}' data-created='{2}' data-name='{3}' data-size='{4}' data-type='{5}' data-linkname='{3}'><img src='{6}'>{3}</a></li>";
        return tag.format(url, modified, created, filename, size, textType, img);
    }

});
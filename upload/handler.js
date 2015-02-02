$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    
    $("#fileupload").fileupload({
        url: "post.php",
        dataType: 'json',
        done: function (e,data) {
            var archivo=data._response.result.files[0];
            if(archivo.error){
                    alert(archivo.error);
            }else{
                var link ="<a href="+archivo.url+" title="+archivo.name+" download="+archivo.name+">"+archivo.name+"</a>";
                var borrar = "<button class='borrar_archivo' data-type="+archivo.deleteType+" data-url="+archivo.deleteUrl+"><i class='icon icon-trash'></i></button>";
                $(div_files).append("<p>"+link+borrar+"</p>");    
                $('.borrar_archivo').on('click', Borrar);
            }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
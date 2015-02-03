function inicializar_fileupload(div,categoria,target){

   $(div).fileupload({
        url: "upload/index.php?categoria="+categoria,
        dataType: 'json',
        done: function (e,data) {
            var archivo=data._response.result.files[0];
            if(archivo.error){
                    alert(archivo.error);
            }else{
                $(target).val(archivo.url);
            }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);            
            $('#progress .bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

}
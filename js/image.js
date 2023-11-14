
$(document).on("change", "#validatedCustomFile", function () {
    console.log(this.files);
    var files = this.files;
    var element;

    var suportedFiles = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
    var seEncontraronArchivosNoValidos = false;

    for (var i = 0; i < files.length; i++) {
        element = files[i];

        if (suportedFiles.indexOf(element.type) != -1) {
            createPreview(element);
        } else {
            seEncontraronArchivosNoValidos = true;
        }
    }

    if (seEncontraronArchivosNoValidos) {
        $("#ModalError").modal("show");
    } else {
        $("#ModalCompleto").modal("show");
    }
})

function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<img class="img-thumbnail" width="200px" height="200px" src="'+ imgCodified +'" alt ="productos">')


    // Añade la imagen al contenedor de previsualización
    $('#preview-container').append(img);
}


/*
$(document).on("change", "#validatedCustomFile", function () {
    console.log(this.files);
    var files = this.files;
    var element;

    var suportedFiles = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
    var seEncontraronArchivosNoValidos = false;

    for (var i = 0; i < files.length; i++) {
        element = files[i];

        if (suportedFiles.indexOf(element.type) != -1) {
            createPreview(element);
        }else{
            seEncontraronArchivosNoValidos = true;
        }
    }

    if(seEncontraronArchivosNoValidos){
        alert("Se encontraron archivos no validos");
    }else{
        alert("Todos los archivos son validos");
    }


})

function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<div class = "col-lg-2 col-md-3 col-sm-4 col-xs-12"> <div class="image-container"> <figure><img src="'+ imgCodified +'" alt ="productos"> <figcaption> <li class="icon-cross"></li> </figcaption></figure></div> </div>')

    $(img).insertBefore("#CuadroImage");
}*/
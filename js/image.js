
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
        alert("Todos los archivos son validos");
    }
})

function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<img class="img-thumbnail" width="200px" height="200px" src="'+ imgCodified +'" alt ="productos">')


    // Añade la imagen al contenedor de previsualización
    $('#preview-container').append(img);
}
document.getElementById('btnEditar').addEventListener('click', function() {
    document.getElementById('fotoperfilcambiado').click();
  });
  /*
  document.getElementById('inputFile').addEventListener('change', function() {
    const file = this.files[0];
    const reader = new FileReader();
  
    reader.onload = function(e) {
      document.getElementById('imagen').src = e.target.result;
    };
  
    reader.readAsDataURL(file);
  });*/
  

const defaulimg = "./img/logodefaul.png";

const file = document.getElementById('fotoperfilcambiado');
const defaul = document.getElementById('fotoperfil');
const img = document.getElementById('fotoperfil');
file.addEventListener('change', e => {
    if(e.target.files[0]){
        defaul.classList.add('d-none');
        file.classList.remove('d-none');
        const reader = FileReader();
        reader.onload = function( e ){
            img.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }else{
        img.src = defaulimg;
    }
} );
/*
$(document).on('click', '#btnEditar', function() {
    $('#myFile').click();
});

$(document).ready(function() {
    $('#btnEditar').on('click', function() {
        $('#myFile').click();
    });

    $('#myFile').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#fotoperfil').attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    });
});
*/
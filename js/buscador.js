document.addEventListener('DOMContentLoaded', function() {
    const inputNombreProducto = document.getElementById('nombreproducto');
    const resultadosBusqueda = document.getElementById('resultadosBusqueda');

    inputNombreProducto.addEventListener('input', function() {
        const nombreProducto = inputNombreProducto.value;
        
        // Realizar la solicitud AJAX
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Mostrar los resultados en el contenedor
                    resultadosBusqueda.innerHTML = xhr.responseText;
                    
                    // Verificar si no hay resultados y mostrar un mensaje
                    if (xhr.responseText.trim() === '') {
                        resultadosBusqueda.innerHTML = 'No se encontraron resultados.';
                    }
                } else {
                    console.error('Hubo un error en la solicitud.');
                }
            }
        };

        // Enviar la solicitud al script PHP que maneja la búsqueda
        xhr.open('GET', `./db/BuscarProductos.php?nombreproducto=${nombreProducto}`, true);
        xhr.send();
    });
});

const btnbuscar = document.getElementById('btnbuscar');

function buscartdos() {
    const cuerpo = document.getElementById('cuerpo');
    const resultados = document.getElementById('resultados');

    cuerpo.classList.add('d-none');
    resultados.classList.remove('d-none');
}

$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellidos = fila.find('td:eq(2)').text();
    correo = parseInt(fila.find('td:eq(3)').text());
    foto = parseInt(fila.find('td:eq(4)').text());
    id_rol = parseInt(fila.find('td:eq(5)').text());
    
    $("#nombre").val(nombre);
    $("#apellidos").val(apellidos);
    $("#correo").val(correo);
    $("#foto").val(foto);
    $("#id_rol").val(id_rol);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    apellidos = $.trim($("#apellidos").val());
    correo = $.trim($("#correo").val()); 
    foto = $.trim($("#foto").val());
    id_rol = $.trim($("#id_rol").val());   
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, apellidos:apellidos, correo:correo, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            apellidos = data[0].apellidos;
            correo = data[0].correo;
            foto = data[0].foto;
            id_rol = data[0].id_rol;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,apellidos,correo,foto,id_rol]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,apellidos,correo,foto,id_rol]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});
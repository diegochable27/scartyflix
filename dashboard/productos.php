<?php require_once "vistas/parte_superior.php"?>

<?php

include_once 'bd/conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_producto, nombre, descripcion, id_categoria, cantidad, id_vendedor, precio FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!--INICIO del cont principal-->
<div class="container">
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registro de productos</h1>
</div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>                                
                                <th>Id_categoria</th>  
                                <th>Cantidad</th>
                                <th>Id_vendedor</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_producto'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['id_categoria'] ?></td>    
                                <td><?php echo $dat['cantidad'] ?></td>
                                <td><?php echo $dat['id_vendedor'] ?></td>
                                <td><?php echo $dat['precio'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="apellidos" class="col-form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos">
                </div>                
                <div class="form-group">
                <label for="correo" class="col-form-label">Correo:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="foto" class="col-form-label">Foto:</label>
                <input type="text" class="form-control" id="foto">
                </div>
                <div class="form-group">
                <label for="id_rol" class="col-form-label">Rol:</label>
                <input type="text" class="form-control" id="id_rol">
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>
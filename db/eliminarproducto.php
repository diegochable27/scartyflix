<?php
    $id = $_GET['id'];
    
    include("./conexion.php");

    $sql = "DELETE FROM productos WHERE id_producto = '$id'";
    $result = mysqli_query($conexion, $sql);

    if($result){
        header("Location: ../productos.php");
    }else{
        echo "Error al eliminar el producto";
    }
?>
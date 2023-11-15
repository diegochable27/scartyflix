<?php
    $idproducto = $_GET["id"];
    session_start();
    include("./conexion.php");
    $sql = "SELECT * FROM productos WHERE id_producto  = $idproducto";
    $result = mysqli_query($conexion, $sql);

    $iduser = $_SESSION["id"];

    $row = mysqli_fetch_array($result);
    $precio = $row['precio'];
    $sqlcarrito = "INSERT INTO carrito (id_product, id_usuario, precio) VALUES ('$idproducto', '$iduser', '$precio')";
    $resultcarrito = mysqli_query($conexion, $sqlcarrito);
    if($resultcarrito){
        echo '<script>alert("Producto agregado al carrito")
        window.location= "../vistadeproducto.php?id='.$idproducto.'"
        </script>';
        
    }
?>
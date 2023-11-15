<?php
include("./conexion.php");

if (isset($_GET['nombreproducto'])) {
    $nombreproducto = $_GET['nombreproducto'];

    $sql = "SELECT * FROM productos WHERE nombre LIKE '%$nombreproducto%'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["nombre"] . "<br>"; // Mostrar los resultados
        }
    } else {
        echo "No se encontraron resultados para '$nombreproducto'.";
    }
} else {
    echo "No se ha proporcionado un término de búsqueda.";
}

$conexion->close();
?>

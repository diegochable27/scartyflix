<?php
include("./conexion.php");

// Verificar si se envió la variable 'nombreproducto' a través de GET
if (isset($_GET['nombreproducto'])) {
    $nombreproducto = $_GET['nombreproducto'];

    $sql = "SELECT * FROM productos WHERE nombre LIKE '%$nombreproducto%'";
    $result = $conexion->query($sql);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Nombre: " . $row["nombre"] . "<br>"; // Asumiendo que la columna se llama 'nombre'
        }
    } else {
        echo "No se encontraron resultados para '$nombreproducto'.";
    }
} else {
    echo "No se ha proporcionado un término de búsqueda.";
}

$conexion->close();
?>

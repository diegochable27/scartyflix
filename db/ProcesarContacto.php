<?php
// FILEPATH: /c:/xampp/htdocs/TenoxtSports/db/ProcesarContacto.php

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$departamento = $_POST['departamento'];
$mensaje = $_POST['mensaje'];

// Validar los datos (puedes agregar tus propias validaciones aquí)

// Conectar a la base de datos
include("conexion.php");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}

// Insertar los datos en la tabla correspondiente
$sql = "INSERT INTO contacto (nombre, apellido, correo, departamento, mensaje) VALUES ('$nombre', '$apellido', '$correo', '$departamento', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos enviados correctamente.";
} else {
    echo "Error al enviar datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>

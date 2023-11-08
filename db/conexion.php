<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "shops";
$conexion = mysqli_connect($server, $user, $pass, $bd);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>
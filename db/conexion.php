<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "scartyflix";
$conexion = mysqli_connect($server, $user, $pass, $bd);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>
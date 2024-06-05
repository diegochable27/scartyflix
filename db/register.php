<?php
include("conexion.php");
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$rol = 3;
$estado = 1;
$foto = "./img/logodefaul.png";

$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
$consulta = "INSERT INTO usuarios(nombre, apellidos, correo, contrasena, foto, id_rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasena' , '$foto', '$rol')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "<script>
    alert('Cuenta creada con exito')
    window.location= '../public/auth/login.php'
    </script>";
} else {
    echo "<script>
    alert('Error al registrarse')
    window.location= '../public/auth/register.php'
    </script>";
}
?>


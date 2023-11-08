
<?php
include("conexion.php");
session_start();
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($resultado);

if ($row['correo'] == $correo && $row['contrasena'] == $contrasena) {
    $_SESSION['correo'] = $correo;
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellidos'] = $row['apellidos'];
    $_SESSION['rol'] = $row['id_rol'];
    $_SESSION['id'] = $row['id'];   
    $_SESSION['foto'] = $row['foto']; 
    header("Location: ../index.php");
} else {
    echo "<script>
    alert('Usuario o contraseña incorrectos')
    window.location= '../public/auth/login.php'
    </script>";

}

?>
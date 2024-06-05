
<?php
include("conexion.php");
session_start();

if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);

if($result->rowCount() > 0){
    $row = $resultado->fetch(PDO::FETCH_ASSOC);
    $hashContrasena = $row['contrasena'];
    
}

if(password_verify($contrasena, $hashContrasena)){
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellidos'] = $row['apellidos'];
    $_SESSION['correo'] = $row['correo'];
    $_SESSION['id_rol'] = $row['id_rol'];
    $_SESSION['foto'] = $row['foto'];

    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    
    if($_SESSION['id_rol'] == 1){
        header("Location: ../../admin/index.php");
    }else if($_SESSION['id_rol'] == 2){
        header("Location: ../../admin/index.php");
    }else if($_SESSION['id_rol'] == 3){
        header("Location: ../../index.php");
    }

}else{
    echo "<script>
    alert('Correo o contraseña incorrectos')
    window.location= '../auth/login.php'
    </script>";
}
}else{
    echo "<script>
    alert('Correo o contraseña incorrectos');
    window.location= '../auth/login.php';
    </script>";
}
?>
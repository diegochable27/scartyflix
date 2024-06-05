<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Comprobar si la sesión está inactiva
if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && (time() - $_SESSION['ULTIMA_ACTIVIDAD'] > 600)) {
    // Última actividad fue hace más de 10 minutos
    // 1 minuto = 60 segundos
    session_unset();     // Vaciar la sesión
    session_destroy();   // Destruir la sesión
    echo "<script>
    alert('Su sesión ha expirado por inactividad');
    window.location= '../scartyflix/index.php';
    </script>";
    exit();
}
$_SESSION['ULTIMA_ACTIVIDAD'] = time(); // Actualizar el tiempo de la última actividad
?>
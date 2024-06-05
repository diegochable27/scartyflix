<?php
include_once "./public/navbar/navbar.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('./db/conexion.php');
    $id = $_POST['uid'];
    $token = $_POST['tokens'];
    $contrasena = $_POST['contrasena'];
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET contrasena = '$contrasena' WHERE id = $id AND token = '$token'";
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('Contraseña actualizada');
                window.location.href = 'public/auth/login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar contraseña');
                window.location.href = 'public/auth/login.php';
              </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js.map"></script>
    <link href="./styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link href="./styles/navbarestilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="./styles/AgregarStyles.css" />
    <link href="http://localhost/shops/public/styles/productostyles.css">
    <title>Actualizar contraseña</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <div class="card-body">
                <form id="actualizarcontrasena" action="./actualizar-contrasena.php" method="post">
                    <h2 class="text-center mb-4">Actualizar contraseña</h2>
                    <div class="form-group mb-3">
                        <label for="contrasena">Nueva contraseña:</label>
                        <input class="d-none" type="text" name="uid" id="uid" value=<?php echo $_GET['id'] ?>>
                        <input class="d-none" type="text" name="tokens" id="tokens" value=<?php echo $_GET['token'] ?>>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="contrasena">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="confirmarcontrasena" name="confirmarcontrasena"
                            required>
                    </div> -->
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</body>

</html>
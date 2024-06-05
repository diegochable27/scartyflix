<?php
include_once "./public/navbar/navbar.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require_once('./db/conexion.php');

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
    <title>Recuperar contraseña</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = new PHPMailer(true);

        $email = $_POST['correo'];
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $contrasena = $row['contrasena'];
            $id = $row['id'];
            $token = uniqid();
            $sql = "UPDATE usuarios SET token = '$token' WHERE correo = '$email'";
            $conexion->query($sql);

            try {
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'chablediego05@gmail.com';
                $mail->Password = 'idia lhac jqlv zelw';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Destinatarios
                $mail->setFrom('chablediego05@gmail.com', 'Soporte ScartyFlix');
                $mail->addAddress($email);     //Add a recipient
                // $mail->addAddress($email);
    
                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Recupera tu contrasenia';
                $mail->Body = 'Para recuperar tu contraseña haz clic en el siguiente enlace: <a href="http://localhost/scartyflix/actualizar-contrasena.php?id=' . $id . '&token=' . $token . '">Recuperar contraseña</a>';

                $mail->send();
                echo "<script>
                 alert('Hemos enviado un mensaje a su dirección de correo registrada.');
                 window.location.href = 'public/auth/login.php';
               </script>";
            } catch (Exception $e) {
                echo "<script>
                 alert('No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}');
                 window.location.href = 'public/auth/login.php';
               </script>";
            }
        } else {
            echo "<script>
                 alert('El correo que ingresaste no está registrado en nuestra base de datos. Por favor, verifica que has introducido la dirección correcta o regístrate si es la primera vez que utilizas nuestros servicios.');
                 window.location.href = 'recuperar-contrasena.php';
             </script>";
        }
    }

    ?>
    <br>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <div class="card-body">
                <form action="./recuperar-contrasena.php" method="post">
                    <h2 class="text-center mb-4">Recuperar contraseña</h2>
                    <div class="form-group mb-3">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
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

</html>
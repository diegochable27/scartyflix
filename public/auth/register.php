<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="../../styles/login.css" rel="stylesheet">
    <script src="../../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <title>Registro</title>

    <style>
        .btn-explorar {
            background-color: #2f45ff !important;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['correo'])) {
        header("Location: ../../index.php");
    }
    ?>
    <?php include_once "../navbar/navbar.php"; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/scartyflix/index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="http://localhost/scartyflix/public/auth/login.php">Inicio de sesión</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
    </nav>
    <br>
    <section class="card">
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <img src="../../img/login1.jpeg" class="img-fluid" alt="...">
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 ">
                <!-- <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
                    <img src="../../img/logo.png" class="img-fluid" width="100">
                </div> -->
                <div class="px-lg-5 pt-lg-4 p-4 w-100 align-self-center">
                    <h3 class="font-weight-bold text-dark mb-4">Crear cuenta</h3>
                    <form class="mb-5" action="../../db/register.php" method="post">
                        <div class="row mb-4">
                            <div class="col-6">
                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" required>
                            </div>
                            <div class="col-6">
                                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" name="contrasena" class="form-control mb-2" id="exampleInputPassword1" placeholder="Contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-explorar w-100" style="color: white;">Crear cuenta</button>
                    </form>
                    <hr class="my-4">
                    <div class="d-flex flex-column">
                        <button class="btn btn-danger btn-user btn-block mb-2">
                            <i class="fab fa-google fa-fw"></i> Registrate con Google
                        </button>
                        <button class="btn btn-primary btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Registrate con Facebook
                        </button>
                    </div>
                    <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 ">
                    <p class="d-inline-block mb-0">¿Ya tienes una cuenta?</p> <a href="./register.php"
                        class="font-weight-bold text-decoration-none">Inicia sesión</a>
                </div>
                </div>

                <!--<div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 ">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="./register.php" class="font-weight-bold text-decoration-none">Crea una ahora</a>
                </div> -->
            </div>
        </div>

    </section>

    <br>
    <?php include_once "../footer/footer.php"; ?>
</body>

</html>
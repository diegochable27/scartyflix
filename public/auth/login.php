<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="../../styles/login.css" rel="stylesheet">
    <link href="../../styles/login2.css" rel="stylesheet">
    <script src="../../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <title>Inicio de sesión</title>

    <style>
        .btn-explorar {
            background-color: #2f45ff !important;
        }

        .fondo {
            background-color: #2f45ff !important;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    session_start();
    if (isset($_SESSION['correo'])) {
        header("Location: ../../index.php");
    }
    ?>
    <?php include_once "../navbar/navbar.php"; ?>
    <nav aria-label="breadcrumb margen">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/scartyflix/index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inicio de sesión</li>
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
                    <h3 class="font-weight-bold text-dark mb-4">Iniciar sesión</h3>
                    <form class="mb-5" action="../../db/login.php" method="post">
                        <div class="mb-4">
                            <input type="email" name="correo" class="form-control form-control-user"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control mb-2" name="contrasena"
                                id="exampleInputPassword1" placeholder="Contraseña">
                            <a class="form-text text-muted text-decoration-none" href="/scartyflix/recuperar-contrasena.php">¿Has olvidado tu
                                contraseña?</a>
                        </div>

                        <button type="submit" class="btn btn-explorar w-100" style="color: white;">Iniciar sesión</button>
                    </form>
                    <hr class="my-4">
                    <div class="d-flex flex-column">
                        <button class="btn btn-danger btn-user btn-block mb-2">
                            <i class="fab fa-google fa-fw"></i> Iniciar sesión con Google
                        </button>
                        <button class="btn btn-primary btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Iniciar sesión con Facebook
                        </button>
                    </div>

                    <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 ">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="./register.php"
                        class="font-weight-bold text-decoration-none">Crea una ahora</a>
                </div>
                
                </div>

            </div>
        </div>

    </section>

    <br>
    <br>

    <?php include_once "../footer/footer.php"; ?>
</body>

</html>
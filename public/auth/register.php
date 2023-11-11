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
            <li class="breadcrumb-item"><a href="http://localhost/shops/index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="http://localhost/shops/public/auth/login.php">Inicio de sesión</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
    </nav>
    <br>
    <section class="card">
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item img-1 min-vh-100 active">
                            <!-- <img src="../../img/defaul.jpeg" class="d-block w-100" alt="..."> -->
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Mejores Precios</h5>
                                <p>Precios bajos en muchos de los productos y ofertas todos los dias </p>
                            </div>
                        </div>
                        <div class="carousel-item img-2 min-vh-100">
                            <!--<img src="../../img/defaul.jpeg" class="d-block w-100" alt="...">-->
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Envios gratis</h5>
                                <p>Envios gratis en varias partes del mundo</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100 ">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 nb-auto">
                    <img src="../../img/logo.png" class="img-fluid" width="100">
                </div>
                <div class="px-lg-5 pt-lg-4 p-4 w-100 align-self-center">
                    <h1 class="font-weight-bold text-dark mb-4">Crear cuenta</h1>
                    <form class="mb-5" action="../../db/register.php" method="post">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu Apellido" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo</label>
                            <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control mb-2" id="exampleInputPassword1" placeholder="Ingresa tu contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100">Crear cuenta</button>
                    </form>
                    <p class="font-weight-bold text-center">O Crear cuenta con</p>
                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn btn-outline-dark flex-grow-1 mr-2"><i class="bi bi-facebook"></i> Facebook</button>
                        <button type="button" class="btn btn-outline-dark flex-grow-1 ml-2"><i class="bi bi-google"></i> Google</button>
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
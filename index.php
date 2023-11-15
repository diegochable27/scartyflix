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
    <link href="./styles/buscador.css">
    <title>Fancy Store</title>
</head>

<body class="g-0">
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>
    <br>
    <header class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <?php
            if (isset($_SESSION['nombre'])) {
                $nombre = $_SESSION['nombre'];
                $apellidos = $_SESSION['apellidos'];
                echo '<h1 class="display-4">¡Bienvenido ' . $nombre . '!</h1>';
            } else {
                echo '<h1 class="display-4">¡Bienvenido!</h1>';
            }
            ?>

                <p class="lead">Donde encontrarás una gran variedad de productos a los mejores precios.</p>
                <a href="#" class="btn btn-warning btn-lg">Explora más</a>
            </div>
        </header>
        <br>
        <br>
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h2>Acerca de Nosotros</h2>
                        <p>Somos una tienda apasionada por brindar a nuestros clientes productos de alta calidad y una experiencia de compra excepcional.</p>
                        <h2>Nuestro Compromiso</h2>
                        <p>Nuestro compromiso con la excelencia y la satisfacción del cliente nos impulsa a seguir creciendo y mejorando. Nuestro experimentado equipo está aquí para ayudarte en cada paso del camino, desde la selección de productos hasta la entrega a tu puerta.</p>

                    </div>
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./img/a1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/a2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./img/a3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container mt-100">
                <div class="container d-flex justify-content-center mt-100">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-wrapper mb-45 text-center">
                                <div class="product-img">
                                    <a href="#" data-abc="true"> <img src="./img/img1.jpg" alt=""> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-wrapper mb-45 text-center">
                                <div class="product-img">
                                    <a href="#" data-abc="true"> <img src="./img/img2.jpg" alt=""> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-wrapper mb-45 text-center">
                                <div class="product-img">
                                    <a href="#" data-abc="true"> <img src="./img/im3.jpg" alt=""> </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-wrapper mb-45 text-center">
                                <div class="product-img">
                                    <a href="#" data-abc="true"> <img src="./img/img2.jpg" alt=""> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>
    <br>
    <script src="./js/buscador.js"></script>        
    <?php include_once "./public/footer/footer.php"; ?>

</body>

</html>
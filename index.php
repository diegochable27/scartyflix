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
    <title>Shops</title>
</head>

<body class="g-0">
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>
    <br>
    <header class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">¡Bienvenido a Diego may!</h1>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla neque expedita nam! Assumenda optio cupiditate error nostrum repellendus sapiente molestias. Ad dignissimos animi porro similique nisi veritatis, rem modi quidem!</p>
                    <h2>Acerca de Nosotros</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla neque expedita nam! Assumenda optio cupiditate error nostrum repellendus sapiente molestias. Ad dignissimos animi porro similique nisi veritatis, rem modi quidem!</p>

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
                                <img src="./img/defaul.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./img/defaul.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./img/defaul.jpeg" class="d-block w-100" alt="...">
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
    <br>

    <?php include_once "./public/footer/footer.php"; ?>

</body>

</html>
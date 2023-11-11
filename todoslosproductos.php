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
    <title>Productos</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <img src="./uploads/Nike Dunk High Retro/zapato.png" class="card-img-top" alt="Nombre del Producto">
                    <div class="card-body">
                        <h5 class="card-title">Nombre del Producto</h5>
                        <p class="card-text">Descripción del producto. Puedes agregar detalles aquí.</p>
                        <a href="#" class="btn btn-primary mb-2">Agregar al Carrito</a>
                        <button type="button" class="btn btn-outline-secondary mb-2">Agregar a Favoritos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
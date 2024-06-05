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
    <title>Acerca de nosotros</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>

    <br>
    <div class="container">
        <h1 class="text-center">Acerca de nosotros</h1>
        <p class="text-center">Bienvenido a nuestro sitio web de películas y series. Aquí podrás encontrar una amplia variedad de contenido para disfrutar en tu tiempo libre.</p>
        <p class="text-center">Nuestro equipo está compuesto por apasionados del cine y la televisión que trabajan duro para traerte las últimas novedades y los clásicos atemporales.</p>
        <p class="text-center">Si tienes alguna pregunta o sugerencia, no dudes en ponerte en contacto con nosotros.</p>
        </br>
        <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="http://localhost/scartyflix/index.php">Volver al inicio</a>
    </div>
    </div>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
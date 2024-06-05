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
    <link href="http://localhost/shops/styles/vistadeproducto.css">

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <title></title>

    <style>
        .custom-img {
            max-width: 300px;
            /* Tamaño máximo deseado para las imágenes */
            height: auto;
            /* Permite que la altura se ajuste automáticamente */
        }

        .product-info {
            padding: 20px;
            /* Añade un relleno para mejorar la presentación */
        }

        .product-price {
            font-size: 24px;
            /* Cambia el tamaño de la fuente para el precio */
            font-weight: bold;
            color: #007bff;
            /* Cambia el color del texto del precio */
        }
    </style>



</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    $id = $_GET['id'];

    if (isset($_SESSION["id"])) {
        $iduser = $_SESSION["id"];
    } else {
        // Maneja el caso en que "id" no está establecido en la sesión.
        // Por ejemplo, podrías redirigir al usuario a la página de inicio de sesión.
    }
    
    include("./db/Conexion.php");

    $sql = "SELECT * FROM peliculas WHERE id_pelicula  = $id";
    $result = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $anio_publicacion = $row['anio_publicacion'];
    $descripcion = $row['descripcion'];
    $trailerurl = $row["trailer_url"];
    $videourl = $row["video_url"];
    $id_genero = $row["id_genero"];

    $sqlgenero = "SELECT * FROM genero WHERE id_genero  = $id_genero";
    $resultgenero = mysqli_query($conexion, $sqlgenero);

    $rowgenero = mysqli_fetch_array($resultgenero);
    $genero = $rowgenero['nombre'];



    ?>
    </br>
    <div class="products">
        <div class="container card">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="product-image">
                        <div class="plyr__video-embed" id="player">
                            <iframe
                                src="https://www.youtube.com/embed/<?php echo $trailerurl; ?>?origin=https://plyr.io"
                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>

                        <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
                        <script>
                            const player = new Plyr('#player');
                        </script>
                    </div>
                </div>

                <div class="col-md-8 col-xs-12">
                    <div class="product-info">
                        <h2>
                            <?php echo $nombre ?>
                        </h2>
                        <p class="product-price">
                            <strong>
                                <?php echo $anio_publicacion ?>
                            </strong>
                        </p>
                        <p class="genero-info">
                            <?php
                            echo '<div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f5f5f5; display: inline-block;">';
                            echo '<h6 style="margin: 0; padding: 0; color: #555; font-weight: bold;">' . strtoupper($genero) . '</h6>';
                            echo '</div>';
                            ?>
                        </p>
                        <p class="lead">
                            <?php echo $descripcion ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container card" style="width: 100%; height: 500px;">
    <div class="plyr__video-embed2" id="player2" style="width: 100%; height: 100%;">
        <iframe src="https://voe.sx/e/<?php echo $videourl; ?>?origin=https://plyr.io" allowfullscreen
            allowtransparency allow="autoplay" style="width: 100%; height: 100%;"></iframe>
    </div>

    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
    <script>
        const player2 = new Plyr('#player2');
    </script>
</div>
    </br>
    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
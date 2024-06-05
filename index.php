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
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <title>SCARTYFLIX</title>
    <style>
        .btn-explorar {
            background-color: #2f45ff !important;
        }

        .headerimage {
            background-size: cover;
            background-position: center;
            height: 400px;
            /* Ajusta la altura según sea necesario */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .headerimage .container {
            position: relative;
            z-index: 1;
        }

        .text-white {
            color: white;
            /* Cambia el color del texto a blanco */
        }

        .lead {
            max-width: 600px;
            /* Ajusta este valor según sea necesario */
            margin: right;
            /* Centra el contenedor en la página */
        }


        /* Estilos para las tarjetas */
        .imgAnimation {
            transition: all 0.5s;
        }

        .imgAnimation:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="g-0">
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    include("./db/conexion.php");
    include('./db/validar_sesion.php');


    $sql = "SELECT * FROM peliculas ORDER BY id_pelicula DESC LIMIT 2";
    $result = mysqli_query($conexion, $sql);

    $pelicula1 = null;
    $pelicula2 = null;

    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $trailerurl = $row["trailer_url"];
        $idpelicula = $row['id_pelicula'];
        if (strlen($descripcion) > 150) {
            $descripcion = substr($descripcion, 0, 150) . "...";
        }

        $sqlfotos = "SELECT * FROM imagenes_miniatura WHERE propietario = '$row[nombre]'";
        $resultfotos = mysqli_query($conexion, $sqlfotos);
        $rowfotos = mysqli_fetch_array($resultfotos);

        if ($rowfotos !== null && isset($rowfotos['ruta_imagen'])) {
            $foto = $rowfotos['ruta_imagen'];
        } else {
            $foto = "./img/miniaturadefault2.jpg";
        }

        if ($i == 0) {
            $pelicula1 = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'foto' => $foto,
                'idpelicula' => $idpelicula
            ];
        } else {
            $pelicula2 = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'foto' => $foto,
                'idpelicula' => $idpelicula
            ];
        }

        $i++;
    }
    ?>
    <div class="cuerpo" id="cuerpo">
        <header class="jumbotron jumbotron-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="headerimage" style="background-image: url('<?php echo $pelicula1['foto']; ?>');">
                            <div class="container text-right text-white">
                                <h1>
                                    <?php echo $pelicula1['nombre']; ?>
                                </h1>
                                <p class="lead">
                                    <?php echo $pelicula1['descripcion']; ?>
                                </p>
                                <div>
                                    <a href="./verpelicula.php?id=<?php echo $pelicula1['idpelicula']; ?>"
                                        class="btn btn-light btn-lg" style="color: black;">
                                        <i class="fas fa-play fa-sm"></i> Reproducir
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-lg" style="color: white;">
                                        <i class="fas fa-question-circle"></i> Mas información
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="headerimage" style="background-image: url('<?php echo $pelicula2['foto']; ?>');">
                            <div class="container text-right text-white">
                                <h1>
                                    <?php echo $pelicula2['nombre']; ?>
                                </h1>
                                <p class="lead">
                                    <?php echo $pelicula2['descripcion']; ?>
                                </p>
                                <div>
                                    <a href="./verpelicula.php?id=<?php echo $pelicula2['idpelicula']; ?>"
                                        class="btn btn-light btn-lg" style="color: black;">
                                        <i class="fas fa-play fa-sm"></i> Reproducir
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-lg" style="color: white;">
                                        <i class="fas fa-question-circle"></i> Mas información
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
            </div>
        </header>
    </div>

    <br>
    <br>

    <section>
        <div class="container mt-100">
            <h3>Peliculas de estreno</h3>
            <br>
            <div class="container d-flex justify-content-center mt-100">
                <div class="row">
                    <?php
                    include("./db/conexion.php");
                    // include('./db/validar_sesion.php');
                    
                    $sql = "SELECT * FROM peliculas ORDER BY id_pelicula ASC LIMIT 3";
                    $result = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $nombre = $row['nombre'];
                        $idpelicula = $row['id_pelicula'];
                        if (strlen($descripcion) > 80) {
                            $descripcion = substr($descripcion, 0, 80) . "...";
                        }

                        $sqlfotos = "SELECT * FROM imagenes_miniatura WHERE propietario = '$row[nombre]'";
                        $resultfotos = mysqli_query($conexion, $sqlfotos);
                        //solo guardar el primer resultado
                        $rowfotos = mysqli_fetch_array($resultfotos);
                        // $foto = $rowfotos['ruta_imagen'];
                    
                        if ($rowfotos !== null && isset($rowfotos['ruta_imagen'])) {
                            $foto = $rowfotos['ruta_imagen'];
                        } else {
                            // Maneja el caso en que $rowfotos es null o no tiene la clave 'ruta_imagen'.
                            $foto = "./img/miniaturadefault2.jpg";
                        }
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-12 imgAnimation" style="width: 400px;">
                            <?php
                            echo '<a href="./verpelicula.php?id=' . $idpelicula . '" class="text-decoration-none">';
                            ?>
                            <div class="card mb-3">
                                <div class="position-relative">
                                    <?php echo '<img class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" src="' . $foto . '" alt="Cargando..">' ?>
                                    <div class="position-absolute top-0 start-0 m-2">
                                        <span style="background-color: rgba(0,0,0,0.7); color: white; padding: 5px;">Recién
                                            agregado</span>
                                    </div>
                                    <div class="position-absolute top-0 end-0 m-2">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-decoration-none text-dark">
                                        <?php echo $nombre ?>
                                    </h5>
                                </div>
                            </div>
                            </a>
                        </div>

                        <?php

                    }
                    ?>


                </div>
            </div>
        </div>

        </div>
    </section>
    </div>

    <style>
        .resultados {
            background-color: #b3ccff;
            width: 500px;
            height: auto;
            padding: 20px;
            margin: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .resultados h2 {
            margin-bottom: 10px;
            color: #fff;
            text-align: center;
        }

        .resultados ul {
            list-style: none;
            padding: 0;
        }

        .resultados li {
            margin-bottom: 8px;
            color: #fff;
            font-size: 16px;
        }
    </style>

    <button class="resultados text-left" id="resultados">
        <div id="resultadosBusqueda"></div>
    </button>
    <br>
    <script src="./js/buscador.js"></script>
    <?php include_once "./public/footer/footer.php"; ?>

</body>

</html>
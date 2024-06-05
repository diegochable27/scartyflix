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
    <title>Peliculas</title>
    <style>
        .container form {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .container form label,
        .container form select,
        .container form input[type="submit"] {
            margin-right: 20px;
        }

        .container form label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .container form select {
            width: 200px;
            padding: 8px;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .container form input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Estilos para las tarjetas */
        .imgAnimation {
            transition: all 0.5s;
        }
        .imgAnimation:hover {
            transform: translateX(25px);
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>

    <br>
    <div class="container">
        <div class="container">
            <form action="" method="get">
                <label for="id_genero">Genero:</label>
                <select id="id_genero" name="id_genero">
                    <option value="">Selecciona un genero</option>
                    <!-- Aquí debes agregar las genero que correspondan -->
                    <option value="1">Accion</option>
                    <option value="2">Aventura</option>
                    <!-- etc. -->
                </select>



                <input type="submit" value="Filtrar">
            </form>
        </div>
        <br>
        <div class="row">
            <?php
            include("./db/conexion.php");
            // include('./db/validar_sesion.php');

            $sql = "SELECT * FROM peliculas";
            $result = mysqli_query($conexion, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $anio_publicacion = $row['anio_publicacion'];
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
                            <div class="position-absolute top-0 end-0 m-2">
                                <form action="./todoslosproductos.php">
                                    <button type="button" class="btn btn-outline-secondary" name=<?php echo "favorito" . $idpelicula ?>><i class="far fa-heart"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-decoration-none text-warning">
                                <?php echo $nombre?>
                            </h5>
                            <p class="card-text text-decoration-none text-dark">
                                <?php echo $descripcion ?>
                            </p>
                            <h5 class="card-text text-decoration-none text-primary">
                                <?php echo $anio_publicacion ?>
                            </h5>
                        </div>
                    </div>
                    </a>
                </div>

                <?php
                if (isset($_GET["favorito" . $idpelicula])) {
                    $sqlfavorito = "INSERT INTO favoritos (id_product, id_usuario) VALUES ('$idproducto', '$_SESSION[id]')";
                    $resultfavorito = mysqli_query($conexion, $sqlfavorito);

                    if ($resultfavorito) {
                        echo '<script>alert("Producto agregado a favoritos")</script>';
                    } else {
                        echo '<script>alert("Error al agregar el producto a favoritos")</script>';

                    }
                }
            }
            ?>


        </div>
    </div>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
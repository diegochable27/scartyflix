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
    <title>Productos</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>
    <nav aria-label="breadcrumb margen">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/scartyflix/index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peliculas</li>
        </ol>
    </nav>
    <div style="margin: 20px;">

        <br>
        <div class="d-flex justify-content-between">
            <?php
            include("./db/conexion.php");
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM Usuarios WHERE id = '$id'";
            $result = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_array($result);
            $tipo = $row['nombre'];

            echo "<p>Peliculas</p>";

            ?>

            <a href="./agregarpelicula.php" class="btn btn-primary">
                Agregar Pelicula
            </a>



        </div>

        <br>
        <table class="table table-light table-striped">
            <thead>
                <td class="col">Folio</td>
                <td class="col">Nombre</td>
                <td class="col">Descripcion</td>
                <td class="col">Año de publicacion</td>
                <td class="col">Genero</td>
                <td class="col">Trailer URL</td>
                <td class="col">Video URL</td>
            </thead>
            <tbody>
                <?php
                include("./db/conexion.php");
                $id = $_SESSION['id'];
                if ($tipo == "Admin") {
                    $sql = "SELECT * FROM peliculas";
                    $result = mysqli_query($conexion, $sql);
                } else {
                    $sql = "SELECT * FROM peliculas";
                    $result = mysqli_query($conexion, $sql);
                }

                while ($row = mysqli_fetch_array($result)) {
                    $idpelicula = $row['id_pelicula'];
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $anio_publicacion = $row['anio_publicacion'];
                    $id_genero = $row['id_genero'];
                    $trailerurl = $row['trailer_url'];
                    $videourl = $row['video_url'];

                    $sqlgenero = "SELECT * FROM genero WHERE id_genero = '$id_genero'";
                    $resultgenero = mysqli_query($conexion, $sqlgenero);
                    $rowgenero = mysqli_fetch_array($resultgenero);
                    $genero = $rowgenero['nombre'];

                        if(strlen($descripcion) > 50){
                            $descripcion = substr($descripcion, 0, 50) . "...";
                        }
                        echo "<tr>";
                        echo "<td>$idpelicula</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$anio_publicacion</td>";
                        echo "<td>$genero</td>";
                        echo "<td>$trailerurl</td>";
                        echo "<td>$videourl</td>";
                        echo "<td class = 'justify-content-between' >";
                        echo "<a href='./editarproductos.php?id=$idpelicula' class='btn btn-warning'>Editar</a>";
                        echo "<a href='./db/eliminarproducto.php?id=$idpelicula' class='btn btn-danger ml-3'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>


    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
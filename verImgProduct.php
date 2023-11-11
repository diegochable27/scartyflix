
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
    <title>Ver imagenes</title>
</head>
<body>

    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    ?>
    <nav aria-label="breadcrumb margen">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./productos.php">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Imagenes</li>
        </ol>
    </nav>
    <div style="margin: 20px;">
    
    <br>
    <div class="d-flex justify-content-between">
        <?php
            include("./db/conexion.php");
            $idProducto = $_GET['id'];

        
            $sql = "SELECT * FROM productos WHERE id_producto = '$idProducto'";
            $result = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_array($result);
            $propetario = $row['nombre'];

            echo "<p>Productos de $propetario</p>";

        ?>


    </div>

        <br>
        <table class="table table-light table-striped">
            <thead>
                <td class="col">Id</td>
                <td class="col">propietario</td>
                <td class="col">Nombre</td>
                <td class="col">Imagen</td>
            </thead>
            <tbody>
                <?php
                include("./db/conexion.php");
                $idProducto = $_GET['id'];

                $sql = "SELECT * FROM imagenes WHERE propietario = '$propetario'";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['propietario'] . "</td>";
                    echo "<td>" . $row['nombre_imagen'] . "</td>";
                    echo "<td><img src='". $row['ruta_imagen'] . "' width='100px' height='100px'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php include_once "./public/footer/footer.php"; ?>
    
</body>
</html>
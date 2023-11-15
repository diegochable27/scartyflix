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
            <li class="breadcrumb-item"><a href="http://localhost/shops/index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
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

            echo "<p>Productos de $tipo</p>";

            ?>

            <a href="./AgregarProductos.php" class="btn btn-primary">
                Agregar Producto
            </a>



        </div>

        <br>
        <table class="table table-light table-striped">
            <thead>
                <td class="col">Folio</td>
                <td class="col">Nommbre</td>
                <td class="col">Descripcion</td>
                <td class="col">Categoria</td>
                <td class="col">Cantidad</td>
                <td class="col">Precio</td>
                <td class="col">Acciones</td>
            </thead>
            <tbody>
                <?php
                include("./db/conexion.php");
                $id = $_SESSION['id'];
                if ($tipo == "Admin") {
                    $sql = "SELECT * FROM Productos";
                    $result = mysqli_query($conexion, $sql);
                } else {
                    $sql = "SELECT * FROM Productos WHERE id_Vendedor = '$id'";
                    $result = mysqli_query($conexion, $sql);
                }

                while ($row = mysqli_fetch_array($result)) {
                    $idpro = $row['id_producto'];
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $categoria = $row['id_categoria'];
                    $cantidad = $row['cantidad'];
                    $precio = $row['precio'];

                    $sqlcategoria = "SELECT * FROM categoria WHERE id_categoria = '$categoria'";
                    $resultcategoria = mysqli_query($conexion, $sqlcategoria);
                    $rowcategoria = mysqli_fetch_array($resultcategoria);
                    $categoria = $rowcategoria['nombre'];

                    if (strlen($descripcion) > 50) {
                        $descripcion = substr($descripcion, 0, 50) . "...";
                    }
                    echo "<tr>";
                    echo "<td>$idpro</td>";
                    echo "<td>$nombre</td>";
                    echo "<td>$descripcion</td>";
                    echo "<td>$categoria</td>";
                    echo "<td>$cantidad</td>";
                    echo "<td>$precio</td>";
                    echo "<td class='justify-content-between'>";
                    // Que envíe el id del producto y del dueño
                    echo "<a href='./editarproductos.php?id=$idpro' class='btn btn-warning'>Editar</a>";

                        $sqlcategoria = "SELECT * FROM categoria WHERE id_categoria = '$categoria'";
                        $resultcategoria = mysqli_query($conexion, $sqlcategoria);
                        $rowcategoria = mysqli_fetch_array($resultcategoria);
                        $categoria = $rowcategoria['nombre'];

                        if(strlen($descripcion) > 50){
                            $descripcion = substr($descripcion, 0, 50) . "...";
                        }
                        echo "<tr>";
                        echo "<td>$idpro</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$categoria</td>";
                        echo "<td>$cantidad</td>";
                        echo "<td>$precio</td>";
                        echo "<td class = 'justify-content-between' >";
                        echo "<a href='./editarproductos.php?id=$idpro' class='btn btn-warning'>Editar</a>";
                        echo "<a href='./db/eliminarproducto.php?id=$idpro' class='btn btn-danger ml-3'>Eliminar</a>";
                        echo "<a href='./verImgProduct.php?id=$idpro' class='btn btn-success ml-3' >Ver imagenes</a>";
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
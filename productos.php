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

            <a href=""  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Producto
            </a>

            

        </div>
        <table class="table table-light table-striped">
            <thead>
                <td class="col">Id</td>
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
                    $sql = "SELECT * FROM Productos WHERE id_Vendedor = '$id'";
                    $result = mysqli_query($conexion, $sql);
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['id_producto'];
                        $nombre = $row['nombre'];
                        $descripcion = $row['descripcion'];
                        $categoria = $row['id_categoria'];
                        $cantidad = $row['cantidad'];
                        $precio = $row['precio'];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$nombre</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>$categoria</td>";
                        echo "<td>$cantidad</td>";
                        echo "<td>$precio</td>";
                        echo "<td>";
                        echo "<a href='./EditarProducto.php?id=$id' class='btn btn-warning'></a>";
                        echo "<a href='./db/eliminarProducto.php?id=$id' class='btn btn-danger'>Eliminar</a>";
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
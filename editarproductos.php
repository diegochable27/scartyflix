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
    <title>Agregar</title>
</head>
<body >
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    include("./db/conexion.php");
    $id = $_GET['id'];
    $iddesp = $_SESSION['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = '$id'";

    $sqluser = "SELECT * FROM usuarios WHERE id = '$iddesp'";
    $resultuser = mysqli_query($conexion, $sqluser);
    $rowuser = mysqli_fetch_array($resultuser);
    $nombreuser = $rowuser['nombre'];

    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $cantidad = $row['cantidad'];
    $precio = $row['precio'];

    ?>
    <nav aria-label="breadcrumb margen">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/shops/index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="./productos.php">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar</li>
        </ol>
    </nav>
    <br>
    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="./db/AgregarProductos.php" class="form form-inline" method="post" enctype="multipart/form-data">
                        <h2 class="title-form">Agregar Productos</h2>
                        <div class="mb-3">
                            <label class="form-label" for="inlineFormCustomSelectPref">Despachador</label>
                            <select class="form-select" name="despachador" id="inlineFormCustomSelectPref">
                                <option value= <?php echo $iddesp ?> selected> <?php echo $nombreuser ?></option>
                            </select>
                        </div>
                        <div>
                            <label for="nombre" class="form-label font-weight-bold">Nombre del producto</label>
                            <input type="text" class="form-control mb-2" name="nombre" id="nombre" value=<?php echo $nombre ?> required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label font-weight-bold">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="4" required> <?php echo $descripcion ?></textarea>
                        </div>

                        <div class="col-12 d-flex flex-column">
                            <div class="d-flex">
                                <div class="col-6">
                                    <label for="cantidad" class="form-label font-weight-bold">Cantidad</label>
                                    <input type="number" class="form-control " name="cantidad" id="cantidad" value=<?php echo $cantidad ?> required>
                                </div>
                                <div class="col-6">
                                    <label for="precio" class="form-label font-weight-bold ms-1">Precio</label>
                                    <input type="number" step="any"  class="form-control mb-2 ms-1" name="precio" value=<?php echo $precio ?> id="precio" required>
                                </div>
                                
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="inlineFormCustomSelectPref">Categoria</label>
                            <select class="form-select" name="Categoria" id="inlineFormCustomSelectPref" required>
                                <option selected>Categorias...</option>
                                <?php
                                                            
                                    $sql = "SELECT * FROM categoria";
                                    $result = mysqli_query($conexion, $sql);
                                    $row = mysqli_fetch_array($result);
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['id_categoria'];
                                        $nombre = $row['nombre'];
                                        echo "<option value='$id'>$nombre</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="flex-column">
                            <button type="submit" class="btn btn-warning w-100">Guardar</button>
                            <br>
                            <br>
                            <a href="./productos.php" class="btn btn-secondary w-100">Cancelar</a>
                        </div>
                        
                    </form>

                </div>
                <div class="col-md-6">
                    <br>
                    <h2 class="title-form">Preview de las imagenes</h2>
                    <div class=" w-100 h-auto" id="preview-container"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
</body>
</html>
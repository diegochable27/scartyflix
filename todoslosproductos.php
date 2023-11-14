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
            <?php
            include("./db/conexion.php");

            $sql = "SELECT * FROM Productos";
            $result = mysqli_query($conexion, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $idproducto = $row['id_producto'];
                if (strlen($descripcion) > 80) {
                    $descripcion = substr($descripcion, 0, 80) . "...";
                }

                $sqlfotos = "SELECT * FROM imagenes WHERE propietario = '$row[nombre]'";
                $resultfotos = mysqli_query($conexion, $sqlfotos);
                //solo guardar el primer resultado
                $rowfotos = mysqli_fetch_array($resultfotos);
                $foto = $rowfotos['ruta_imagen'];
                $precio = $row['precio'];
                
            ?>

                <div class="col-lg-4 col-md-6 col-sm-12" style="width: 400px;">
                    <?php
                        echo '<a href="./vistadeproducto.php?id='.$idproducto.'" class="text-decoration-none">';
                    ?>
                        <div class="card mb-3">
                            <div class="position-relative">
                            <?php echo '<img class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" src="'.$foto.'" alt="Nombre del Producto">'?>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <form action="./todoslosproductos.php">
                                        <button type="button" class="btn btn-outline-secondary"><i class="far fa-heart"></i></button>
                                        <button type="submit" class="btn btn-outline-secondary ms-2" name=<?php  echo "carrito" . $idproducto ?> ><i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-decoration-none text-warning"><?php echo $nombre ?></h5>
                                <p class="card-text text-decoration-none text-dark"><?php echo $descripcion ?></p>
                                <h5 class="card-text text-decoration-none text-primary">$<?php echo $precio ?></h5>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
                if(isset($_GET["carrito" . $idproducto])){
                    $sqlcarrito = "INSERT INTO carrito (id_product, id_usuario, precio) VALUES ('$idproducto', '$_SESSION[id]', '$precio')";
                    $resultcarrito = mysqli_query($conexion, $sqlcarrito);
                    if($resultcarrito){
                        echo '<script>alert("Producto agregado al carrito")</script>';
                    }
                }
            }
                //si se preciona el boton de carrito se agrega el producto al carrito
                

            ?>

        </div>
    </div>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
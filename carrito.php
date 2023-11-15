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
    <title>Carrito</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    $_SESSION["total"] = 0;
    ?>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <?php

                include("./db/conexion.php");
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM carrito WHERE id_usuario = '$id'";
                $result = mysqli_query($conexion, $sql);
                $carritototal = $result->num_rows;
                $_SESSION["Carritototal"] = $carritototal;
                while ($row = mysqli_fetch_array($result)) {
                    $idtodo = $row['id'];
                    $idproducto = $row['id_product'];
                    $sql2 = "SELECT * FROM Productos WHERE id_producto = '$idproducto'";
                    $result2 = mysqli_query($conexion, $sql2);
                    $row2 = mysqli_fetch_array($result2);
                    $nombre = $row2['nombre'];
                    $descripcion = $row2['descripcion'];
                    $precio = $row2['precio'];
                    $sqlfotos = "SELECT * FROM imagenes WHERE propietario = '$row2[nombre]'";
                    $resultfotos = mysqli_query($conexion, $sqlfotos);
                    $rowfotos = mysqli_fetch_array($resultfotos);
                    $foto = $rowfotos['ruta_imagen'];
                    $preciototal = $_SESSION["total"] + $precio;
                    $_SESSION["total"] = $_SESSION["total"] + $precio;


                ?>
                    <div class="row p-2 bg-white border rounded">

                        <div class="col-md-3 mt-1">
                            <?php echo '<img class="img-fluid img-responsive rounded product-image" style="height: 200px;" src="' . $foto . '" alt="Nombre del Producto">' ?>
                        </div>
                        <div class="col-md-6 mt-1">
                            <h5><?php echo $nombre ?></h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                            </div>
                            <br>

                            <p class="text-justify para mb-0"><?php echo $descripcion ?></p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1"><?php echo "$" . $precio ?></h4>
                            </div>
                            <h6 class="text-success">Envio Gratis</h6>
                            <div class="d-flex flex-column mt-4">
                                <form action="./carrito.php">
                                    <button 7 class="btn btn-danger btn-sm" type="submit" name=<?php echo "eliminar" . $idtodo ?>>Eliminar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <br>

                <?php

                    if (isset($_GET["eliminar" . $idtodo])) {
                        $sqleliminar = "DELETE FROM carrito WHERE id = '$idtodo'";
                        $resulteliminar = mysqli_query($conexion, $sqleliminar);

                        if ($result) {
                            echo '<script>alert("Producto eliminado del carrito")</script>';
                            echo '<script>window.location="./carrito.php"</script>';
                        } else {
                            echo '<script>alert("Error al eliminar el producto")</script>';
                        }
                    }
                }
                ?>
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1">
                        <h5>Envio Gratis</h5>
                    </div>
                    <div class="col-md-6 mt-1">
                        <h5>Total</h5>
                        <h4 class="mr-1"><?php echo "$" . $_SESSION["total"] ?></h4>
                        <h5>IvA</h5>
                        <h4 class="mr-1"><?php $iva = 14.324 * $carritototal;
                                            echo "$" . $iva  ?></h4>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1"><?php
                                                $_SESSION["total"] = $_SESSION["total"] + $iva;
                                                echo "$" . $_SESSION["total"]
                                                ?></h4>
                        </div>
                        <div class="d-flex flex-column mt-4">
                            <!-- Replace 'test' with your Client ID -->
                            <script src="https://www.paypal.com/sdk/js?client-id=AfDLYuAMrmwNCpMYeaYcbAurHpArr-WYGWtDPUefbpFotpibKUqBYhxAkzSoh43QMqxz0IgwyYLyJb16&currency=MXN"></script>

                            <div id="paypal-button-container"></div>

                            <script>
                                paypal.Buttons({
                                    createOrder: function(data, actions) {
                                        // Set up the transaction
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: '<?php echo $preciototal ?>'
                                                }
                                            }]
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        // Capture the funds from the transaction
                                        return actions.order.capture().then(function(details) {
                                            // Show a success message to the buyer
                                            alert('Transaction completed by ' + details.payer.name.given_name);
                                        });
                                    }
                                }).render('#paypal-button-container'); // Display the button on the page
                            </script>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
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
    <title>Pagar</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    $_SESSION["total"] = 0
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">
                        Detalles del Producto
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            include("./db/conexion.php");
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM carrito WHERE id_usuario = '$id'";
                            $result = mysqli_query($conexion, $sql);
                            $carritototal = $result->num_rows;
                            while ($row = mysqli_fetch_array($result)) {
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
                                $_SESSION["total"] = $_SESSION["total"] + $precio;

                                //imprimir el nombre y el precio7
                                echo '<div class="col-md-5">';
                                echo '<div class="d-flex flex-row">';
                                //que las imagenes sean de mismo tamaño
                                echo '<img src="' . $foto . '" width="100" height="100">';
                                echo '<div class="d-flex flex-column justify-content-center ml-3">';
                                echo '<h5 class="mb-0">' . $nombre . '</h5>';
                                echo '<span class="text-muted">Cantidad: 1</span>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-md-7">';
                                echo '<div class="d-flex flex-row align-items-center">';
                                echo '<h4 class="text-muted"> $' . $precio . '</h4>';
                                echo '</div>';
                                echo '</div>';

                                $_SESSION["total"] = $_SESSION["total"] + $precio;
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-end">
                                <p class="mb-0">Subtotal</p>
                                <p class="mb-0">Envio</p>
                                <p class="mb-0">Total</p>
                            </div>
                            <div class="col text-end">
                                <p class="mb-0">$<?php $precio = $_SESSION["total"];
                                                    echo $precio; ?></p>
                                <p class="mb-0">Gratis</p>
                                <p class="mb-0">$<?php echo $_SESSION["total"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Resumen de la Compra
                    </div>
                    <div class="card-body">
                        <p class="card-text">Total: <?php echo $_SESSION["total"]; ?></p>
                        <div id="paypal-button-container"></div>
                        <p id="result-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            value: '<?php echo $precio ?>' 
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
    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
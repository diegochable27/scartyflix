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
    <title>Configuración</title>
</head>

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";

    include("./db/conexion.php");
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM Usuarios WHERE id = '$id'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result);
    $nombres = $row['nombre'];
    $apellidos = $row['apellidos'];
    $correos = $row['correo'];
    $contrasena = $row['contrasena'];

    $nombrerol = $row['id_rol'];

    $sqlrol = "SELECT * FROM roles WHERE id_rol = '$nombrerol'";
    $resultrol = mysqli_query($conexion, $sqlrol);
    $rowrol = mysqli_fetch_array($resultrol);
    $nombrerol = $rowrol['nombre'];
    ?>
    <div style="margin: 20px;">
        <br>
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-right">
                        <form action="post">
                            <h2>Configuración</h2>
                            <hr />
                            <div class="col-12 d-flex flex-column">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre y
                                    apellido</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2" name="nombre" id="nombre"
                                        placeholder="Nombre" value=<?php echo $nombres ?>>
                                    <input type="text" class="form-control mb-2 ms-2" name="apellidos" id="apellidos"
                                        placeholder="Apellido" value=<?php echo $apellidos ?>>
                                </div>
                            </div>
                            <hr />
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo
                                    actual</label>
                                <input type="correo" class="form-control mb-2" name="correo" id="correo"
                                    placeholder="Ingresa tu correo" value=<?php echo $correos ?> readonly>
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo nuevo</label>
                                <input type="correo" class="form-control mb-2" name="correo" id="correo"
                                    placeholder="Ingresa tu correo">
                            </div>
                            <hr />
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Contraseña
                                    actual</label>
                                <input type="password" class="form-control mb-2" name="contrasena" id="contrasena"
                                    placeholder="Ingresa tu contraseña" value=<?php echo $contrasena ?>>
                                <label for="exampleInputEmail1" class="form-label font-weight-bold">Contraseña
                                    nueva</label>
                                <input type="password" class="form-control mb-2" name="contrasena" id="contrasena"
                                    placeholder="Ingresa tu contraseña">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-warning w-80">Guardar</button>
                                <button type="submit" class="btn btn-secondary w-80">Cancelar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            <div style="position: relative; text-align: center;">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" height="200px"
                                    width="200px" alt="..." class="mx-auto rounded-circle mb-3">
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#editarModal"
                                    style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);">
                                    <i class="fa fa-pencil-square-o"></i> Editar
                                </button>
                            </div>

                            </br>
                            <?php
                            if (isset($_SESSION['nombre'])) {
                                $nombre = $_SESSION['nombre'];
                                $apellidos = $_SESSION['apellidos'];
                                $correo = $_SESSION['correo'];
                                echo '<h3>' . $nombre . ' ' . $apellidos . '</h3>';
                                echo '<h6>' . $correo . '</h6>';
                                echo '<div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f5f5f5; display: inline-block;">';
                                echo '<h6 style="margin: 0; padding: 0; color: #555; font-weight: bold;">' . strtoupper($nombrerol) . '</h6>';
                                echo '</div>';
                                echo '</br>';
                                echo '</br>';
                                echo '</br>';

                                if ($nombrerol !== 'vendedor') {
                                    echo '<h6>¿Quieres ser vendedor?</h6>';
                                    echo '<a href="#" class="btn btn-warning w-80">Solicitar</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once "./public/footer/footer.php"; ?>
</body>

</html>
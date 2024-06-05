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

<body>
    <?php
    session_start();
    include_once "./public/navbar/navbar.php";
    include("./db/conexion.php");
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];

    ?>
    <nav aria-label="breadcrumb margen">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/scartyflix/index.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="./peliculas.php">Peliculas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar</li>
        </ol>
    </nav>
    <br>
    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="./db/AgregarPelicula.php" class="form form-inline" method="post"
                        enctype="multipart/form-data">
                        <h2 class="title-form">Agregar Pelicula</h2>
                        <div class="mb-3">
                            <label class="form-label" for="id_admin">Administrador</label>
                            <select class="form-select" name="id_admin" id="id_admin">
                                <option value=<?php echo $id ?> selected> <?php echo $nombre ?></option>

                            </select>
                        </div>
                        <div>
                            <label for="nombre" class="form-label font-weight-bold">Nombre de la pelicula</label>
                            <input type="text" class="form-control mb-2" name="nombre" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label font-weight-bold">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="4"
                                required></textarea>
                        </div>

                        <div class="col-12 d-flex flex-column">
                            <div class="d-flex">
                                <div class="col-6">
                                    <label for="anio_publicacion" class="form-label font-weight-bold">Año de
                                        publicacion</label>
                                    <select class="form-control" name="anio_publicacion" id="anio_publicacion" required>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="id_genero">Categoria</label>
                                    <select class="form-select" name="id_genero" id="id_genero"
                                        required>
                                        <option selected>Categorias...</option>
                                        <?php
                                        $sql = "SELECT * FROM genero";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['id_genero'];
                                            $nombre = $row['nombre'];
                                            echo "<option value='$id'>$nombre</option>";
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>
                        </div>
                        </br>
                        <div class="mb-3">
                            <label class="form-label" for="inlineFormCustomSelectPref">Trailer URL</label>
                            <input type="text" class="form-control mb-2" name="trailer_url" id="trailer_url"
                                placeholder="Ingresa el link del trailer" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inlineFormCustomSelectPref">Video URL</label>
                            <input type="text" class="form-control mb-2" name="video_url" id="video_url"
                                placeholder="Ingresa el link de la pelicula" required>
                        </div>
                        <div class="mb-3">
                            <label for="validatedCustomFile" class="form-label">Agregar Miniatura: imagen del icono de
                                la película</label>
                            <input type="file" class="form-control" id="validatedCustomFile" name="imagenes_miniatura[]"
                                multiple required>
                            <div class="invalid-feedback">Agrega imagenes</div>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="validatedCustomFile2" class="form-label">Agregar Póster: imagen de banner grande de la película</label>
                            <input type="file" class="form-control" id="validatedCustomFile2" name="imagenes_poster[]" multiple
                                required>
                            <div class="invalid-feedback">Agrega imagenes</div>
                        </div> -->
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

                <!-- La ventana modal error-->
                <div class="modal" tabindex="-1" role="dialog" id="ModalError">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body text-center">
                                <i class="fas fa-times-circle fa-3x text-danger"></i>
                                </br>
                                </br>
                                <h3>Error</h3>
                                <p>El tipo de imagen no es valido, intente nuevamente con una imagen (.jpeg, .png,
                                    .jpg).</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal"
                                    style="width: 80px;">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin ventana modal error-->

                <!-- La ventana modal completo-->
                <div class="modal" tabindex="-1" role="dialog" id="ModalCompleto">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body text-center">
                                <i class="fas fa-check-circle fa-3x text-success"></i>
                                </br>
                                </br>
                                <h3>Completo</h3>
                                <p>El archivo fue subido exitosamente.</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal"
                                    style="width: 80px;">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin ventana modal completo-->
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include_once "./public/footer/footer.php"; ?>
    <script src="./js/image.js"></script>
</body>

</html>
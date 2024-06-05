<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .btn-explorar {
        background-color: #2f45ff !important;
    }
    .border-explorar {
        border-color: #2f45ff !important;
    }
    .navcolor{
        background-color: #d1d1d1 !important;
    }
</style>
<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm navcolor">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/scartyflix/index.php">
            <i class="fa-solid fa-shop me-2"></i>
            <!-- <img src="./img/logo.png" alt="" width="50px" height="50px"> -->
            <strong>SCARTYFLIX</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Buscador de PC -->
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">

                <div class="input-group">
                    <span class="border-explorar input-group-text btn-explorar text-white"><i
                            class="bi bi-search"></i></span>
                    <input type="text" name="nombreproducto" id="nombreproducto"
                        class="form-control border-explorar light-table-filter" style="color:#7a7a7a"
                        placeholder="Buscar por nombre">
                    <button type="submit" class="btn btn-explorar text-white" id="btnbuscar"
                        onclick=buscartdos()>Buscar</button>
                </div>
            </div>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active"
                        href="http://localhost/scartyflix/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase"
                        href="http://localhost/scartyflix/peliculas.php">Peliculas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase"
                        href="http://localhost/scartyflix/error.php">Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase"
                        href="http://localhost/scartyflix/contacto.php">Contacto</a>
                </li>
                <?php if (isset($_SESSION['correo'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="http://localhost/scartyflix/error.php">Favoritos</a>
                    </li>
                    <?php if ($_SESSION['rol'] == 1) { ?>
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle mx-2 text-uppercase" href="#" id="navbarDropdown1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Super Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="http://localhost/scartyflix/dashboard/">Panel Admistrativo</a></li>
                                <li><a class="dropdown-item" href="./peliculas_agregadas.php">Peliculas</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Productos</a></li>
                                <li><a class="dropdown-item" href="#">Categorias</a></li>
                                <li><a class="dropdown-item" href="#">Solicitudes</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['rol'] == 2) { ?>
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle mx-2 text-uppercase" href="#" id="navbarDropdown1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="./peliculas_agregadas.php">Peliculas</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <?php if (isset($_SESSION['correo'])) {
                    $fotoperfil = $_SESSION['foto'];
                    ?>
                    <li class="nav-item me-3 me-lg-0 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            echo '<img src="' . $fotoperfil . '" class="rounded-circle" height="22" alt="" loading="lazy" />'
                                ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="./configuracion.php">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="./db/cerrar.php">Cerrar sesión</a></li>
                        </ul>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase"
                            href="http://localhost/scartyflix/public/auth/login.php"><i
                                class="fa-solid fa-circle-user me-1"></i>Iniciar sesión</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
</div>
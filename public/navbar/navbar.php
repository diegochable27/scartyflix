<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="superNav border-bottom py-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
                <select class="me-3 border-0 bg-light">
                    <option value="en-us">ESPAÑOL</option>
                    <option value="en-gb">INGLES</option>
                </select>
                <?php
                if (isset($_SESSION['correo'])) {
                    echo '<span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>' . $_SESSION['correo'] . '</strong></span>';
                }               
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
                <span class="me-3"><i class="fa-solid fa-truck text-muted me-1"></i><a class="text-muted" href="#">Envios</a></span>
                <span class="me-3"><i class="fa-solid fa-file  text-muted me-2"></i><a class="text-muted" href="#">Politicas</a></span>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/shops/index.php"><i class="fa-solid fa-shop me-2"></i> <strong>Fancy Store</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <form action="">
                <div class="input-group">
                    <span class="border-warning input-group-text bg-warning text-white"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control border-warning" style="color:#7a7a7a">
                    <button class="btn btn-warning text-white"  >Buscar</button>
                </div>
            </form>
        </div>
        <!-- Buscador de PC -->
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                
                    <div class="input-group">
                        <span class="border-warning input-group-text bg-warning text-white"><i
                                class="bi bi-search"></i></span>
                        <input type="text" name="nombreproducto" id="nombreproducto"
                            class="form-control border-warning light-table-filter" style="color:#7a7a7a"
                            placeholder="Buscar por nombre">
                        <button type="submit" class="btn btn-warning text-white" id="btnbuscar" onclick=buscartdos() >Buscar</button>
                    </div>
                

                <!-- <form action="./db/BuscarProductos.php"  method="GET">
                    <div class="input-group">
                        <span class="border-warning input-group-text bg-warning text-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="nombreproducto" class="form-control border-warning" style="color:#7a7a7a" placeholder="Buscar por nombre">
                        <button type="submit" class="btn btn-warning text-white">Buscar</button>
                    </div>
                </form> -->
            </div>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase active" href="http://localhost/shops/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="http://localhost/shops/todoslosproductos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Categorias</a>
                </li>
                <?php if (isset($_SESSION['correo'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">Mis compras</a>
                    </li>
                    <?php if ($_SESSION['rol'] == 1) { ?>
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle mx-2 text-uppercase" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="#">Usuarios</a></li>
                                <li><a class="dropdown-item" href="#">Productos</a></li>
                                <li><a class="dropdown-item" href="#">Categorias</a></li>
                                <li><a class="dropdown-item" href="#">Solicitudes</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($_SESSION['rol'] == 2) { ?>
                        <li class="nav-item me-3 me-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle mx-2 text-uppercase" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Vendedor
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="./productos.php">Productos</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <?php if (isset($_SESSION['correo'])) { 
                    $fotoperfil = $_SESSION['foto'];
                ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="./carrito.php">

                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3 me-lg-0 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                echo '<img src="'.$fotoperfil.'" class="rounded-circle" height="22" alt="" loading="lazy" />'
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="./configuracion.php">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="./db/cerrar.php">Cerrar sessión</a></li>
                        </ul>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="http://localhost/shops/public/auth/login.php"><i class="fa-solid fa-circle-user me-1"></i>Iniciar sesión</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
</div>
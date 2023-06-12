<?php $_SESSION['carrito'] = array() ?>
<header class="container-scroller">
    <nav class="navbar p-0 d-flex flex-row fixed-top bg-dark" style="left: 0;">
        <div class="navbar-brand-wrapper d-flex d-sm-none align-items-center bg-dark">
            <a class="navbar-brand brand-logo-mini" href="<?php echo $inicio ?>">
                <img src="<?php echo $src ?>assets/img/logo-mini.svg" class="w-auto h-auto" alt="logo">
            </a>
        </div>
        <div class="navbar-brand-wrapper d-none d-sm-flex align-items-center bg-dark">
            <a class="navbar-brand" href="<?php echo $inicio ?>">
                <img src="<?php echo $src ?>assets/img/logo.svg" alt="logo">
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex ml-auto w-auto p-0">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button class="nav-link" id="cartDropdown" data-toggle="dropdown">
                        <i class="fa-solid fa-cart-shopping text-primary" style="font-size: 160%"></i>
                    </button>
                    <div id="carrito" class="dropdown-menu dropdown-menu-right navbar-dropdown p-3 m-sm-3 m-lg-0"
                        aria-labelledby="cartDropdown">
                        <h6 class="pb-1 text-center">Carrito de Compras</h6>
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="lista-carrito"></tbody>
                        </table>
                        <button class="btn btn-primary btn-block mt-3" onclick="vaciarCarrito()">Vaciar Carrito</button>
                        <button class="btn btn-danger btn-block" onclick="procesarPedido()">Procesar Pedido</button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-toggler navbar-toggler-right d-block mr-2" data-bs-toggle="collapse"
            data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
            <button class="d-flex align-items-center">
                <?php if (empty($nombre)) { ?>
                    <i class="fa-solid fa-circle-user text-muted icon-md"></i>
                <?php } else { ?>
                    <img class="img-xs rounded-circle" src="<?php echo $src ?>assets/img/homer.png" alt="Profile Image">
                    <p class="mb-0 ml-2 d-none d-sm-block navbar-profile-name text-white">
                        <?php echo $nombre ?>
                    </p>
                <?php } ?>
                <i class="fa-solid fa-caret-down text-muted ml-2 d-none d-sm-flex"></i>
            </button>
        </div>
        <?php if (empty($nombre)) { ?>
            <div class="collapse bg-dark w-100" id="collapse">
                <div class="card px-4 bg-dark align-items-end">
                    <a class="nav-link p-0 pb-3" href="<?php echo $srcPage ?>login.php">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i>Ingresar
                    </a>
                    <a class="nav-link p-0 pb-3" href="<?php echo $srcPage ?>register.php">
                        <i class="fa-solid fa-id-card mr-2"></i>Registro
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="collapse bg-dark w-100" id="collapse">
                <div class="card px-4 bg-dark align-items-end">
                    <a class="nav-link p-0 pb-3" href="#">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i>Perfil
                    </a>
                    <a class="nav-link p-0 pb-3 text-danger" href="<?php echo $src ?>components/_logout.php">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i>Salir
                    </a>
                </div>
            </div>
        <?php } ?>
    </nav>
</header>
<header class="container-scroller">
    <nav class="navbar p-0 d-flex flex-row fixed-top bg-dark" style="left: 0;">
        <div class="navbar-brand-wrapper d-flex d-sm-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="<?php echo $inicio ?>">
                <img src="<?php echo $src ?>assets/img/logo-mini.svg" class="w-auto h-auto" alt="logo">
            </a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex">
            <div class="navbar-brand-wrapper d-none d-sm-flex align-items-center justify-content-center bg-dark">
                <a class="navbar-brand" href="<?php echo $inicio ?>">
                    <img src="<?php echo $src ?>assets/img/logo.svg" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                </li>
            </ul>

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <i class="fa-solid fa-cart-shopping icon-md"></i>
                        </div>
                    </a>
                    <div id="carrito" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list p-3"
                        aria-labelledby="profileDropdown">
                        <h6 class="pb-2 mb-0 text-center">Carrito de Compras</h6>
                        <div class="dropdown-divider"></div>
                        <table id="lista-carrito" class="table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="dropdown-divider"></div>
                        <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block mt-3">Vaciar Carrito</a>
                        <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                            Compra</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="offcanvas">
                <i class="fa-solid fa-bars-staggered h4 m-0"></i>
            </button>
        </div>

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
    </nav>
</header>
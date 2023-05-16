<header class="container-scroller">
    <nav class="navbar p-0 d-flex flex-row fixed-top bg-dark" style="left: 0;">
        <div class="navbar-brand-wrapper d-flex d-sm-none align-items-center bg-dark">
            <a class="navbar-brand brand-logo-mini" href="<?php echo $inicio ?>">
                <img src="<?php echo $src ?>assets/img/logo-mini.svg" class="w-auto h-auto" alt="logo">
            </a>
        </div>
        <div class="navbar-menu-wrapper d-sm-flex justify-content-between col-sm-12 d-none">
            <div class="navbar-brand-wrapper d-none d-sm-flex align-items-center bg-dark">
                <a class="navbar-brand" href="<?php echo $inicio ?>">
                    <img src="<?php echo $src ?>assets/img/logo.svg" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="cartDropdown" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <i class="fa-solid fa-cart-shopping text-primary" style="font-size: 25px;"></i>
                        </div>
                    </a>
                    <div id="carrito" class="dropdown-menu dropdown-menu-right navbar-dropdown p-3 m-sm-3 m-lg-0"
                        aria-labelledby="cartDropdown">
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
        </div>
        <button class="navbar-toggler navbar-toggler-right d-block d-sm-none mr-2" type="button"
            data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
            <i class="fa-solid fa-bars-staggered text-muted"></i>
        </button>
        <div class="collapse bg-dark w-100" id="collapse">
            <div class="card px-4 pb-3 bg-dark align-items-end">
                <a href="#">Login</a>
                <a href="#">Registro</a>
            </div>
        </div>
    </nav>
</header>
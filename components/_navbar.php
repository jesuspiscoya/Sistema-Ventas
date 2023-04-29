<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="<?php echo $src ?>index.php">
      <img src="<?php echo $src ?>assets/images/logo-mini.svg" class="w-auto h-auto" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex">
    <button class="navbar-toggler" type="button" data-toggle="minimize">
      <i class="fa-solid fa-bars h4 m-0"></i>
    </button>
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          <input type="text" class="form-control" placeholder="Search products">
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="<?php echo $src ?>assets/images/homer.png" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">
              <?php echo $_SESSION['nombre'] ?>
            </p>
            <i class="fa-solid fa-caret-down d-none d-sm-block ml-2"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <h6 class="p-3 mb-0">Profile</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-gear text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="<?php echo $src ?>components/salir.php">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-right-from-bracket text-danger"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Salir</p>
            </div>
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-toggle="offcanvas">
      <i class="fa-solid fa-bars-staggered h4 m-0"></i>
    </button>
  </div>
</nav>
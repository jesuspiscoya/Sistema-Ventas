<nav class="sidebar sidebar-offcanvas vh-100 position-fixed" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="<?php echo $src ?>">
      <img src="<?php echo $src ?>assets/img/logo.svg" class="w-auto h-auto" alt="logo" />
    </a>
  </div>
  <ul class="nav h-100 mb-0">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="<?php echo $src ?>assets/img/homer.png" alt="Image Profile">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">
              <?php echo $_SESSION['usuario'] ?>
            </h5>
            <span>Administrador</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown">
          <i class="fa-solid fa-ellipsis-vertical px-2"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="<?php echo $srcPage ?>settings.php" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-gear text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Configuración</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo $srcPage ?>password.php" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-key text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Password</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navegación</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="<?php echo $src ?>index.php">
        <span class="menu-icon">
          <i class="fa-solid fa-gauge-high"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#perfil" aria-expanded="false" aria-controls="perfil">
        <span class="menu-icon">
          <i class="fa-solid fa-id-card-clip"></i>
        </span>
        <span class="menu-title">Perfil</span>
        <i class="fa-solid fa-angle-down ml-auto"></i>
      </a>
      <div class="collapse" id="perfil">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $srcPage ?>settings.php">Configuración</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $srcPage ?>password.php">Contraseña</a>
          </li>
        </ul>
      </div>
    </li>
    <?php if ($_SESSION['pedidos']) { ?>
      <li class="nav-item menu-items">
        <a class="nav-link" href="<?php echo $srcPage ?>pedidos.php">
          <span class="menu-icon">
            <i class="fa-solid fa-box"></i>
          </span>
          <span class="menu-title">Pedidos</span>
        </a>
      </li>
    <?php }
    if ($_SESSION['productos']) { ?>
      <li class="nav-item menu-items">
        <a class="nav-link" href="<?php echo $srcPage ?>productos.php">
          <span class="menu-icon">
            <i class="fa-solid fa-tags"></i>
          </span>
          <span class="menu-title">Productos</span>
        </a>
      </li>
    <?php }
    if ($_SESSION['usuarios']) { ?>
      <li class="nav-item menu-items">
        <a class="nav-link" href="<?php echo $srcPage ?>usuarios.php">
          <span class="menu-icon">
            <i class="fa-solid fa-user"></i>
          </span>
          <span class="menu-title">Usuarios</span>
        </a>
      </li>
    <?php }
    if ($_SESSION['clientes']) { ?>
      <li class="nav-item menu-items">
        <a class="nav-link" href="<?php echo $srcPage ?>clientes.php">
          <span class="menu-icon">
            <i class="fa-regular fa-face-smile"></i>
          </span>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item menu-items mt-auto">
      <div class="dropdown-divider"></div>
      <a class="nav-link mb-2" href="<?php echo $src ?>components/_logout.php">
        <div class="menu-icon">
          <i class="fa-solid fa-right-from-bracket text-danger"></i>
        </div>
        <span class="menu-title font-weight-normal">Cerrar Sesión</span>
      </a>
    </li>
  </ul>
</nav>
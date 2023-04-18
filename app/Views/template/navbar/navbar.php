<!-- partial:partials/_horizontal-navbar.html -->
<div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="<?= base_url('/assets/images/logo-academia-rm-black-02.webp') ?>" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="<?= base_url('/assets/images/logo-academia-rm-black-02.webp') ?>" alt="logo" />
            </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img class="image-profile-style" src="/assets/images/users/<?php if(!empty(session()->get('profile_photo'))): ?><?= session()->get('email').'/'.session()->get('profile_photo') ?><?php else:?>default-profile.jpg<?php endif;?>" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                    <p class="text-black font-weight-semibold m-0">
                        <?php echo session()->get('full_name'); ?>
                    </p>
                    <span class="font-13 online-color">Opciones <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="/logout">
                        <i class="mdi mdi-logout mr-2 text-danger"></i> Salir 
                    </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                  <i class="mdi mdi-compass-outline menu-icon"></i>
                  <span class="menu-title">Panel</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-monitor-dashboard menu-icon"></i>
                  <span class="menu-title">Captaciones</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <li class="nav-item">
                      <a class="nav-link" href="/statements">Declaraciones</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/acea_configuration">Configuracion de A.C.E.</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/ui-features/dropdowns.html">Configuracion de campos</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-user menu-icon" aria-hidden="true"></i>
                  <span class="menu-title">Usuarios</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <li class="nav-item">
                      <a class="nav-link" href="/users/super_users">Superusuarios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/users/administrative">Administrativos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/users/agents">Agentes de ventas</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/properties/my_properties">
                  <i class="mdi mdi-clipboard-text menu-icon"></i>
                  <span class="menu-title">Mis propiedades</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/properties/list">
                  <i class="fa fa-home menu-icon" aria-hidden="true"></i>
                  <span class="menu-title">Propiedades</span>
                </a>
              </li>
              <li class="nav-item">
                <div class="nav-link d-flex">
                    <button style="background: #161616;" class="btn btn-sm border-info text-white"> 
                      <i class="fa fa-cogs pr-1" style="font-size:15px;" aria-hidden="true"></i> Soporte técnico
                    </button>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url('assets/') ?>img/logo.png" alt="Logo CAPERTE" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">CAPERTE</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $user_image ?>" class="" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('profile') ?>" class="d-block"><?= $name ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" id="dashboard_index">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/station') ?>" class="nav-link" id="station_index">
              <i class="nav-icon fas fa-gas-pump"></i>
              <p>
                SPBU
              </p>
            </a>
          </li>
          <?php if( $this->session->userdata('role_name') == 'Admin' ): ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/fuel') ?>" class="nav-link" id="fuel_index">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Bahan Bakar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/users') ?>" class="nav-link" id="users_index">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('aco') ?>" class="nav-link" id="aco_index">
              <i class="nav-icon fas fa-map-signs"></i>
              <p>
                Algoritma
              </p>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
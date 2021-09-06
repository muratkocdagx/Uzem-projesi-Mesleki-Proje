  <?php 
  $panel_user = sessionus('kullan','Pinfo');
  $user = $panel_user['id'];
  $datceks = Data_List_Dynamic('user',array('status' == 1));
  foreach ($datceks as $key) {
  if ($key['id'] == $user) {
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="<?= base_url('back/assets/dist/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AREL EDU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url($key['image']) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('profile') ?>" class="d-block"><?=  $key['user_name'] ?> <?= $key['user_surname'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Arama" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p> Anasayfa</p>
            </a>
          </li>
          <?php  if ($key['admin'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('user');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Öğretmen/Öğrenci
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('department');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Bölümler
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?= base_url('lessons');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Dersler
              </p>
            </a>
          </li>
          <?php } ?>
           <?php  if ($key['user_status'] == 3) { ?>
          <li class="nav-item">
            <a href="<?= base_url('lessons-view');?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Dersler
              </p>
            </a>
          </li>
           <?php } ?>
           <?php  if ($key['user_status'] == 3) { ?>
          <li class="nav-item">
            <a href="<?= base_url('notes');?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Notlar
              </p>
            </a>
          </li>
           <?php } ?>
           <?php  if ($key['user_status'] == 2 ) { ?>
          <li class="nav-item">
            <a href="<?= base_url('add-note');?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Not Ekle
              </p>
            </a>
          </li>
          <?php } ?>
         
          <?php  if ($key['user_status'] == 3) { ?>
          <li class="nav-item">
            <a href="<?= base_url('announcement');?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Duyurular
              </p>
            </a>
          </li>
          <?php } ?>
          <?php  if ($key['user_status'] == 2 || $key['admin'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('add-announcement');?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Duyuru Oluştur
              </p>
            </a>
          </li>
         <?php } ?>
         <?php  if ($key['user_status'] == 2 || $key['user_status'] == 3) { ?>
          <li class="nav-item">
            <a href="<?= base_url('events');?>" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Etkinlikler
              </p>
            </a>
          </li>
           <?php } ?>
          <?php  if ($key['admin'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url('add-events');?>" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Etkinlik Oluştur
              </p>
            </a>
          </li>
          <?php } ?>

           <li class="nav-item">
            <a href="<?= base_url('mail');?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mesajlar
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php } } ?>

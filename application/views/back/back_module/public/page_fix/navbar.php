  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("logout") ?>">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php  $panel_user = sessionus('kullan','Pinfo');
        $d  = $panel_user['id']; echo mail_read($d); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


        <?php
        $panel_user = sessionus('kullan','Pinfo');
        $user_id  = $panel_user['id'];
        $user_bra = $panel_user['user_bra']; 
        $fe = Data_List_Dynamic('mail',array( 'mail_receive' => $user_id , 'read_mail' => 0,  'admin' => 0),8);
        foreach ($fe as $fe) {
        ?>


          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <?php
                  $ke = Data_List_Dynamic('user',array( 'id' => $fe['mail_send']  ),1);
                foreach ($ke as $ke) {?> 
              <img src="<?= base_url($ke['image']) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                       <?= $ke['user_name'] ?>  <?= $ke['user_surname'] ?>
                  <?php }
                 ?>
                </h3>
                <p class="text-sm"><?= short($fe['title'], 10) ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= $fe['mail_send_time'] ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>


        <?php } ?>
       

          <a href="<?= base_url('mail');?>" class="dropdown-item dropdown-footer">Tüm Mesajları Gör</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?= events_read() ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Etkinlik Çizelgesi</span>
          <div class="dropdown-divider"></div>

             <?php
                  $panel_user  = sessionus('kullan','Pinfo');
                  $ids        = $panel_user['user_ep'];

                  $me = Data_List_Dynamic('events',array( 'status' => 1 ,   ),12,'event_time','asc');
                foreach ($me as $me) {  if ($ids == $me['events_dep'] || $me['all_view'] == 1) { if(strtotime($me['event_time']) >  strtotime(date('d.m.Y'))) {?> 
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <?= short($me['title'], 10) ?>
            <span class="float-right text-muted text-sm"><?=  kalangun($me['event_time']) ?></span>
          </a>
           <?php } } }?>
       

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Tüm Etkinlikler</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->
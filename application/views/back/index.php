<?php         $panel_user = sessionus('kullan','Pinfo');
        $user_id  = $panel_user['id'];
        $user_bra = $panel_user['user_bra']; 
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('back/back_module/public/page_fix/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php $this->load->view('back/back_module/public/page_fix/loader.php'); ?>
<?php $this->load->view('back/back_module/public/page_fix/navbar.php'); ?>
<?php $this->load->view('back/back_module/public/page_fix/sidebar.php'); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Anasayfa</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= mail_read($user_id); ?> Bildirim</h3>

                <p>E-Posta</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('mail');?>" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= ann_read() ?> Bildirim</h3>

                <p>Duyurular</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('announcement');?>" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= events_read() ?> Bildirim</h3>

                <p>Etkinlikler</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('events');?>#" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Duyurular
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">


                  <?php
                  $cd = Data_List_Dynamic('announcement',array('status' => 1),8,'creat_time','desc');
                  foreach ($cd as $cd) {
                  ?>

                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <!-- todo text -->
                    <span class="text"><?= $cd['title'] ?></span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> <?php $eb = strtotime($cd['creat_time'])  ?> <?=  gecenzaman($eb); ?></small>
                    <!-- General tools such as edit or delete-->
                  </li>
                
                <?php
                 }
                ?>



                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Etkinlikler
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <?php
                  $panel_user  = sessionus('kullan','Pinfo');
                  $time = strtotime(date('d.m.Y'));
                  $ids        = $panel_user['user_ep'];
                  $ts = Data_List_Dynamic('events',array('status' => 1),8,'event_time','asc');
                  foreach ($ts as $ts) {
                     if ($ids == $ts['events_dep'] || $ts['all_view'] == 1) {
                    if (strtotime($ts['event_time']) >  $time) {
                  
                  ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <!-- todo text -->
                    <span class="text"><?= $ts['title'] ?></span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> <?=  kalangun($ts['event_time']) ?></small>
                    <!-- General tools such as edit or delete-->
                  </li>

                <?php
                 }  } }
                ?>


                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
<?php
                 $panel_user  = sessionus('kullan','Pinfo');
                  $ids         = $panel_user['id'];
                  $idsm         = $panel_user['admin'];

                  if($idsm != 1) {

              ?>
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Sistem ile mesajlaşma</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <?php
                  $panel_user  = sessionus('kullan','Pinfo');
                  $ids         = $panel_user['id'];
                  $kms = Data_List_Dynamic('mail',array(),50,'mail_send_time','desc');
                  foreach ($kms as $kms) {
                    if ($kms['mail_receive'] == $ids && $kms['mail_send'] == 1 || $kms['mail_send'] == $ids && $kms['mail_receive'] == 1) {
                   
                                      ?>
                  <div class="direct-chat-msg <?php if($kms['mail_send'] == $ids) {echo 'right';} ?>">
                    <div class="direct-chat-infos clearfix">
                       <?php
                  $lit = Data_List_Dynamic('user',array( 'id' => $kms['mail_send']  ),1);
                foreach ($lit as $lit) {?> 
                      <span class="direct-chat-name float-<?php if($kms['mail_send'] == $ids) {echo 'right';} else{echo 'left';} ?>"> <?= $lit['user_name'] ?>  <?= $lit['user_surname'] ?></span>
                      <span class="direct-chat-timestamp float-<?php if($kms['mail_send'] == $ids) {echo 'left';} else{echo 'right';} ?>"><?= gecenzamanres(strtotime($kms['mail_send_time'])) ?> </span>
                    </div>
                    <img class="direct-chat-img" src="<?= base_url($lit['image']) ?>" alt="message user image">
                                      <?php }
                 ?>
                    <div class="direct-chat-text">
                      <?= $kms['content'] ?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>

                <?php } } ?>


                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->


              </div>
          
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="<?= base_url('mail/direct-send')?>" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Mesajınızı Yazın" class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Hızlı Cevap</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
              <?php  } ?>

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Takvim
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            
            <!-- Map card -->
            <div class="card bg-gradient-primary" style="display:none;">


              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->




          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('back/back_module/public/page_fix/footer.php'); ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('back/back_module/public/page_fix/script.php'); ?>,
</body>
</html>

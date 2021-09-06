<?php
$panel_user = sessionus('kullan','Pinfo');
$bras  = $panel_user['id'];
if ($bras ==  $list['mail_send'] || $bras ==  $list['mail_receive']) {
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('back/back_module/public/page_fix/head.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php $this->load->view('back/back_module/public/page_fix/loader.php'); ?>
<?php $this->load->view('back/back_module/public/page_fix/navbar.php'); ?>
<?php $this->load->view('back/back_module/public/page_fix/sidebar.php'); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>E-Postalar</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php $this->load->view('back/mail/sidebar.php'); ?>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">E-Posta Detayı</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><?=  $list['title'] ?></h5>
                <h6>From: <?php   $a = datalist('user',array('id' => $list['mail_send'] ));
                      foreach ($a as $a) {  ?>
                         <?= $a['user_name']; ?>  <?= $a['user_surname']; ?>
                    <?php }  ?>
                  <span class="mailbox-read-time float-right"> <?= $list['mail_send_time']; ?> </span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                    <a href="<?= base_url('mail/delete/'.$list['id'].'') ?>"><i class="far fa-trash-alt"></i></a>
                  </button>
                  <?php if ($bras !=  $list['mail_send'] ) { ?>
                  
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                    <a href="<?= base_url('mail/reply/'.$list['id'].'') ?>"><i class="fas fa-reply"></i></a>
                  </button>
              
                  <?php } ?>

                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?= $list['content']; ?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Geri Dön</button>
              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i><a href="<?= base_url('mail/delete/'.$list['id'].'') ?>"> Sil </a></button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


  </div>  



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
<?php }  

else {

 $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-remove (alias)"></i>Aov</h4>Yetkiniz Dışında bir Görüntüleme işlemi yapamassınız</div>');
                redirect('mail');


}


?>
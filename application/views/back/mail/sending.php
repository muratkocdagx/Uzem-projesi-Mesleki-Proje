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
                <h3 class="card-title">E-Posta Yaz </h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('mail/sending/inserting') ?>" method="post" >
              <div class="card-body">
                <div class="form-group">
                 <select id="" class="form-control custom-select" name="cat">
                    <option disabled="" selected="">Seçiniz...</option>

                      <?php
                        $panel_user = sessionus('kullan','Pinfo');
                        $user = $panel_user['id'];
                        $status = $panel_user['user_status'];
                        $ad = $panel_user['admin'];
                        echo $status;
                        if ($status == 3) {
                          $a = datalist('user',array('id' =>  $user));
                       foreach ($a as $a) {$bra = $a['user_ep'];}
                       $b = datalist('department',array('id' => $bra ));
                       foreach ($b as $b) {$les = $b['id'];}
                            $c = datalist('lessons',array('lesson_cat' => $les ));
                       foreach ($c as $c) {$i = $c['id']; 
                            $d = datalist('user',array('user_bra' => $i ));
                       foreach ($d as $d) { if ($d['user_status'] == '2') {
                        ?>
                      <option value="<?= $d['id'] ?>"> <?= $d['user_name'] ?> <?= $d['user_surname'] ?></option>
                      <?php } } } }
                        elseif($status == 2) {
                        $a = datalist('user',array('id' =>  $user));
                       foreach ($a as $a) {$bra = $a['user_bra'];}
                       $b = datalist('lessons',array('id' => $bra ));
                       foreach ($b as $b) {$les = $b['lesson_cat'];}
                            $c = datalist('department',array('id' => $les ));
                       foreach ($c as $c) {$i = $c['id'];}
                            $d = datalist('user',array('user_ep' => $i ));
                       foreach ($d as $d) { if ($d['user_status'] == '3') {
                        ?>
                      <option value="<?= $d['id'] ?>"> <?= $d['user_name'] ?> <?= $d['user_surname'] ?> <?= $d['user_code'] ?></option>

                      <?php } } } 
                       elseif ($ad == 1) { 
                        $d = datalist('user');
                       foreach ($d as $d) { if ($d['user_status'] == 2 || $d['user_status'] == 3){?>
                        ?>
                      <option value="<?= $d['id'] ?>"> <?= $d['user_name'] ?> <?= $d['user_surname'] ?> <?= $d['user_code'] ?></option>

                       
                       <?php } } } ?>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Konu:" name="title">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="content">
                      
                    </textarea>
                </div>
             
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Gönder</button>
                </div>
              </div>

              </form>
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
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>

</body>
</html>

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
                <h3 class="card-title">E-Postayı Cevaplayınız</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('mail/sending/inserting') ?>" method="post" >
              <div class="card-body">
                <div class="form-group">
                Kime:
                     <?php   $a = datalist('user',array('id' => $list['mail_send'] ));
                      foreach ($a as $a) {  ?>
                         <?= $a['user_name']; ?>  <?= $a['user_surname']; ?>
                         <input type="hidden" value="<?= $a['id']; ?>" name="cat">
                    <?php }  ?>

                                   </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Konu:" name="title">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="content">

                    <?= $list['mail_send_time']; ?> tarihinde <?php   $a = datalist('user',array('id' => $list['mail_send'] ));
                      foreach ($a as $a) {  ?>
                         <?= $a['user_name']; ?>  <?= $a['user_surname']; ?>
                    <?php }  ?> Kişisinden ------------------------------------------------------------------------------------------------------------------------------ </br>

                       <?= $list['content']; ?>
                      
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

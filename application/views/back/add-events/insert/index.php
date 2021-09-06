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
            <h1><?=  $title; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
             
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="bolumkayit">
                    <form class="form-horizontal" action="<?= base_url('add-events/inserting');?>" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Etkinlik Başlığı</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="" name="title">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Etkinlik İçeriği</label>
                        <div class="input-group col-sm-10">
                         <textarea name="content" id="message"></textarea>
                         <script>
                          CKEDITOR.replace( 'message' );
                         </script>
                      </div>
                      </div>
                       <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hangi Bölümde Gözüksün</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="cat">
                              <option selected="" value="all23">Tüm Bölümlerde</option>
                              <?php  $f = datalist('department');
                               foreach ($f as $f) {;?>
                              <option value="<?= $f['id'] ?>"> <?= $f['department_name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Etkinlik tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" name="date">
                          </div>
                        </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                      </div>
                        <?php echo $this->session->flashdata('durum') ?>
                    </form>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<?php $this->load->view('back/back_module/public/page_fix/script.php'); ?>

</body>
</html>

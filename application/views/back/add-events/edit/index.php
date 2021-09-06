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
                    <form class="form-horizontal" action="<?= base_url('add-events/editing');?>" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Başlığı</label>
                        <div class="col-sm-10">
                          <input type="hidden" name="id" value="<?= $list['id'] ?>">
                          <input type="text" class="form-control" id="inputName" value="<?= $list['title'] ?>" name="title">
                        </div>
                      </div>
                     <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Duyuru İçeriği</label>
                        <div class="input-group col-sm-10">
                         <textarea name="content" id="message"><?= $list['content'] ?></textarea>
                         <script>
                          CKEDITOR.replace( 'message' );
                         </script>
                      </div>
                      </div>
                       <?php 
                      $panel_user  = sessionus('kullan','Pinfo');
                      $tes         = $panel_user['admin']; 
                      if ($tes == 1) { ?>
                       <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hangi Bölümde Gözüksün </label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="cat">
                              <?php if ($list['all_view'] == '1') { ?>
                              <option selected="" value="all23">Tüm Bölümlerde</option>
                            <?php }  else { ?>
                               <option value="all23">Tüm Bölümlerde</option>
                              <?php } ?>
                              <?php  $f = datalist('department',array('id' => $list['events_dep'] ));
                               foreach ($f as $f) { ;?>
                              <option selected="" value="<?= $f['id'] ?>"><?= $f['department_name'] ?></option>
                              <?php } ?>
                              <?php  $cf = datalist('department');
                               foreach ($cf as $cf) { if ($cf['id'] != $list['events_dep']) {?>
                               <option value="<?= $cf['id'] ?>"> <?= $cf['department_name'] ?></option>
                             <?php } } ?>
                             
                            </select>
                          </div>
                        </div>
                      <?php } ?>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Etkinlik tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" name="date" value="<?= $list['event_time'] ?>">
                          </div>
                        </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Kaydet</button>
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

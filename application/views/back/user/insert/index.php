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
            <h1><?= $title ?></h1>
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
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#ogrt" data-toggle="tab">Öğretmen Ekle</a></li>

                  <li class="nav-item"><a class="nav-link" href="#ogr" data-toggle="tab">Öğrenci Ekle</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="ogrt">
                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('user/inserting') ?>" method="post">
                        <div class="form-group row">
                          <input type="hidden" name="status" value="2">
                          <label for="inputName" class="col-sm-2 col-form-label">Adı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Soyadı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="" name="surname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="" name="email">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Numarası</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="number">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Şifresi</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEmail" placeholder="" name="pass">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" name="code">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Pasaportu veya Tc </label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="tc">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Doğum tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" name="date">
                          </div>
                        </div>
                       <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">İlgili ders</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="bra">
                              <option disabled="" selected="">Ders Seçiniz...</option>
                              <?php  $f = datalist('lessons');
                               foreach ($f as $f) {;?>
                              <option value="<?= $f['id'] ?>"> <?= $f['lesson_name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Öğretmen Ekle</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>


                  <div class="tab-pane" id="ogr">
                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('user/inserting') ?>" method="post">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Adı</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="status" value="3">
                            <input type="text" class="form-control" id="inputName" placeholder="" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Soyadı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="" name="surname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="" name="email">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Numarası</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="number">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Şifresi</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEmail" placeholder="" name="pass">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" name="code">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Pasaportu veya Tc </label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="tc">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Doğum tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" name="date">
                          </div>
                        </div>
                       <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Bölüm</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="ep">
                              <option disabled="" selected="">Bölüm Seçiniz...</option>
                              <?php  $f = datalist('department');
                               foreach ($f as $f) {;?>
                              <option value="<?= $f['id'] ?>"> <?= $f['department_name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Öğrenci Ekle</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <?php echo $this->session->flashdata('durum') ?>
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

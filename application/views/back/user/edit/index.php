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
             <!-- /.card-header -->
             <?php if($list['user_status'] == 2) { ?>
              <div class="card-body">
                <div class="tab-content">

                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('user/editing') ?>" method="post">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Adı</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $list['id'] ?>">
                            <input type="text" class="form-control" id="inputName" placeholder="" value="<?= $list['user_name'] ?>" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Soyadı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="" value="<?= $list['user_surname'] ?>" name="surname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_email'] ?>" name="email">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Numarası</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_number'] ?>" name="number">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Şifresi</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_pass'] ?>" name="pass">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_code'] ?>" name="code">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Pasaportu veya Tc </label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_tc'] ?>" name="tc">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Doğum tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_date'] ?>" name="date">
                          </div>
                        </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Bağlı Olduğu Bölüm</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="bra">
                              <?php  $f = datalist('lessons',array('id' => $list['user_bra']));
                               foreach ($f as $f) {;?>
                              <option selected="" value="<?= $f['id'] ?>"><?= $f['lesson_name'] ?></option>
                               <?php } ?>
                              <?php  $f = datalist('lessons');
                               foreach ($f as $f) {
                                 if ($f['id'] != $list['user_bra']) {
                                ?>
                              <option value="<?= $f['id'] ?>"> <?= $f['lesson_name'] ?></option>
                              <?php }  }?>
                            </select>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php } elseif ($list['user_status'] == 3) { ?>

                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('user/editing') ?>" method="post">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Adı</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?= $list['id'] ?>">
                            <input type="text" class="form-control" id="inputName" placeholder="" value="<?= $list['user_name'] ?>" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Soyadı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="" value="<?= $list['user_surname'] ?>" name="surname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_email'] ?>" name="email">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Numarası</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_number'] ?>" name="number">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Şifresi</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_pass'] ?>" name="pass">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_code'] ?>" name="code">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Pasaportu veya Tc </label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_tc'] ?>" name="tc">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Doğum tarihi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="" value="<?= $list['user_date'] ?>" name="date">
                          </div>
                        </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Bağlı Olduğu Bölüm</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="ep">
                              <?php  $f = datalist('department',array('id' => $list['user_ep']));
                               foreach ($f as $f) {;?>
                              <option selected="" value="<?= $f['id'] ?>"><?= $f['department_name'] ?></option>
                               <?php } ?>
                              <?php  $f = datalist('department');
                               foreach ($f as $f) {
                                 if ($f['id'] != $list['user_ep']) {
                                ?>
                              <option value="<?= $f['id'] ?>"> <?= $f['department_name'] ?></option>
                              <?php }  }?>
                            </select>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                          </div>
                        </div>
                      </form>
                    </div>

                  <?php } ?>
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

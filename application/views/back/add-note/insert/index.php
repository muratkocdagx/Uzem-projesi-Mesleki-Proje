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
            
             
                <div class="tab-content">
                  <div class="active tab-pane" id="ogrt">
                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('add-note/inserting') ?>" method="post">
                         <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Öğrenci Seçiniz</label>
                          <div class="col-sm-10">
                            <select id="" class="form-control custom-select" name="stu">
                              <option disabled="" selected="">Seçiniz...</option>
                              <?php
                                $panel_user = sessionus('kullan','Pinfo');
                                $user = $panel_user['id'];
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
                              <?php }}?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Quiz 1</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputName" placeholder="" name="ex1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Quiz 2</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="ex2">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">1.ci Notu</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="note1">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">2.ci Notu</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="note2">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Final Ödev Notu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" name="final">
                          </div>
                        </div>
                          
                        
                    
                      
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Notu Ekle</button>
                          </div>
                        </div>
                      </form>
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

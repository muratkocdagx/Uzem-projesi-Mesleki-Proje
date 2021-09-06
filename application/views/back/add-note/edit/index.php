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
                      <form class="form-horizontal" action="<?php echo base_url('add-note/editing') ?>" method="post">
                         <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Öğrenci :</label>
                          <div class="col-sm-10">
                            <?php         
                            $a = datalist('user',array('id' => $list['note_stu'] ));
                            foreach ($a as $a) {?>
                              <?= $a['user_name'];?> <?= $a['user_surname'];?> <?= $a['user_code'];?>
                          <?php }  
                            ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Quiz 1</label>
                          <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="inputName" placeholder="" name="id" value="<?= $list['id'];?>">
                            <input type="number" class="form-control" id="inputName" placeholder="" name="ex1" value="<?= $list['ex1'];?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Quiz 2</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="ex2" value="<?= $list['ex2'];?>">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">1.ci Notu</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="note1" value="<?= $list['note1'];?>">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">2.ci Notu</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail" placeholder="" name="note2" value="<?= $list['note2'];?>">
                          </div>
                        </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Final Ödev Notu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="" name="final" value="<?= $list['final_note'];?>">
                          </div>
                        </div>
                          
                        
                    
                      
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Notu Değiştir</button>
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

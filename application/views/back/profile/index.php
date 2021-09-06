<?php
    $panel_user = sessionus('kullan','Pinfo');
    $bras  = $panel_user['id'];
    $d = datalist('user',array('id' => $bras));
    foreach ($d as $d) {
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
            <h1>Öğrenci</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url($d['image']) ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $d['user_name'] ?> <?= $d['user_surname'] ?></h3>

                <p class="text-muted text-center">

                <?php
                $cd = datalist('department',array('id' => $d['user_ep']));
                foreach ($cd as $cd) {
                ?>
                <?= $cd['department_name'] ?>
               <?php  } ?>
              </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>GNO</b> <a class="float-right">

                   

                <?php
                $panel_user = sessionus('kullan','Pinfo');
                $bras  = $panel_user['id'];
                 $brass  = $panel_user['user_status'];
                 if ($brass == 3) {
                     $lestoplam = 0;
                $finalnottoplam = 0;
                   $tik = datalist('notes',array('note_stu' => $bras));
                foreach ($tik as $tik) { 
                       $mem = datalist('lessons',array('id' => $tik['note_lesson']));
                foreach ($mem as $mem) { $les = $mem['lesson_credit'];

                     $lestoplam +=  $mem['lesson_credit'];
                     $quiz1 = $tik['ex1'] * 5 / 100;
                     $quiz2 = $tik['ex2'] * 5 / 100;
                     $note1 = $tik['note1'] * 40 / 100;
                     $note2 = $tik['note2'] * 40 / 100;
                     $final_note = $tik['final_note'] * 10 / 100;
                     $final = $quiz1 + $quiz2 + $note1 + $note2 + $final_note;
                      if ($final >= 90) {
                           $notsay = 4;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 85) {
                           $notsay = 3.50;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 80) {
                           $notsay = 3;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 75) {
                           $notsay = 2.50;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 70) {
                           $notsay = 2;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 65) {
                           $notsay = 1.50;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 60) {
                           $notsay = 1;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final >= 50) {
                           $notsay = 0.50;
                           $nottoplam = $notsay * $les;
                       } 
                                            elseif ($final <= 49) {
                           $notsay = 0;
                           $nottoplam = $notsay * $les;
                       } 

                       $finalnottoplam += $nottoplam;
                       

                 } }
                      
                       echo shortis($finalnottoplam /  $lestoplam,4);
                 }
              

                ?>




                  </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#aboutme" data-toggle="tab">Hakkında</a></li>

                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="aboutme">
                    <div class="card-body">
                      <strong><i class="nav-icon far fa-envelope"></i> Mail</strong>

                      <p class="text-muted">
                      <?= $d['user_email'] ?>
                      </p>

                      <hr>

                      <strong><i class="fas fa-map-marker-alt mr-1"> </i> Ülke</strong>

                      <p class="text-muted">Türkiye</p>

                      <hr>

                      <strong><i class="fas fa-pencil-alt mr-1"></i> Hakkında </strong>

                      <p class="text-muted">
                       <?= $d['user_desc'] ?>
                      </p>

                    </div>
                  </div>


                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?= base_url('back/profile/Home/editing');?>" method="post" enctype="multipart/form-data">
                    
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="hidden" name="id" value="<?= $d['id'] ?>">
                          <input type="email" class="form-control" id="inputEmail" placeholder="" value="<?= $d['user_email'] ?>" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Hakkında</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="" name="desc"><?= $d['user_desc'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group ">
                      <label>Resim</label>
                      <div class="input-group">
                          <div class="fileupload fileupload-new col-md-4" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 400px; height: 400px;"><img width="250" src="<?= base_url($d['image'])?>"  alt="" /></div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 400px; line-height: 20px;"></div>
                              <div>
                                  <span class="btn btn-file btn-primary"><span class="fileupload-new">Resim Seçiniz</span><span class="fileupload-exists">Başka Bir Resim Seçiniz</span><input type="file" name="image"></span>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Temizle</a>
                              </div>
                          </div>
                      </div>
                  </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Kaydet</button>
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

<?php $this->load->view('back/back_module/public/page_fix/script.php'); ?>,
</body>
</html>
<?php } ?>
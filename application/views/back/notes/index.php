
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
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı Soyadı</th>
                    <th>Quiz 1</th>
                    <th>Quiz 2</th>
                    <th>Sınav 1</th>
                    <th>Sınav 2</th>
                    <th>Final Ödev</th>
                    <th>Ortalaması</th>
                    <th>Harf Notu</th>
                    <th>Durumu</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $panel_user = sessionus('kullan','Pinfo');
                    $brad = 0;
                    $bras  = $panel_user['id'];
                    $a = datalist('notes',array('note_stu' => $bras ));
                     foreach ($a as $a) {
                      ?>
                  <tr>
                    <?php  $f = datalist('lessons',array('id' => $a['note_lesson'] ));
                               foreach ($f as $f) {;?>
                    <td><?= $f['lesson_name'];?> </td>
                      <?Php } ?>
                    <td><?= $a['ex1'];?></td>
                    <td><?= $a['ex2'];?></td>
                    <td><?= $a['note1'];?></td>
                    <td><?= $a['note2'];?></td>
                    <td><?= $a['final_note'];?></td>
                     <?php 
                     $quiz1 = $a['ex1'] * 5 / 100;
                     $quiz2 = $a['ex2'] * 5 / 100;
                     $note1 = $a['note1'] * 40 / 100;
                     $note2 = $a['note2'] * 40 / 100;
                     $final_note = $a['final_note'] * 10 / 100;
                     $final = $quiz1 + $quiz2 + $note1 + $note2 + $final_note
                     ?>
                     <td><?=  $final ?></td>
                    <td>
                      <?php
                       
                       if ($final >= 90) {
                           echo "AA";
                       } 
                                            elseif ($final >= 85) {
                           echo "BA";
                       } 
                                            elseif ($final >= 80) {
                           echo "BB";
                       } 
                                            elseif ($final >= 75) {
                           echo "CB";
                       } 
                                            elseif ($final >= 70) {
                           echo "CC";
                       } 
                                            elseif ($final >= 65) {
                           echo "DC";
                       } 
                                            elseif ($final >= 60) {
                           echo "DD";
                       } 
                                            elseif ($final >= 50) {
                           echo "FD";
                       } 
                                            elseif ($final <= 49) {
                           echo "FF";
                       } 

                      ?>
                    </td>
                    <td>                    <?php
                     
                     if ($final >= 90) {
                         echo "ÜSTÜN BAŞARI";
                     } 
                                          elseif ($final >= 85) {
                         echo "PEKİYİ";
                     } 
                                          elseif ($final >= 80) {
                         echo "İYİ";
                     } 
                                          elseif ($final >= 75) {
                         echo "ORTA İYİ";
                     } 
                                          elseif ($final >= 70) {
                         echo "ORTA";
                     } 
                                          elseif ($final >= 65) {
                         echo "GEÇER ORTA";
                     } 
                                          elseif ($final >= 60) {
                         echo "SORUMLU GEÇER";
                     } 
                                          elseif ($final >= 50) {
                         echo "KALDI";
                     } 
                                          elseif ($final <= 49) {
                         echo "KALDI";
                     } 

                    ?></td>
                  </tr>

                 <?php } ?>
                  </tfoot>
                   <?php echo $this->session->flashdata('durum') ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

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
<script type="text/javascript" src="<?php echo base_url('')?>back/bootstrap-toggle.min.js"></script>

<script>
          $(document).ready(function () {
            $('.toogle_check').bootstrapToggle();
              $('.toogle_check').change(function(){
                 var status = $(this).prop('checked');
                 var id = $(this).attr('dataID');
                 var base_url = $(this).attr('dataURL');
                 $.post(base_url, {id: id, status: status}, function(response){});

              })
          })
</script>
<?php $this->load->view('back/back_module/public/page_fix/script.php'); ?>,
<script src="<?= base_url('');?>back/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('');?>back/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,"pageLength" : 5,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>
</html>

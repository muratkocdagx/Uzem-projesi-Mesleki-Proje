
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
      <a href="<?php echo base_url('department/insert') ?>"><button type="button" class="btn btn-success pull-right" name="button"><i class="fa fa-plus" style="margin-right: 5px;"></i>ekle</button></a><br><br>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Bölüm Adı</th>
                    <th>Bölüm Kodu</th>
                    <th>durumu</th>
                    <th>İşlemler</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($list as $list) {?>
                  <tr>
                    <td><?= $list['department_name'];?></td>
                    <td><?= $list['rank'];?></td>

                    <td>
                      
                      <input 
                    class="toogle_check"
                    data-on="aktif"
                    data-onstyle="success"
                    data-off="pasif"
                    data-offstyle="danger"
                    type="checkbox" 
                    dataID="<?php echo $list['id'];?>" 
                    dataURL="<?php echo base_url('back/department/Home/set') ?>"
                    <?php echo ($list['status'] == 1) ? "checked" : "";
                    ?>
                    >

                    </td>

                     
                    <td>
                      <a href="<?php echo base_url('department/edit/'.$list['id'].''); ?>"><button type="button" class="btn btn-info" name="button">Düzenle</button></a>
                  <a href="<?php echo base_url('department/delete/'.$list['id'].''); ?>"><button type="button" class="btn btn-danger" name="button">Sil</button></a>
                    </td>
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

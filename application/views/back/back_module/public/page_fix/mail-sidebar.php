        <div class="col-md-3">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Menü</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="mail-box.php" class="nav-link">
                    <i class="fas fa-inbox"></i> E-Postalar
                    <span class="badge bg-primary float-right"><?php  $panel_user = sessionus('kullan','Pinfo');
        $d  = $panel_user['id']; echo mail_read($d); ?></span>
                  </a>
                </li>   
                <li class="nav-item">
                  <a href="mail-gonderen.php" class="nav-link">
                    <i class="far fa-envelope"></i> Gönderilen
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mail-compose.php" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i> E-Posta Yaz
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
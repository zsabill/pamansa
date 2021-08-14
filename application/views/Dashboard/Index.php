<!-- Default box -->
<div class="row">
<?php if ($this->ion_auth->in_group(array(2)) && $pendaftaran !=null) : ?>
  <?php if ($pendaftaran->status_validasi_berkas=="Berkas Sedang Di Tinjau"){
    $hasil_kelulusan="Berkas Sedang Di Tinjau";
    $warna='warning';
  } elseif ($pendaftaran->status_validasi_berkas=="Berkas Diterima"){
    $hasil_kelulusan="Anda Dinyatakan LULUS";
    $warna='success';
  } else {
    $hasil_kelulusan="Anda Dinyatakan TIDAK LULUS";
    $warna='danger';
  }
     ?>
  <div class="alert alert-<?php echo $warna; ?>" role="alert">
    <h3>PENGUMUMAN</h3>
  Hasil Kelulusan : <?= $hasil_kelulusan;?>
</div>
  <?php else:?>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah User</span>
        <span class="info-box-number">10</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Total User
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="far fa-address-card"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Staff TU</span>
        <span class="info-box-number">1</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Total Staff TU
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Calon Siswa</span>
        <span class="info-box-number">5</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Total Calon Siswa
        </span>
      </div>
      
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  </div>
  <?php endif ?>
  <!-- /.col -->
  <div class="box">
     
      <div class="box-body">
        <h1><center>SELAMAT DATANG</center></h1>
        <h3><center>Sistem Informasi Pendaftaran Murid Baru</center></h3>
        <h3><center>MAN 1 ACEH BARAT</center></h3>
      </div>
  </div>  
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Calon Siswa Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <table class="table">
<?php
if ($status_validasi_berkas=='Berkas Sedang Di Tinjau') {
	$x='alert alert-warning';
} elseif($status_validasi_berkas=='Berkas Ditolak') {
	$x='alert alert-danger';
} else {
	$x='alert alert-success';
}
?>
		<div class="<?php echo $x;?>">
    Status Pendaftaran <strong><?= $status_validasi_berkas; ?></strong>
  </div>
	    
	    <tr><td>Nama Siswa</td><td><?php echo $nama_siswa; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Alamat Lengkap</td><td><?php echo $alamat_lengkap; ?></td></tr>
	    <tr><td>Kode Pos</td><td><?php echo $kode_pos; ?></td></tr>
	    <tr><td>Asal Sekolah</td><td><?php echo $asal_sekolah; ?></td></tr>
	    <tr><td>Alamat Sekolah</td><td><?php echo $alamat_sekolah; ?></td></tr>
	    <tr><td>Tahun Lulus</td><td><?php echo $tahun_lulus; ?></td></tr>
	    <tr><td>No Ijazah</td><td><?php echo $no_ijazah; ?></td></tr>
	    <tr><td>Nisn</td><td><?php echo $nisn; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Nilai Unmatematika</td><td><?php echo $nilai_unmatematika; ?></td></tr>
	    <tr><td>Nilai Unbinggris</td><td><?php echo $nilai_unbinggris; ?></td></tr>
	    <tr><td>Nilai Unbindonesia</td><td><?php echo $nilai_unbindonesia; ?></td></tr>
		<tr><td>Bukti Pembayaran</td><td><a href="<?php echo base_url('/assets/berkas/').$bukti_pembayaran; ?>"><?php echo $bukti_pembayaran; ?></a></td></tr>
		<tr><td>Status Pembayaran</td><td><?php echo $status_pembayaran; ?></td></tr>
	    <tr><td>Upload Kk</td><td><a href="<?php echo base_url('/assets/berkas/').$upload_kk; ?>"><?php echo $upload_kk; ?></a></td></tr>
		<tr><td>Status Berkas</td><td><?php echo $status_validasi_berkas; ?></td></tr>
	    <tr><td>Upload Akte Kelahiran</td><td><a href="<?php echo base_url('/assets/berkas/').$upload_aktekelahiran; ?>"><?php echo $upload_aktekelahiran; ?></a></td></tr>
		<tr><td>Status Berkas</td><td><?php echo $status_validasi_berkas; ?></td></tr>
	    <tr><td>Upload SKL</td><td><a href="<?php echo base_url('/assets/berkas/').$upload_skl; ?>"><?php echo $upload_skl; ?></a></td></tr>
		<tr><td>Status Berkas</td><td><?php echo $status_validasi_berkas; ?></td></tr>
	    
		<?PHP if($this->ion_auth->in_group(33)):?>
			<tr><td colspan="2">
			<div class="row">
				<div class="col-md-6"><a class='btn btn-success' href="<?php echo base_url('pendaftaran/terima/'. $id_siswabaru.'/'.$id_user); ?>">Terima Berkas</a></div>
				<div class="col-md-6"><a class='btn btn-danger' href="<?php echo base_url('pendaftaran/tolak/'. $id_siswabaru. '/'.$id_user); ?>">Tolak Berkas</a></div>
			</div>
			</td></tr>
			
			
			
			<?php endif;?>
			<a href="<?php echo base_url('calon_siswa/edit'); ?>">edit</a>
	</table>
            </div>
        </div>
    </div>
</div>
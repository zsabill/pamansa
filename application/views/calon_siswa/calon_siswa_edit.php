<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Calon_siswa</h3>
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
            <?php echo form_open_multipart($action); ?>
	    
	    <div class="form-group">
            <label for="varchar">Nama Siswa <?php echo form_error('nama_siswa') ?></label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bulan <?php echo form_error('bulan') ?></label>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <select name="jenis_kelamin" class='form-control'>
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
            </select>
            
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Lengkap <?php echo form_error('alamat_lengkap') ?></label>
            <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" value="<?php echo $alamat_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode Pos <?php echo form_error('kode_pos') ?></label>
            <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal Sekolah <?php echo form_error('asal_sekolah') ?></label>
            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" value="<?php echo $asal_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Sekolah <?php echo form_error('alamat_sekolah') ?></label>
            <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah" value="<?php echo $alamat_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun Lulus <?php echo form_error('tahun_lulus') ?></label>
            <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Tahun Lulus" value="<?php echo $tahun_lulus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">No Ijazah <?php echo form_error('no_ijazah') ?></label>
            <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" placeholder="No Ijazah" value="<?php echo $no_ijazah; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nisn <?php echo form_error('nisn') ?></label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nisn" value="<?php echo $nisn; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Unmatematika <?php echo form_error('nilai_unmatematika') ?></label>
            <input type="text" class="form-control" name="nilai_unmatematika" id="nilai_unmatematika" placeholder="Nilai Unmatematika" value="<?php echo $nilai_unmatematika; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Unbinggris <?php echo form_error('nilai_unbinggris') ?></label>
            <input type="text" class="form-control" name="nilai_unbinggris" id="nilai_unbinggris" placeholder="Nilai Unbinggris" value="<?php echo $nilai_unbinggris; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Unbindonesia <?php echo form_error('nilai_unbindonesia') ?></label>
            <input type="text" class="form-control" name="nilai_unbindonesia" id="nilai_unbindonesia" placeholder="Nilai Unbindonesia" value="<?php echo $nilai_unbindonesia; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upload Kk <?php echo form_error('upload_kk') ?></label>
            <input type="file" class="form-control" name="upload_kk" id="upload_kk" placeholder="Upload Kk" value="<?php echo $upload_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upload Aktekelahiran <?php echo form_error('upload_aktekelahiran') ?></label>
            <input type="file" class="form-control" name="upload_aktekelahiran" id="upload_aktekelahiran" placeholder="Upload Aktekelahiran" value="<?php echo $upload_aktekelahiran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upload Skl <?php echo form_error('upload_skl') ?></label>
            <input type="file" class="form-control" name="upload_skl" id="upload_skl" placeholder="Upload Skl" value="<?php echo $upload_skl; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Bukti Pembayaran <?php echo form_error('bukti_pembayaran') ?></label>
            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="bukri_pembayaran" value="<?php echo $bukti_pembayaran; ?>"/>
        </div>
	    <input type="hidden" name="id_siswabaru" value="<?php echo $id_siswabaru; ?>" /> 
	    <button type="submit" class="btn btn-primary">simpan</button> 
	    <a href="<?php echo site_url('calon_siswa') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
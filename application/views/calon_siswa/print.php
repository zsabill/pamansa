<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Calon Siswa</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Nama Siswa</th>
		<th>Tempat Lahir</th>
		<th>Tanggal</th>
		<th>Bulan</th>
		<th>Tahun</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Alamat Lengkap</th>
		<th>Kode Pos</th>
		<th>Asal Sekolah</th>
		<th>Alamat Sekolah</th>
		<th>Tahun Lulus</th>
		<th>No Ijazah</th>
		<th>Nisn</th>
		<th>No Telp</th>
		<th>Email</th>
		<th>Nilai Unmatematika</th>
		<th>Nilai Unbinggris</th>
		<th>Nilai Unbindonesia</th>
		<th>Upload Kk</th>
		<th>Upload Aktekelahiran</th>
		<th>Upload Skl</th>
		
            </tr><?php
            foreach ($calon_siswa_data as $calon_siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $calon_siswa->id_user ?></td>
		      <td><?php echo $calon_siswa->nama_siswa ?></td>
		      <td><?php echo $calon_siswa->tempat_lahir ?></td>
		      <td><?php echo $calon_siswa->tanggal ?></td>
		      <td><?php echo $calon_siswa->bulan ?></td>
		      <td><?php echo $calon_siswa->tahun ?></td>
		      <td><?php echo $calon_siswa->jenis_kelamin ?></td>
		      <td><?php echo $calon_siswa->agama ?></td>
		      <td><?php echo $calon_siswa->alamat_lengkap ?></td>
		      <td><?php echo $calon_siswa->kode_pos ?></td>
		      <td><?php echo $calon_siswa->asal_sekolah ?></td>
		      <td><?php echo $calon_siswa->alamat_sekolah ?></td>
		      <td><?php echo $calon_siswa->tahun_lulus ?></td>
		      <td><?php echo $calon_siswa->no_ijazah ?></td>
		      <td><?php echo $calon_siswa->nisn ?></td>
		      <td><?php echo $calon_siswa->no_telp ?></td>
		      <td><?php echo $calon_siswa->email ?></td>
		      <td><?php echo $calon_siswa->nilai_unmatematika ?></td>
		      <td><?php echo $calon_siswa->nilai_unbinggris ?></td>
		      <td><?php echo $calon_siswa->nilai_unbindonesia ?></td>
		      <td><?php echo $calon_siswa->upload_kk ?></td>
		      <td><?php echo $calon_siswa->upload_aktekelahiran ?></td>
		      <td><?php echo $calon_siswa->upload_skl ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>
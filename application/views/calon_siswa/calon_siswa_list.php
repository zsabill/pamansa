<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Calon_siswa</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
              <i class="fa fa-refresh"></i></button>
          </div>
      </div>

      <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('calon_siswa/create'),'<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                <?php echo anchor(site_url('calon_siswa/print'),'<i class="fa fa-plus"></i> print', 'class="btn bg-purple"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right"><form action="<?php echo site_url('calon_siswa/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('calon_siswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <form method="post" action="<?= site_url('calon_siswa/deletebulk');?>" id="formbulk">
        <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
            <tr>
                
                <th>No</th>
		
		<th>Nama Siswa</th>
		<th>Tempat Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Alamat Lengkap</th>
		<th>Asal Sekolah</th>
		<th>Tahun Lulus</th>
		<th>No Ijazah</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($calon_siswa_data as $calon_siswa)
            {
                ?>
                <tr>
                
		
                
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $calon_siswa->nama_siswa ?></td>
			<td><?php echo $calon_siswa->tempat_lahir ?></td>
			<td><?php echo $calon_siswa->jenis_kelamin ?></td>
			<td><?php echo $calon_siswa->agama ?></td>
			<td><?php echo $calon_siswa->alamat_lengkap ?></td>
			<td><?php echo $calon_siswa->asal_sekolah ?></td>
			<td><?php echo $calon_siswa->tahun_lulus ?></td>
			<td><?php echo $calon_siswa->no_ijazah ?></td>
			<td><?php echo $calon_siswa->status_validasi_berkas ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('calon_siswa/read/'.$calon_siswa->id_user),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"'); 
				
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
         <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
                 <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-6">
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function () {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function () {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function () {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function () {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function (closeEvent) {

                $.ajax({
                    url: "calon_siswa/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function (response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
     
</script>
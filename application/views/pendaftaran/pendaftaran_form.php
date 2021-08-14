<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pendaftaran</h3>
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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="enum">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Siswabaru <?php echo form_error('id_siswabaru') ?></label>
            <input type="text" class="form-control" name="id_siswabaru" id="id_siswabaru" placeholder="Id Siswabaru" value="<?php echo $id_siswabaru; ?>" />
        </div>
	    <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
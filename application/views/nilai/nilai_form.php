<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Nilai</h3>
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
            <label for="int">Id Calonsiswa <?php echo form_error('id_calonsiswa') ?></label>
            <input type="text" class="form-control" name="id_calonsiswa" id="id_calonsiswa" placeholder="Id Calonsiswa" value="<?php echo $id_calonsiswa; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>
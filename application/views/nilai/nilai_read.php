<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nilai Detail</h3>
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
	    <tr><td>Nilai Unmatematika</td><td><?php echo $nilai_unmatematika; ?></td></tr>
	    <tr><td>Nilai Unbinggris</td><td><?php echo $nilai_unbinggris; ?></td></tr>
	    <tr><td>Nilai Unbindonesia</td><td><?php echo $nilai_unbindonesia; ?></td></tr>
	    <tr><td>Id Calonsiswa</td><td><?php echo $id_calonsiswa; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('nilai') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>
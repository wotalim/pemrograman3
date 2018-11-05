<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-align-left"></em>
				</a></li>
				<li class="active">Lembur/Tunjangan</li>
			</ol>
		</div><!--/.row-->
        <br>
        <div class="row">
        <div class="col-sm-12">
				<div class="panel panel-info">
                 
					<div class="panel-heading clickable pan-bar">Edit Data Tunjangan
                        <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
                    </div>
<?php foreach ($query->result() as $row) { ?>
					<div class="panel-body " align="center">
                    <form class="form-inline" action="<?php echo base_url('index.php/lembur_tunjangan/update');?>" method="POST">
                        <input type="hidden" name="id_jenis_tunjangan" value="<?php echo $row->id_jenis_tunjangan; ?>">
                        <div class="form-group">
                            <label for="email">Nama Tunjangan&nbsp;:</label>
                            <input type="text" class="form-control" id="email" name="nama_jenis_tunjangan" value="<?php echo $row->nama_jenis_tunjangan; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Besar Tunjangan&nbsp;:</label>
                            <input type="number" class="form-control" id="pwd" name="besar_tunjangan" value="<?php echo $row->besar_tunjangan;?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form> 
				</div>
			</div>
		</div>
<?php } ?>
</div>
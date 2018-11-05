<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-align-left"></em>
        </a></li>
        <li>Data Jabatan</li>
        <li class="active">Edit</li>
    </ol>
</div><!--/.row-->
<br>
<?php foreach ($query->result() as $row) { ?>
<div class="row">
			<div  class="col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
                        <h4 style="color : white;">Edit Data Jabatan
                        <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span></h4>
                    </div>
					<div class="panel-body">
                    <form class="form-inline" action="<?php echo base_url('index.php/data_jabatan/update');?>" method="POST">
                    <div class="col-lg-1 col-md-12 col-sm-12"></div>
                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <input type="hidden" name="id_jabatan" value="<?php echo $row->id_jabatan;?>">
                        <div class="form-group">
                            <label for="email">Nama Jabatan&nbsp;:</label>
                            <input type="text" class="form-control" id="email" name="nama_jabatan" value="<?php echo $row->nama_jabatan?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Gaji Pokok&nbsp;:</label>
                            <input type="number" class="form-control" id="pwd" name="gapok" value="<?php echo $row->gapok;?>">
                            <input type="hidden" name="tgl_ganti" value="<?php echo date("Y/m/d");?>">
                            <br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Edit</button>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    </form> 
				</div>
			</div>
		</div>
<?php } ?>
</div>
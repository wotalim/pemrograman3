<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-black-tie"></em>
				</a></li>
				<li class="active">Data Jabatan</li>
			</ol>
		</div><!--/.row-->
        <br>
        <div class="row">
			<div  class="col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
                        Tambah Jabatan
                        <span class="pull-right clickable panel-toggle "><em class="fa fa-toggle-up"></em></span>
                    </div>
					<div class="panel-body">
                    <form class="form-inline" action="<?php echo base_url('index.php/data_jabatan/simpan');?>" method="POST">
                    <div class="col-lg-1 col-md-12 col-sm-12"></div>
                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <input type="hidden" name="id_jabatan">
                        <div class="form-group">
                            <label for="jabatan">Nama Jabatan&nbsp;:</label>
                            <input type="text" class="form-control" id="email" name="nama_jabatan">
                        </div>
                        <div class="form-group">
                            <label for="gapok">Gaji Pokok&nbsp;:</label>
                            <input type="number" class="form-control" id="gapok" name="gapok">
                            <input type="hidden" name="tgl_ganti" value="<?php echo date("Y/m/d");?>">
                            <br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    </form> 
				</div>
			</div>
		</div>
        
        <div class="col-sm-12 table-responsive">
        <div class="panel panel-info">
        <div class="panel-body">
        <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Nomor</th>
                <th class="text-center">Nama Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tgl_Ganti</th>
                <th class="text-center" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $nomer = 1;
        foreach($query->result() as $row){?>
            <tr>
                <td class="text-center"><?php echo $nomer; ?></td>
                <td><?php echo $row->nama_jabatan ; ?></td>
                <td class="text-center">Rp. <?php echo number_format($row->gapok,2,",",".") ; ?></td>
                <td class="text-center"><?php echo $row->tgl_ganti; ?></td>
                <td class="text-center" ><a href="<?php echo site_url('data_jabatan/edit/').$row->id_jabatan ;?>" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                <a href="<?php echo site_url('data_jabatan/hapus/').$row->id_jabatan;?>" onClick="return confirm('Hapus Data?')" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
        <?php $nomer++;
        }
        ?>  
        </tbody>
        </table>
        </div>    
	    </div>
    </div>
</div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
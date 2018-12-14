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
					<div class="panel-heading">Tunjangan
                        <span class="pull-right clickable panel-toggle "><em class="fa fa-toggle-up"></em></span>
                    </div>
					<div class="panel-body" align="center">
                    <form class="form-inline" action="<?php echo base_url('index.php/lembur_tunjangan/simpan');?>" method="POST">
                        <input type="hidden" name="id_jenis_tunjangan">
                        <div class="form-group">
                            <label for="email">Nama Tunjangan&nbsp;:</label>
                            <input type="text" class="form-control" id="email" name="nama_jenis_tunjangan">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Besar Tunjangan&nbsp;:</label>
                            <input type="text" class="form-control" id="pwd" name="besar_tunjangan">
                            <input type="hidden" name="tgl_ganti" value="<?php date("Y/m/d");?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </form> 
				</div>
			</div>
		</div>
        <div class="col-sm-12 table-responsive">
        <div class="panel panel-info">
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nomor</th>
      <th scope="col">Nama Tunjangan</th>
      <th scope="col">Besar Tunjangan</th>
      <th class="text-center" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $nomer = 1;
        foreach($query->result() as $row){?>
            <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $row->nama_jenis_tunjangan ; ?></td>
                <td>Rp. <?php echo number_format($row->besar_tunjangan,2,",",".") ; ?></td>
                <td class="text-center"><a href="<?php echo site_url('lembur_tunjangan/edit/').$row->id_jenis_tunjangan ;?>" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                <a href="<?php echo site_url('lembur_tunjangan/hapus/').$row->id_jenis_tunjangan;?>" onClick="return confirm('Hapus Data?')" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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
</div>


<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>

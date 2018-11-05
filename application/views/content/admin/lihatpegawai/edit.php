<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user"></em>
				</a></li>
				<li>Lihat Pegawai</li>
                <li class="active">Edit Pegawai</li>
			</ol>
		</div><!--/.row--><br><br><!--/.row-->
        <!--Content Brow--> 
        
        <form action="<?php echo site_url('lihat_pegawai/update'); ?>" class="" method="POST">
        <div class="panel panel-info">
        <div class="panel-heading">
            <h4 style="color :white;">Edit Data Pegawai</h4>
        </div><br><br>
        <?php foreach ($query->result() as $row) { ?>
        <div class="container-fluid">
        <div class="row col-sm-6 col-md-6">
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $row->nip ?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $row->nama_depan ?>">
            </div>
            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $row->nama_belakang ?>">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <div id="jk">
                <?php if($row->jk === "Laki-Laki"):?> 
                    <label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki" checked="checked">Laki-Laki</label>
                    <label class="radio-inline"><input type="radio" name="jk" value="Perempuan">Perempuan</label>
                <?php elseif($row->jk ==="Perempuan"):?>
                    <label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki">Laki-Laki</label>    
                    <label class="radio-inline"><input type="radio" name="jk" value="Perempuan" checked="checked">Perempuan</label>
                <?php else:?>
                    <label class="radio-inline"><input type="radio" name="jk" value="Laki-Laki">Laki-Laki</label>    
                    <label class="radio-inline"><input type="radio" name="jk" value="Perempuan">Perempuan</label>
                <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir ?>">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <div class="input-group date" data-date-format="yyyy-mm-dd">
                    <input class="form-control" type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row->tgl_lahir ?>" readonly="readonly">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="row col-sm-1 col-md-1"></div>
        <div class="row col-sm-6 col-md-6">
        <div class="form-group">
                <label for="alamat_karyawan">Alamat</label>
                <textarea class="form-control" rows="3" id="alamat_karyawan" name="alamat_karyawan"><?php echo $row->alamat_karyawan ?></textarea>
            </div>
            <div class="form-group">
                <label for="telp">No. Telepon</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $row->telp ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email ?>">
            </div>
            
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" id="jabatan" name="id_jabatan">
                    <option value="<?php echo $row->id_jabatan?>">.::<?php echo $row->nama_jabatan;?>::.</option>
        <?php }?>
                    <?php foreach($query_jabatan->result() as $row1){?>
                    <option value="<?php echo $row1->id_jabatan?>"><?php echo $row1->id_jabatan.". ".$row1->nama_jabatan?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="row col-sm-12">
        <div class="form-group ">
            <div><br><br>
                <input value="Edit" type="submit" class="btn btn-primary btn-block form-control">
            </div>
        </div>
        </div>
        </div>
        </form>  


</div>


<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>
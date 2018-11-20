<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div>
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-calendar"></em>
				</a></li>
				<li>Absensi</li>
                <li>Sudah Hadir</li>
                <li class="active">Form Informasi Absen Pulang</li>                
            </ol>        
        </div>
    </div>
    <br>
    <!--Isi Woy-->
    <div class="panel panel-warning">
    <div class="panel-heading">
        <span class="pull-left">
            <a class="btn btn-info" href="<?php echo site_url("absensi");?>" title="Belum Hadir"><i class="fa fa-arrow-left"></i></a>
        </span>
        <h4 style="color :white;">&nbsp;&nbsp;Form Informasi Absen Pulang</h4>
    </div><br><br>
    <div class="container-fluid">
    <div class="col-sm-1 col-md-1 col-lg-2"></div>
    <?php foreach ($queryInformasi->result() as $row) { ?>
    <div class="row col-sm-10 col-md-9 col-lg-8" style="background-color:#ffffff">
        <br>
        <div align="center"><img class="foto img-responsive" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto;?>">
            <br>
            <b><?php echo $row->nama_depan." ".$row->nama_belakang; ?></b><br><br><br>    
        </div>
        <?php
        $datang = new DateTime($row->datang);
        $pulang = new DateTime($row->pulang);
        $sesiKerja = $datang->diff($pulang);
        ?>
        <div class="row" align="center">
            <h3>ID Absensi : <b><?php echo $row->id_absensi?></b></h3><br>
            <div class="col-sm-1 col-md-4 col-lg-4"></div>
            <div class="col-sm-10 col-md-4 col-lg-4">
                <?php echo "Tanggal Absen: <b>".$row->tgl_absensi."</b>"?><br><br>
                <?php echo "<b>".$row->kehadiran."</b> Absen Pada Jam: <b>".$row->datang."</b>";?><br><br>
                <?php echo "Telat Selama <b>".$row->telat."</b> Menit"?><br><br>
                <?php echo "<b>Pulang</b> Pada Jam:<b>".$row->pulang?></b><br><br>
                <?php echo "Sesi Kerja: <b>".$sesiKerja->h."</b> Jam Dan <b>".$sesiKerja->i."</b> Menit"?>
            </div>
            
            <div class="col-sm-1 col-md-4 col-lg-4"></div>
        </div>
        <div><br><br>
                <button type="submit" onClick="location.href='<?php echo site_url('absensi/pulang')?>'" class="btn btn-warning btn-block form-control">Kembali</button>
            </div>
        <br>
        <br>
        <?php } ?>
    <div class="col-sm-1 col-md-1 col-lg-2"></div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>


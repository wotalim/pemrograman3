<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div>
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-calendar"></em>
				</a></li>
				<li>Absensi</li>
                <li>Sudah Hadir</li>
                <li class="active">Form Absen Pulang</li>                
            </ol>        
        </div>
    </div>
    <br>
    <!--Isi Woy-->
    <form action="<?php echo site_url('absensi/submit_pulang'); ?>" class="" method="POST">
        <div class="panel panel-success">
        <div class="panel-heading">
            <span class="pull-left">
                <a class="btn btn-info" href="<?php echo site_url("absensi");?>" title="Belum Hadir"><i class="fa fa-arrow-left"></i></a>
            </span>
            <h4 style="color :white;">&nbsp;&nbsp;Form Absen Pulang</h4>
        </div><br><br>
        <div class="container-fluid">
        <div class="col-sm-1 col-md-1 col-lg-2"></div>
        <?php foreach ($queryAbsenpulang->result() as $row) { ?>
        <div class="row col-sm-10 col-md-9 col-lg-8" style="background-color:#ffffff">
            <br>
            <div align="center"><img class="foto img-responsive" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto;?>">
                <br>
                <b><?php echo $row->nama_depan." ".$row->nama_belakang; ?></b><br><br><br>    
            </div>
            <table class="table table-user-information">
                <thead>
                    <tr>
                        <th class="text-center">Status Kehadiran</th>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <?php echo "<b>".$row->kehadiran."</b> Absen Pada Jam: <b>".$row->datang."</b>";?><br>
                <?php echo "Telat Selama <b>".$row->telat."</b> Menit"?>
            </div>
            <br>
            <table class="table table-user-information">
                <thead>
                    <tr>
                        <th class="text-center">Jam Pulang</th>
                    </tr>
                </thead>
            </table>
            <div class="form-group" align="center">
                <div class="input-group clockpicker">
                 <input class="form-control" type="text" id="pulang" name="pulang" value="16:00">
                 <span class="input-group-addon" id="jam"><i class="fa fa-clock-o"></i></span>
                </div>
            </div>
            <div><br><br>
                <input type="hidden" name="id_absensi" value="<?php echo $row->id_absensi;?>">
                <button type="submit" class="btn btn-success btn-block form-control">Submit</button>
            </div>
            <br>
            <br>
        <?php } ?>
        <div class="col-sm-1 col-md-1 col-lg-2"></div>
    </form>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/clockpicker/dist/bootstrap-clockpicker.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker({
        autoclose : true
    });
</script>

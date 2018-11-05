<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div>
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-calendar"></em>
				</a></li>
				<li>Absensi</li>
                <li>Belum Hadir</li>
                <li class="active">Form Absen Kehadiran</li>                
            </ol>        
        </div>
    </div>
    <br>
    <!--Isi Woy-->
    <form action="<?php echo site_url('absensi/submit_kehadiran'); ?>" class="" method="POST">
        <div class="panel panel-danger">
        <div class="panel-heading">
            <span class="pull-left">
                <a class="btn btn-info" href="<?php echo site_url("absensi/belum_hadir");?>" title="Belum Hadir"><i class="fa fa-arrow-left"></i></a>
            </span>
            <h4 style="color :white;">&nbsp;&nbsp;Form Absen Kehadiran</h4>
        </div><br><br>
        <div class="container-fluid">
        <div class="col-sm-1 col-md-1 col-lg-2"></div>
        <?php foreach ($queryAbsenkehadiran->result() as $row) { ?>
        <div class="row col-sm-10 col-md-9 col-lg-8" style="background-color:#ffffff">
            <br>
            <div align="center"><img class="foto img-responsive" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto;?>"></div>
            <br>
            <table class="table table-user-information">
                <tr>
                    <td>Nama</td>
                    <td>: <b><?php echo $row->nama_depan." ".$row->nama_belakang; ?></b></td>
                </tr>
                <tr>
                    <td>Terakhir Absen</td>
                    <td>: <b><?php echo $row->absen_terakhir;?></b></td>
                </tr>
            </table>
            <table class="table table-user-information">
                <thead>
                    <tr>
                        <th class="text-center">Status Kehadiran</th>
                    </tr>
                </thead>
            </table>
            <div align="center" id="kehadiran">
                <label class="radio-inline"><input type="radio" name="kehadiran" id="hadir" value="Hadir">Hadir</label>
                <label class="radio-inline"><input type="radio" name="kehadiran" id="izin" value="Izin">Izin</label>
            </div>
            <br>
            <table class="table table-user-information">
                <thead>
                    <tr>
                        <th class="text-center">Jam Absen</th>
                    </tr>
                </thead>
            </table>
            <div class="form-group" align="center">
                <div class="input-group clockpicker">
                 <input class="form-control" type="text" id="datang" name="datang" value="08:00" style="pointer-events: none;">
                 <span class="input-group-addon" id="jam" style="pointer-events: none;"><i class="fa fa-clock-o"></i></span>
                </div>
            </div>
            <br>
            <table class="table table-user-information">
                <thead>
                    <tr>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
            </table>
            <div>
                <textarea id="keterangan" name="keterangan" style="pointer-events: none; width: 100%;" ></textarea>
            </div>
            <div><br><br>
            <input type="hidden" name="nip" value="<?php echo $row->nip;?>">
            
            <input type="hidden" name="tgl_absensi" value="<?php echo date('Y-m-d');?>">
            <input type="hidden" name="id_absensi">
            <input type="hidden" name="absen_terakhir" value="<?php echo date('Y-m-d');?>">
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
<script>
$(function(){
    $("#hadir, #izin").change(function(){
        $("#datang").val("").attr("style",true);
        $("#jam").val("").attr("style",true);
        $("#keterangan").val("").attr("style",true)
        if($("#hadir").is(":checked")){
            $("#jam").removeAttr("style");
            $("#datang").removeAttr("style");
            $("#keterangan").val("Hadir").attr('style', 'pointer-events: none; width: 100%;');
            document.getElementById("datang").value = "08:00";
            $("#datang").focus(); 
        }
        else if($("#izin").is(":checked")){
            $("#jam").attr('style', 'pointer-events: none');
            $("#datang").attr('style', 'pointer-events: none');
            $("#keterangan").removeAttr("style");
            $("#keterangan").val("").attr('style', 'width: 100%;');
            $("#keterangan").focus();   
        }
    });
});
</script>
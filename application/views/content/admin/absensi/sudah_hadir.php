<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div>
    <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-calendar"></em>
				</a></li>
				<li class="active">Absensi</li>
			</ol>
    </div>
    <br>
    <div class="panel panel-default"  style="background: #ffffff;">
    <div class="panel-body tabs">
      <ul class="nav nav-pills">
        <li class="active"><a href="<?php echo site_url('absensi')?>"><em class='fa fa-check'>&nbsp;</em>Sudah Hadir</a></li>
        <li><a href="<?php echo site_url('absensi/pulang')?>"><em class='fa fa-sign-out'>&nbsp;</em>Pulang</a></li>
        <li><a href="#"><em class='fa fa-times'>&nbsp;</em>Izin</a></li>
        <li class="pull-right"><a href="<?php echo site_url('absensi/belum_hadir')?>"><em class='fa fa-exclamation-triangle'>&nbsp;</em>Belum Hadir</a></li>
      </ul>
      <hr class="style1">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="sudah">
        <div class="row">              
        <?php 
        $tanggal = date("Y-m-d");
        foreach($querySudahHadir->result() as $row){
          if ( $tanggal == $row->tgl_absensi && $row->pulang == "00:00:00" && $row->kehadiran == "Hadir"){ ?>
            <div class="col-lg-3 col-md-3 col-sm-6" style="padding: 15px 15px 15px 15px;">
              <div class="card">
                <div class="card-header bg-success text-white">
                  <input type="hidden" id="nip" name="nip" value="<?php echo $row->nip; ?>">
                  <?php echo $row->nama_depan." ".$row->nama_belakang ?>
                  <span class="pull-right">
                    <a class="btn btn-xs btn-info" href="<?php echo site_url("absensi/form_absen_pulang/").$row->id_absensi;?>" title="Klik Untuk Absensi Pulang"><i class="fa fa-check"></i></a>
                  </span>
                </div>
                <div align="center" class="card-img"><img class="foto img-responsive" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto;?>"></div> 
                <div class="card-footer">
                  Keterangan : <b><?php echo $row->keterangan; ?></b>
                </div>
              </div>
            </div> 
            <?php 
            }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div><!--/.panel-->
</div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
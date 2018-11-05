<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div>
    <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-calendar"></em>
				</a></li>
				<li>Absensi</li>
        <li class="active">Belum Hadir</li>
      </ol>     
    </div>
  </div>
  <br>
  <div class="panel panel-default">
					<div class="panel-body tabs" style="background: #ffffff;">
						<ul class="nav nav-pills">
							<li><a href="<?php echo site_url('absensi')?>" ><em class='fa fa-check'>&nbsp;</em>Sudah Hadir</a></li>
							<li><a href="<?php echo site_url('absensi/pulang')?>"><em class='fa fa-sign-out'>&nbsp;</em>Pulang</a></li>
              <li><a href="#"><em class='fa fa-times'>&nbsp;</em>Izin</a></li>
							<li class="active pull-right"><a href="<?php echo site_url('absensi/belum_hadir')?>"><em class='fa fa-exclamation-triangle'>&nbsp;</em>Belum Hadir</a></li>
            </ul>
            <hr class="style1">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="belum">
              <div class="row">
              <?php 
              $tanggal = date("Y-m-d");
              foreach($queryPegawai->result() as $row){
                if ( $tanggal != $row->absen_terakhir ){ ?>
                  <div class="col-lg-3 col-md-3 col-sm-6" style="padding: 15px 15px 15px 15px;">
                    <div class="card">
                      <div class="card-header bg-danger text-white">
                        <input type="hidden" id="nip" name="nip" value="<?php echo $row->nip; ?>">
                        <?php echo $row->nama_depan." ".$row->nama_belakang ?>
                        <span class="pull-right">
                          <a class="btn btn-xs btn-info" href="<?php echo site_url("absensi/form_absen_kehadiran/").$row->nip;?>" title="Klik Untuk Absensi Kehadiran"><i class="fa fa-check"></i></a>
                        </span>
                      </div>
                      <div align="center" class="card-img"><img class="foto img-responsive" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto;?>"></div> 
                      <div class="card-footer">
                        Terakhir Absen : <?php echo $row->absen_terakhir; ?>
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

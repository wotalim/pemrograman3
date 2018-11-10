<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle-o"></em>
				</a></li>
        <li>
        <a href="<?php echo site_url('lihat_pegawai/')?>">&nbsp;Lihat Pegawai</a> 
          </li>
				<li class="active">

          Profil

        </li>
			</ol>
		</div><!--/.row-->
    <br>
    <div>
          
          <?php foreach ($query->result() as $row) { ?>

          <div class="panel panel-info">
            <div class="panel-heading pan-bar">
              <div class="panel-title"><?php echo $row->nama_depan?>&nbsp;<?php echo $row->nama_belakang?></div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $row->foto?>" class="img-kotak img-rounded img-responsive"> </div>

                <?php }?>
                
          <div class="col-md-9">
                
                   <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td><em class='fa fa-user-circle-o'>&nbsp;</em>Jabatan:</td>
                          <td>: <?php echo $row->id_jabatan?></td>
                        </tr>
                      
                        <tr>
                          <td><em class='fa fa-calendar'>&nbsp;</em>Tanggal Lahir</td>
                          <td>: <?php echo $row->tgl_lahir?></td>
                        </tr>
                          <td><em class='fa fa-paw'>&nbsp;</em>Jenis Kelamin</td>
                          <td>: <?php echo $row->jk?></td>
                        </tr>
                          <tr>
                          <td><em class='fa fa-address-book'>&nbsp;</em>Alamat</td>
                          <td>: <?php echo $row->alamat_karyawan?></td>
                        </tr>
                        <tr>
                          <td><em class='fa fa-newspaper-o'>&nbsp;</em>Email</td>
                          <td>: <?php echo $row->email?></a></td>
                        </tr>
                          <td><em class='fa fa-user-circle-o'>&nbsp;</em>Nomor Lelepon</td>
                          <td>: <?php echo $row->telp?></a></td>   
                        </tr>
                     
                    </tbody>
                  </table>



        <div class="col-sm-3 main">
          <div class="form-group">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target=".export_gaji_modal"> <i class="glyphicon glyphicon-download-alt"></i>&nbsp;Export Gaji</button>
        </div>
      </div>

        <div class="col-sm-3 main">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target=".export_absensi_modal"> <i class="glyphicon glyphicon-download-alt"></i>&nbsp;Export Absensi</button>
        </div>


<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>


<!-- Modal Gaji-->
        <div class="modal fade export_gaji_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Export Gaji to</h3>
                    </div>
                    <div class="row modal-body">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <button onclick="location.href='<?php echo site_url('export_pegawai_pdf/index')?>'" type="button" style="font-size: 64px;" class="btn btn-danger pull-left">&nbsp;<i class="fa fa-file-pdf-o"></i>&nbsp;</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <button onclick="location.href='<?php echo site_url('export_pegawai_excel/export')?>'" type="button" style="font-size: 64px;" class="btn btn-success pull-right">&nbsp;<i class="fa fa-file-excel-o"></i>&nbsp;</button>
                        </div>
                    </div>
                </div>        
            </div>
        </div>

        <!-- Modal Absensi-->
        <div class="modal fade export_absensi_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Export Absensi to</h3>
                    </div>
                    <div class="row modal-body">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <button onclick="location.href='<?php echo site_url('export_absensi_pdf/index')?>'" type="button" style="font-size: 64px;" class="btn btn-danger pull-left">&nbsp;<i class="fa fa-file-pdf-o"></i>&nbsp;</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <button onclick="location.href='<?php echo site_url('export_absensi_excel/export')?>'" type="button" style="font-size: 64px;" class="btn btn-success pull-right">&nbsp;<i class="fa fa-file-excel-o"></i>&nbsp;</button>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
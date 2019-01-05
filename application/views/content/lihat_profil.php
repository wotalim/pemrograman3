<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle-o"></em>
				</a></li>
				<li class="active">Profil</li>
			</ol>
		</div><!--/.row-->
    <br>
    <div>
   
          <div class="panel panel-info">
            <div class="panel-heading pan-bar">
              <div class="panel-title"><?php echo $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang');?></div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $this->session->userdata('foto');?>" class="img-kotak img-rounded img-responsive"> </div>
                
          <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-body tabs">
            <ul class="nav nav-pills">
              <li class="active">
              <a href="#profil_saya" data-toggle="tab" ><em class='fa fa-user'>&nbsp;</em>Profil</a></li>
              <li>
                <a href="#edit_password" data-toggle="tab"><em class='fa fa-lock'>&nbsp;</em>Edit Password</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="profil_saya">
                

                   <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td><em class='fa fa-user-circle-o'>&nbsp;</em>Jabatan:</td>
                          <td>: <?php echo $this->session->userdata('nama_jabatan');?></td>
                        </tr>
                      
                        <tr>
                          <td><em class='fa fa-calendar'>&nbsp;</em>Tanggal Lahir</td>
                          <td>: <?php echo $this->session->userdata('lahir');?></td>
                        </tr>
                          <td><em class='fa fa-paw'>&nbsp;</em>Jenis Kelamin</td>
                          <td>: <?php echo $this->session->userdata('kelamin');?></td>
                        </tr>
                          <tr>
                          <td><em class='fa fa-address-book'>&nbsp;</em>Alamat</td>
                          <td>: <?php echo $this->session->userdata('alamat');?></td>
                        </tr>
                        <tr>
                          <td><em class='fa fa-newspaper-o'>&nbsp;</em>Email</td>
                          <td>: <?php echo $this->session->userdata('email');?></a></td>
                        </tr>
                          <td><em class='fa fa-user-circle-o'>&nbsp;</em>Nomor Lelepon</td>
                          <td>: <?php echo $this->session->userdata('telepon');?></a></td>   
                        </tr>
                     
                    </tbody>
                  </table>
                  
              </div>
              <div class="tab-pane fade" id="edit_password">
                <form role="form">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Password lama" name="email" type="password" autofocus="" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password baru" name="email" type="password" autofocus="" value="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="konfirmasi password baru" name="password" type="password" value="">
              </div>
              <a href="profil" class="btn btn-primary btn-block">Simpan</a></fieldset>
            
          </form>
              </div>
              
            </div>
          </div>
        </div><!--/.panel-->
      </div><!-- /.col-->
    </div><!-- /.row -->
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
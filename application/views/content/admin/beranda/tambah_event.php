<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Beranda</li>
			<li class="active">Tambah Hari Libur</li>
		</ol>
	</div>
	<br>
	<div class="panel panel-default">
    <div class="panel-body tabs" style="background: #ffffff;">
      <ul class="nav nav-pills">
        <li class="active"><a href="#" ><em class='fa fa-plus'>&nbsp;</em>Tambah Hari Libur</a></li>
        <li><a href="<?php echo site_url('admin/lihat_edit_kalender')?>"><em class='fa fa-search'>&nbsp;</em>Lihat/Edit Event</a></li>
      </ul>
      <hr class="style1">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="belum">
			<div class="row">
				<div class="col-sm-3-col-md-3 col-lg-3"></div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header bg-info" style="color: white;">
							<h4 style="color: white;">Tambah Hari Libur</h4>
						</div>
						<div class="card-body">
							<form action="<?php echo site_url('admin/tambah_acara')?>" method="post">
								<div class="form-group">
									<label for="title">Nama Acara</label>
									<input id="title" placeholder="Nama Acara" class="form-control" name="title">
								</div>
								<div class="form-group">
									<label for="description">Masukkan Deskripsi</label>
									<textarea id="description" class="form-control" name="description"></textarea>
								</div>
								<div class="form-group">
									<label for="warna">Pilih Warna Penanda</label>
									<select id="warna" class="form-control selectpicker" name="color">
										<option>.::Pilih Warna::.</option>
										<option data-content='<i class="fa fa-circle" style="color:#109b59"></i>&nbsp;Hijau' value="#109b59"></option>
										<option data-content='<i class="fa fa-circle" style="color:#2c9ed7"></i>&nbsp;Biru' value="#2c9ed7"></option>
										<option data-content='<i class="fa fa-circle" style="color:#ffce41"></i>&nbsp;Kuning' value="#ffce41"></option>
										<option data-content='<i class="fa fa-circle" style="color:#ea4335"></i>&nbsp;Merah' value="#ea4335"></option>
									</select>
								</div>
								<div class="form-group">
									<label for="mulai">Tanggal Mulai</label>
									<div id="mulai" class="input-group date" data-date-format="yyyy-mm-dd">
										<input class="form-control" type="text" id="start_date" name="start_date" readonly="readonly">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
								</div>
								<div class="form-group">
									<label for="selesai">Tanggal Selesai</label>
									<div id="mulai" class="input-group date" data-date-format="yyyy-mm-dd">
										<input class="form-control" type="text" id="end_date" name="end_date" readonly="readonly">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
								</div>
								<input type="hidden" name="id">
								<input type="hidden" value="<?php echo date("Y-m-d H:i:s")?>" name="create_at">
								<input type="hidden" value="<?php echo $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang')?>" name="create_by">
								<div class="form-group">
									<input type="submit" value="Masukkan" class="btn btn-block form-group btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3-col-md-3 col-lg-3"></div>	
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
<script>
	$('.selectpicker').selectpicker();
	$(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>
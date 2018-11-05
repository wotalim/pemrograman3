<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<img src="<?php echo base_url("assets/img/wibu.png")?>" alt="logo"style="width:100px;height:50px;" onclick="location.href='<?php echo site_url('admin');?>'"> 
					<ul class="nav navbar-top-links navbar-right"></ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic" >
				<img src="<?php echo base_url("");?>/assets/img/foto_profil/<?php echo $this->session->userdata('foto');?>" class="img-fluid" alt="Responsive image">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Halo,<br><?php echo $this->session->userdata('nama_depan');?>!</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
		<?php if($this->session->userdata('role')==='1'):?>
			<li class="<?php echo active_link('admin'); ?>"><a href='<?php echo site_url('admin')?>'><em class='fa fa-home'>&nbsp;</em> Home</a></li>
			<li class="<?php echo active_link('absensi'); ?>"><a href='<?php echo site_url('absensi')?>'><em class='fa fa-calendar'>&nbsp;</em> Absensi</a></li>
			<li class="<?php echo active_link('lihat_pegawai'); ?>"><a href='<?php echo site_url('lihat_pegawai')?>'><em class='fa fa-user'>&nbsp;</em> Lihat pegawai</a></li>
			<li class="<?php echo active_link('gaji_pegawai'); ?>"><a href='<?php echo site_url('gaji_pegawai')?>'><em class='fa fa-usd'>&nbsp;</em> Gaji Pegawai</a></li>
			<li class="<?php echo active_link('lembur_tunjangan'); ?>"><a href='<?php echo site_url('lembur_tunjangan')?>'><em class='fa fa-align-left'>&nbsp;</em> Lembur/Tunjangan</a></li>
			<li class="<?php echo active_link('data_jabatan'); ?>"><a href='<?php echo site_url('data_jabatan')?>'><em class='fa fa-black-tie'>&nbsp;</em> Data Jabatan</a></li>
			<li class="divider"><hr class="style1"></li>
			<li class="<?php echo active_link('profil'); ?>"><a href='<?php echo site_url('profil')?>'><em class='fa fa-user-circle-o'>&nbsp;</em> Profil</a></li>
			<li><a href="<?php echo site_url('login/logout');?>"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		
		<?php else:?>
			<li class="<?php echo active_link('pegawai'); ?>"><a href='<?php echo site_url('pegawai')?>'><em class='fa fa-home'>&nbsp;</em> Home</a></li>
			<li><a href='<?php echo site_url('profil')?>'><em class='fa fa-user-circle-o'>&nbsp;</em> Profil</a></li>
			<li><a href="<?php echo site_url('login/logout');?>"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
		<?php endif 
		;?>
		</ul>
	</div><!--/.sidebar-->
		
	
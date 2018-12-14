<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user"></em>
				</a></li>
				<li class="active">Lihat Pegawai</li>
			</ol>
		</div><!--/.row-->
    <br>
    <div class="panel panel-info">
      <div class="panel-heading pan-bar">
        <div class="panel-title"> DAFTAR KARYAWAN</div>     
      </div>

      <div class="panel-body">
    <div>
    <form action="<?php echo site_url('lihat_pegawai/index/'); ?>" method="post" class="form-inline">
    <div class="row">
        <div class="col-sm-8 main">
            <div class="form-group">
            <div class="input-group">
                <input id="btn-input" name="cari" placeholder="Cari Kata Kunci..." class="form-control">
                <span class="input-group-btn"><button type="submit" name="q" class="btn btn-primary" style="height: 34px;"><i class="fa fa-search"></i>&nbsp;Cari</button></span>
            </div>
            </div>
        </div>
        <div class="col-sm-2 main">
            <div class="form-group">
                <button onclick="location.href='<?php echo site_url('lihat_pegawai/tambah')?>'" type="button" class="btn btn-success btn-block form-control"><i class="fa fa-plus"></i>&nbsp;Tambah Pegawai</button>
            </div>
        </div>
        <div class="col-sm-2 main">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm"> <i class="glyphicon glyphicon-download-alt"></i>&nbsp;Export</button>
        </div>
    </div>
    <br>
    <div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead class="thead-light" align="left">
				<tr>
                    <th>No.</th>
					<th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th colspan="2">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $nomer = 0;
				if (count($listKaryawan) > 0) {
					foreach($listKaryawan as $row)
					{
                        $nomer++;
						?>
						<tr>
                            <td><?php echo $nomer?></td>
							<td><?php echo $row['nip']; ?></td>
							<td><a href="<?php echo site_url('lihat_pegawai/lihat/').$row['nip']?>"><?php echo $row['nama_depan'];?>&nbsp;<?php echo $row['nama_belakang']?></a></td>
                            <td><?php echo $row['nama_jabatan']; ?></td>
                            <td><?php echo $row['jk']; ?></td>
							<td><?php echo $row['alamat_karyawan']; ?></td>
                            <td><?php echo $row['telp']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><a href="<?php echo site_url('lihat_pegawai/edit/').$row['nip'];?>" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                            <a href="<?php echo site_url('lihat_pegawai/hapus/').$row['nip'];?>" onClick="return confirm('Hapus Data?')" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
						</tr>
				    <?php
                    }?>
                    
                    <?php
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>"; 
					echo $this->pagination->create_links();
				    } else {
                    echo "<tbody><tr><td colspan='10' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
				    }
				?>
		</form>
</div>
        
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>

<!-- Modal -->
        <div class="modal fade bd-example-modal-sm" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Export to</h3>
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
            </div>
        </div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Home</li>
			</ol>
		</div>
		<br>

		<!--Content Brow-->
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Calendar 
					</div>
					<div class="panel-body"  id="fullcalendar"></div>
				</div>	
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Hari Libur Bulan <?php echo bulan();?>
					</div>
					<div class="panel-body table-responsive">
						<table class="table table-hover table-user-information">
							<thead>
								<tr class="row">
									<td class="col-sm-3 text-center"><b>Tanggal</b></td>
									<td class="col-sm-7 text-center"><b>Acara</b></td>
								</tr>
							</thead>
						<?php  
						foreach($lihatevent->result() as $row){
							$mulai = strtotime($row->start_date);
							$selesai = strtotime("-1 day", strtotime($row->end_date));
							$tanggal_mulai = date('d', $mulai);
							$tanggal_selesai = date('d', $selesai);
							if ($row->end_date == ""){ ?>
							<tr class="row">
								<td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row->color;?>;"></i></span><b><?php echo $tanggal_mulai?></b></td>
								<td class="col-sm-8 col-md-8 col-lg-8 text-center"><?php echo $row->title;?></td>
								<td class="col-sm-1 col-md-1 col-lg-1"><span><i class="fa fa-circle" style="color: <?php echo $row->color;?>;"></i></span></td>
							</tr>
							<?php
							}elseif($row->end_date != ""){?>
							<tr class="row">
								<td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row->color;?>;"></i></span><b><?php echo $tanggal_mulai;?> - <?php echo ($tanggal_selesai)?></b></td>
								<td class="col-sm-8 col-md-8 col-lg-8 text-center"><?php echo $row->title;?></td>
								<td class="col-sm-1 col-md-1 col-lg-1"><span><i class="fa fa-circle" style="color: <?php echo $row->color;?>;"></i></span></td>
							</tr>
							<?php
							}
						}?>
						</table>
						<br>
						<span class="pull-right"><a href="<?php echo site_url('admin/lihat_edit_kalender')?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Lihat Lainnya</a></span>
					</div>
				</div>
			</div>	
		</div>
</div>
        
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/fullcalendar/lib/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js')?>"></script>
<script src="<?php echo base_url('assets/fullcalendar/locale-all.js')?>"></script>

<script>
	$(document).ready(function() {
		var get_data = '<?php echo $get_data;?>';
        $('#fullcalendar').fullCalendar({
			locale: 'id',
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
			events: JSON.parse(get_data)
        });
    });
	
</script>
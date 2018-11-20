<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li>Beranda</li>
            <li class="active">Lihat Edit Libur</li>
        </ol>
    </div>
    <br>
    <div class="panel panel-default">
    <div class="panel-body tabs" style="background: #ffffff;">
        <ul class="nav nav-pills">
            <li><a href="<?php echo site_url('admin/tambah_event')?>" ><em class='fa fa-plus'>&nbsp;</em>Tambah Libur</a></li>
            <li class="active"><a href="#"><em class='fa fa-search'>&nbsp;</em>Lihat/Edit Libur</a></li>
        </ul>
        <hr class="style1">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="belum">
                <div align="center"><h3><b>Kalender Acara<br><?php echo date('Y')?></b></h3>
                    <div style="padding: 15px;">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4"  style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Januari
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatjanuari->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatjanuari->result() as $row1){
                                            $mulai1 = strtotime($row1->start_date);
                                            $selesai1 = strtotime($row1->end_date);
                                            $tanggal_mulai1 = date('d', $mulai1);
                                            $tanggal_selesai1 = date('d', $selesai1);
                                            if ($row1->end_date == ""){ ?>
                                            <tr class="row" title="<?php $row1->description;?>">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row1->color;?>;"></i></span><b><?php echo $tanggal_mulai1;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row1->description;?>"><?php echo $row1->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row1->end_date != ""){?>
                                            <tr class="row" title="<?php $row1->description;?>">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row1->color;?>;"></i></span><b><?php echo $tanggal_mulai1;?> - <?php echo ($tanggal_selesai1-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row1->description;?>"><?php echo $row1->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Februari
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatfebruari->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatfebruari->result() as $row2){
                                            $mulai2 = strtotime($row2->start_date);
                                            $selesai2 = strtotime($row2->end_date);
                                            $tanggal_mulai2 = date('d', $mulai2);
                                            $tanggal_selesai2 = date('d', $selesai2);
                                            if ($row2->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row2->color;?>;"></i></span><b><?php echo $tanggal_mulai2;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row2->description;?>"><?php echo $row2->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row2->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row2->color;?>;"></i></span><b><?php echo $tanggal_mulai2;?> - <?php echo ($tanggal_selesai2-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row2->description;?>"><?php echo $row2->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Maret
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatmaret->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                    <table class="table table-hover table-user-information">
                                                <thead>
                                                    <tr class="row">
                                                        <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                        <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                    </tr>
                                                </thead>
                                            <?php  
                                            foreach($lihatmaret->result() as $row3){
                                                $mulai3 = strtotime($row3->start_date);
                                                $selesai3 = strtotime($row3->end_date);
                                                $tanggal_mulai3 = date('d', $mulai3);
                                                $tanggal_selesai3 = date('d', $selesai3);
                                                if ($row3->end_date == ""){ ?>
                                                <tr class="row">
                                                    <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row3->color;?>;"></i></span><b><?php echo $tanggal_mulai3;?></b></td>
                                                    <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row3->description;?>"><?php echo $row3->title;?></a></td>
                                                    <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                                </tr>
                                                <?php
                                                }elseif($row3->end_date != ""){?>
                                                <tr class="row">
                                                    <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row3->color;?>;"></i></span><b><?php echo $tanggal_mulai3;?> - <?php echo ($tanggal_selesai3-1);?></b></td>
                                                    <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row3->description;?>"><?php echo $row3->title;?></a></td>
                                                    <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            }?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        April
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatapril->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                    <table class="table table-hover table-user-information">
                                                <thead>
                                                    <tr class="row">
                                                        <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                        <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                    </tr>
                                                </thead>
                                            <?php  
                                            foreach($lihatapril->result() as $row4){
                                                $mulai4 = strtotime($row4->start_date);
                                                $selesai4 = strtotime($row4->end_date);
                                                $tanggal_mulai4 = date('d', $mulai4);
                                                $tanggal_selesai4 = date('d', $selesai4);
                                                if ($row4->end_date == ""){ ?>
                                                <tr class="row">
                                                    <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row4->color;?>;"></i></span><b><?php echo $tanggal_mulai4;?></b></td>
                                                    <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row4->description;?>"><?php echo $row4->title;?></a></td>
                                                    <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit" ></i></a></span></td>
                                                </tr>
                                                <?php
                                                }elseif($row4->end_date != ""){?>
                                                <tr class="row">
                                                    <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row4->color;?>;"></i></span><b><?php echo $tanggal_mulai4;?> - <?php echo ($tanggal_selesai4-1);?></b></td>
                                                    <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row10->description;?>"><?php echo $row4->title;?></a></td>
                                                    <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            }?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Mei
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatmei->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatmei->result() as $row5){
                                            $mulai5 = strtotime($row5->start_date);
                                            $selesai5 = strtotime($row5->end_date);
                                            $tanggal_mulai5 = date('d', $mulai5);
                                            $tanggal_selesai5 = date('d', $selesai5);
                                            if ($row5->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row5->color;?>;"></i></span><b><?php echo $tanggal_mulai5;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row5->description;?>"><?php echo $row5->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></a></i></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row5->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row5->color;?>;"></i></span><b><?php echo $tanggal_mulai5;?> - <?php echo ($tanggal_selesai5-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row5->description;?>"><?php echo $row5->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Juni
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatjuni->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatjuni->result() as $row6){
                                            $mulai6 = strtotime($row6->start_date);
                                            $selesai6 = strtotime($row6->end_date);
                                            $tanggal_mulai6 = date('d', $mulai6);
                                            $tanggal_selesai6 = date('d', $selesai6);
                                            if ($row6->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row6->color;?>;"></i></span><b><?php echo $tanggal_mulai6;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row6->description;?>"><?php echo $row6->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row6->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row6->color;?>;"></i></span><b><?php echo $tanggal_mulai6;?> - <?php echo ($tanggal_selesai6-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row6->description;?>"><?php echo $row6->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Juli 
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatjuli->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php 
                                        foreach($lihatjuli->result() as $row7){
                                            $mulai7 = strtotime($row->start_date);
                                            $selesai7 = strtotime($row->end_date);
                                            $tanggal_mulai7 = date('d', $mulai7);
                                            $tanggal_selesai7 = date('d', $selesai7);
                                            if ($row7->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row7->color;?>;"></i></span><b><?php echo $tanggal_mulai7;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row7->description;?>"><?php echo $row7->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row7->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row7->color;?>;"></i></span><b><?php echo $tanggal_mulai7;?> - <?php echo ($tanggal_selesai7-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row7->description;?>"><?php echo $row7->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Agustus
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatagustus->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatagustus->result() as $row8){
                                            $mulai8 = strtotime($row->start_date);
                                            $selesai8 = strtotime($row->end_date);
                                            $tanggal_mulai8 = date('d', $mulai8);
                                            $tanggal_selesai8 = date('d', $selesai8);
                                            if ($row8->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row8->color;?>;"></i></span><b><?php echo $tanggal_mulai8;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row8->description;?>"><?php echo $row8->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row8->color;?>;"></i></span><b><?php echo $tanggal_mulai8;?> - <?php echo ($tanggal_selesai8-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row8->description;?>"><?php echo $row8->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        September 
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatseptember->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatseptember->result() as $row9){
                                            $mulai9 = strtotime($row9->start_date);
                                            $selesai9 = strtotime($row9->end_date);
                                            $tanggal_mulai9 = date('d', $mulai9);
                                            $tanggal_selesai9 = date('d', $selesai9);
                                            if ($row9->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row9->color;?>;"></i></span><b><?php echo $tanggal_mulai9;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row9->description;?>"><?php echo $row9->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row9->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row9->color;?>;"></i></span><b><?php echo $tanggal_mulai9;?> - <?php echo ($tanggal_selesai9-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row9->description;?>"><?php echo $row9->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Oktober 
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatoktober->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatoktober->result() as $row10){
                                            $mulai10 = strtotime($row10->start_date);
                                            $selesai10 = strtotime($row10->end_date);
                                            $tanggal_mulai10 = date('d', $mulai10);
                                            $tanggal_selesai10 = date('d', $selesai10);
                                            if ($row10->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row10->color;?>;"></i></span><b><?php echo $tanggal_mulai10;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row10->description;?>"><?php echo $row10->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row10->end_date != ""){?>
                                            <tr class="row" title="<?php $row10->description;?>">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row10->color;?>;"></i></span><b><?php echo $tanggal_mulai10;?> - <?php echo ($tanggal_selesai10-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row10->description;?>"><?php echo $row10->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        November
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatnovember->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatnovember->result() as $row11){
                                            $mulai11 = strtotime($row11->start_date);
                                            $selesai11 = strtotime($row11->end_date);
                                            $tanggal_mulai11 = date('d', $mulai11);
                                            $tanggal_selesai11 = date('d', $selesai11);
                                            if ($row11->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row11->color;?>;"></i></span><b><?php echo $tanggal_mulai11;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row11->description;?>"><?php echo $row11->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" ttle="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row11->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row11->color;?>;"></i></span><b><?php echo $tanggal_mulai11;?> - <?php echo ($tanggal_selesai11-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row11->description;?>"><?php echo $row11->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" style="padding: 5px">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        Desember 
                                    </div>
                                    <div class="card-body table-responsive">
                                    <?php if($lihatdesember->result() == null){
                                        echo "<b>Tidak Ada Hari Libur</b>";
                                    }else{ ?>
                                        <table class="table table-hover table-user-information">
                                            <thead>
                                                <tr class="row">
                                                    <td class="col-sm-3 text-center"><b>Tanggal</b></td>
                                                    <td class="col-sm-7 text-center"><b>Acara</b></td>
                                                </tr>
                                            </thead>
                                        <?php  
                                        foreach($lihatdesember->result() as $row12){
                                            $mulai12 = strtotime($row12->start_date);
                                            $selesai12 = strtotime($row12->end_date);
                                            $tanggal_mulai12 = date('d', $mulai12);
                                            $tanggal_selesai12 = date('d', $selesai12);
                                            if ($row12->end_date == ""){ ?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row12->color;?>;"></i></span><b><?php echo $tanggal_mulai12;?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row12->description;?>"><?php echo $row12->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }elseif($row12->end_date != ""){?>
                                            <tr class="row">
                                                <td class="col-sm-4 col-md-4 col-lg-4 text-center"><span class="pull-left"><i class="fa fa-circle" style="color: <?php echo $row12->color;?>;"></i></span><b><?php echo $tanggal_mulai12;?> - <?php echo ($tanggal_selesai12-1);?></b></td>
                                                <td class="col-sm-8 col-md-8 col-lg-8 text-center"><a title="Deskripsi" data-toggle="popover" data-content="<?php echo $row12->description;?>"><?php echo $row12->title;?></a></td>
                                                <td class="col-sm-1 col-md-1 col-lg-1"><span><a href="#" title="Edit"><i class="fa fa-edit"></i></a></span></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover().tooltip();   
});
</script>
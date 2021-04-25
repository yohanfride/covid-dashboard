<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-users"></i>
                        Manajemen Log - Kasus Covid-19
                    </h4>
                </div>
            </div>
            <div class="row ">
                <ul class="nav responsive-tab">
                    <li class="nav-item" style="padding-left: 7px;">
                        <a style="padding: .5rem;" class="nav-link active" href="<?= base_url(); ?>"><i style="padding-right: 5px;" class="icon icon-home"></i>Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-users"></i>Manajemen Log  - Kasus Covid-19</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12 mb-4">
                        <div class="card">
                            <form method="get" id="form-search">
                                <div class="card-body b-b">
                                    <h4>Form Cari Kasus Covid-19</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Tanggal Awal</label>
                                                <div class="input-group focused">
                                                    <input type="text" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;Y-m-d&quot;}" name="str" value="<?= $str_date ?>" placeholder="Tanggal Lahir Pasien">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text add-on white">
                                                            <i class="icon-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Tanggal Akhir</label>
                                                <div class="input-group focused">
                                                    <input type="text" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;Y-m-d&quot;}" name="end" value="<?= $end_date ?>" placeholder="Tanggal Lahir Pasien">
                                                    <span class="input-group-append">
                                                        <span class="input-group-text add-on white">
                                                            <i class="icon-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputName" class="col-form-label">Kondisi</label>
                                                <select  class="form-control" name="lvl" id="level" >
                                                    <option value="" >-- Semua --</option>
                                                    <option value="konfirmasi" <?= (strtoupper($lvl) == "TERKONFIRMASI")?"selected":""; ?> >Terkonfirmasi</option>
                                                    <option value="suspek" <?= (strtoupper($lvl) == "SUSPEK")?"selected":""; ?> >Suspek</option>
                                                    <option value="probable" <?= (strtoupper($lvl) == "PROBABLE")?"selected":""; ?> >Probable</option>
                                                    <option value="kontak_erat" <?= (strtoupper($lvl) == "KONTAK_ERAT")?"selected":""; ?> >Kontak Erat</option>
                                                    <option value="pelaku_perjalanan" <?= (strtoupper($lvl) == "PELAKU_PERJALANAN")?"selected":""; ?> >Pelaku Perjalanan</option>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Status</label>
                                                <select class="form-control" name="lvlstat" id="level_status">
                                                <option value="" >-- Semua --</option>
                                                <?php 
                                                    $list = array();
                                                    if((strtoupper($lvl) == "TERKONFIRMASI"))
                                                        $list = $level_status['konfirmasi'];   
                                                    if((strtoupper($lvl) == "SUSPEK"))
                                                        $list = $level_status['suspek'];
                                                    if((strtoupper($lvl) == "PROBABLE"))
                                                        $list = $level_status['probable'];
                                                    if((strtoupper($lvl) == "KONTAK_ERAT"))
                                                        $list = $level_status['kontak_erat'];
                                                    if((strtoupper($lvl) == "PELAKU_PERJALANAN"))
                                                        $list = $level_status['pelaku_perjalanan'];
                                                    foreach($list as $l){ ?>
                                                    <option value="<?= $l?>" <?= ( $lvlstat == $l )?"selected":""; ?>><?= $l?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-4" id="form_gejala">
                                            <div class="form-group">
                                                <label for="inputGejala" class="col-form-label">Konfirmasi Gejala</label>
                                                <select  class="form-control" name="gejala" id="gejala" >
                                                    <option value="" >-- Semua --</option>
                                                    <option value="Dengan Gejala" <?= ($gejala == "Dengan Gejala")?"selected":""; ?> >Dengan Gejala</option>
                                                    <option value="Tanpa Gejala" <?= ($gejala == "Tanpa Gejala")?"selected":""; ?> >Tanpa Gejala</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4">
                                           <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                                <?php if(isset($pusat)){ ?>
                                                    <select class="form-control" name="kec" id="kecamatan" >
                                                    <option value="" >-- Semua Kecamatan --</option>
                                                    <?php foreach($kecamatan['Kecamatan'] as $l){ ?>
                                                        <option value="<?= $l?>" <?= ($kec == $l)?'selected':''; ?> ><?= $l?></option>
                                                    <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control" value="<?= $kec;?>" name="kecamatan"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Kelurahan</label>
                                                <select class="form-control" name="kel" id="kelurahan" >
                                                    <option value="" >-- Semua Kelurahan --</option>
                                                <?php foreach($kecamatan[$kec] as $l){ ?>
                                                    <option value="<?= $l?>" <?= ($kel == $l)?'selected':''; ?> ><?= $l?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputName" class="col-form-label">Nama <span class="text-primary s-12">(Tidak harus nama lengkap)</span> </label>
                                                <input type="text" class="form-control" id="inputName" placeholder="Tuliskan nama"  name="nama" value="<?= $nama;?>">
                                            </div>
                                        </div> 
                                    </div> 
                                    <button type="submit" class="btn btn-primary" name="save" value="save">Cari</button>
                                </div>
                            </form>

                        </div>
                </div>
                <div class="col-md-12">
                    <?php if($error){ ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 14px;">&#10006;</span>
                            </button>
                            <strong>Peringatan!</strong> ulangi lagi.</span><br/><?= $error?> 
                        </div>
                    <?php } if($success){ ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 14px;">&#10006;</span>
                            </button>
                            <strong>Proses Berhasil!</strong> <?= $success;?></span> 
                        </div>
                    <?php } ?>
                    <div class="card no-b">
                        <div class="card-body">
                        <div class="card-title">
                            <h4>Data Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                        </div>
                        <br/>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Update</th>
                                                <th>Nama</th>
                                                <th>Lokasi (Lat,Lng)</th>
                                                <th>Kelompok</th>
                                                <th>Status</th>
                                                <?php if($user_now->level == 'admin' || $user_now->level == 'master-admin'){ ?>
                                                <th>Kecamatan</th>
                                                <?php } ?>
                                                <th>Kelurahan</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal Update</th>
                                                <th>Nama</th>
                                                <th>Lokasi (Lat,Lng)</th>
                                                <th>Kelompok</th>
                                                <th>Status</th>
                                                <?php if($user_now->level == 'admin' || $user_now->level == 'master-admin'){ ?>
                                                <th>Kecamatan</th>
                                                <?php } ?>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <?php foreach ($data as $s) { ?>
                                            <tr>
                                                <td><?= date( "Y-m-d H:i:s", strtotime( $s->date_add)) ?></td>
                                                <td><?= $s->nama ?></td>
                                                <td><?= $s->lokasi->coordinates[1].' , '.$s->lokasi->coordinates[0] ?></td>
                                                <td style="text-align: center;">
                                                    <?php if(strtoupper($s->level) == "TERKONFIRMASI"){ ?>
                                                    <span class="badge badge-primary red lighten-1 r-20" style="font-size: 12px;">TERKONFIRMASI</span>
                                                    <?php } else if(strtoupper($s->level) == "SUSPEK"){ ?>
                                                    <span class="badge badge-primary amber darken-2 r-20" style="font-size: 12px;">SUSPEK</span>
                                                    <?php } else if(strtoupper($s->level) == "PROBABLE"){ ?>
                                                    <span class="badge badge-primary yellow darken-1 r-20" style="font-size: 12px;">PROBABLE</span>
                                                    <?php } else if(strtoupper($s->level) == "KONTAK_ERAT"){ ?>
                                                    <span class="badge badge-primary blue lighten-1 r-20" style="font-size: 12px;">KONTAK ERAT</span>
                                                    <?php } else if(strtoupper($s->level) == "PELAKU_PERJALANAN"){ ?>
                                                    <span class="badge badge-primary purple lighten-1 r-20" style="font-size: 12px;">PELAKU PERJALANAN</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $s->level_status ?></td>
                                                <?php if($user_now->level == 'admin' || $user_now->level == 'master-admin'){ ?>
                                                <td><?= $s->kecamatan ?></td>
                                                <?php } ?>
                                                <td><?= $s->kelurahan ?></td>
                                                <td>
                                                   <a href="<?= base_url()?>user/detaillog/<?= $s->_id?>"><button type="button" class="btn  btn-xs btn-primary r-20"><i class="icon-search"></i> Detail</button></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <?= $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script>
    level_status = JSON.parse('<?php echo JSON_encode($level_status);?>');
    console.log(level_status);
    kecamatan = JSON.parse('<?php echo JSON_encode($kecamatan);?>');
    console.log(kecamatan);
    <?php
        if((strtoupper($lvl) != "KONFIRMASI")){
            echo '$("#form_gejala").hide();';
        }
    ?>
    $("#level").on('change', function() {
        var level = $(this).find(":selected").val();
        var level_item = level_status[level];
        var i;
        var text='<option value="" >-- Semua --</option>';
        for (i = 0; i < level_item.length; i++) {
          text += '<option value="'+level_item[i]+'" >'+level_item[i]+'</option>';
        }
        $("#level_status").html(text);
        if(level == 'konfirmasi'){
            $("#form_gejala").show();
        } else {
            $("#form_gejala").hide();
        }
    });
    $("#kecamatan").on('change', function() {
        var level = $(this).find(":selected").val();
        var level_item = kecamatan[level];
        var i;
        var text='<option value="" >-- Semua Kelurahan --</option>';
        for (i = 0; i < level_item.length; i++) {
          text += '<option value="'+level_item[i]+'" >'+level_item[i]+'</option>';
        }
        $("#kelurahan").html(text);
    });

</script>
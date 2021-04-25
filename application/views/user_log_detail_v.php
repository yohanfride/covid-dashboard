<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-edit"></i>
                        Detail Log - Pasien Covid-19
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>user/log"><i style="padding-right: 5px;" class="icon icon-users"></i>Manajemen Log  - Pasien Covid-19</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-pencil"></i>Edit</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
                <div class="col-md-8">
                    <form method="post" id="form-edit">
                        <div class="card">
                            <div class="card-header  white">
                                <strong> Data Log Absensi : <b><?= date( "Y-m-d H:i:s", strtotime( $log->date_add)) ?></b> </strong>
                            </div>
                            <div class="card-body p-0">
                                <!-- Big Heading -->
                                <div class="text-center bg-light b-b p-3">                                    
                                    <div id="map" style="min-width: 400px; width: 100%; min-height: 255px; z-index: 1;"></div>
                                    <input type="hidden" class="form-control" id="location-lat"  name="loc_lat">
                                    <input type="hidden" class="form-control" id="location-lng"  name="loc_long">  
                                </div>
                            </div>
                            <div class="card-footer white">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 my-3" id="user-card">
                    <div class="card">
                            <div class="card-body b-b">
                                <h4>Data Anda</h4>
                                <div class="row">
                                	<?php if(empty($data->nama)){ ?>
                                	<div class="col-md-6">
	                                	<div class="alert alert-danger alert-dismissible" role="alert">
	                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 14px;">&#10006;</span>
	                                        </button>
	                                        <strong>Data pasien tidak ada!</strong></span><br/>Data telah dihapus dari sistem
	                                    </div>
                                    </div>
                                	<?php } else { ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name"  value="<?= $data->nama?>" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Kondisi</label>
                                            <select  class="form-control" name="level" id="level" required disabled >
                                                <option value="konfirmasi" <?= (strtoupper($data->level) == "TERKONFIRMASI")?"selected":""; ?> >Terkonfirmasi</option>
                                                <option value="suspek" <?= (strtoupper($data->level) == "SUSPEK")?"selected":""; ?> >Suspek</option>
                                                <option value="probable" <?= (strtoupper($data->level) == "PROBABLE")?"selected":""; ?> >Probable</option>
                                                <option value="kontak_erat" <?= (strtoupper($data->level) == "KONTAK_ERAT")?"selected":""; ?> >Kontak Erat</option>
                                                <option value="pelaku_perjalanan" <?= (strtoupper($data->level) == "PELAKU_PERJALANAN")?"selected":""; ?> >Pelaku Perjalanan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Status</label>
                                            <input type="text" class="form-control" id="level_status" name="level_status"  value="<?= $data->level_status?>" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Tanggal Lahir</label>
                                            <div class="input-group focused">
                                                <input type="text" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;Y-m-d&quot;}" name="tgl_lahir" value="<?= date( "Y-m-d", strtotime( $data->tgl_lahir))?>" placeholder="Tanggal Lahir Pasien" disabled>
                                                <span class="input-group-append">
                                                    <span class="input-group-text add-on white">
                                                        <i class="icon-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <label for="inputName" class="col-form-label">Jenis Kelamin</label>
                                            <select id="inputState" class="form-control" name="jenis_kelamin" id="jenis_kelamin" required disabled>
                                                <option <?= ($data->jenis_kelamin == "laki-laki")?"selected":""; ?> value="laki-laki">Laki-laki</option>
                                                <option <?= ($data->jenis_kelamin == "laki-laki")?"selected":""; ?> value="wanita">Wanita</option>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">No. Telp.</label>
                                            <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone"  value="<?= $data->phone?>" disabled>
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Keluhan</label>
                                            <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="keluhan" disabled required><?= $data->keluhan ?></textarea>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                            <input type="text" class="form-control" placeholder="Kecamatan"  name="kecamatan" disabled value="<?= $data->kecamatan?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Kelurahan</label>
                                            <input type="text" class="form-control" placeholder="Kelurahan"  name="kelurahan" disabled value="<?= $data->kelurahan?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Alamat</label>
                                            <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="2" style="resize: none;" disabled name="alamat"  required><?= $data->alamat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Riwayat Perjalanan</label>
                                            <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="riwayat_perjalanan"  required disabled><?= $data->riwayat_perjalanan ?></textarea>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div> 
                            </div>
                    </div>
                </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script>
    <?php
        if(!array_key_exists('lokasi',$log)){
            $log->lokasi = false;
        }
    ?>
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?= ($log->lokasi)?$log->lokasi->coordinates[1]:'-7.1968026'; ?>, lng: <?= ($log->lokasi)?$log->lokasi->coordinates[0]:'113.2415155'; ?>},
          zoom: 15,
          mapTypeId: 'roadmap'
        });
        var marker;
        
        <?php if($log->lokasi){ ?>
            marker = new google.maps.Marker({
                position: {lat: <?= $log->lokasi->coordinates[1]; ?>, lng: <?= $log->lokasi->coordinates[0]; ?>},
                map: map
            });
        <?php } ?>
    }  
    //Depending on what I use it for I sometimes parse the json so I can work with a straight forward array:
    level_status = JSON.parse('<?php echo JSON_encode($level_status);?>');
    console.log(level_status);
    kecamatan = JSON.parse('<?php echo JSON_encode($kecamatan);?>');
    console.log(kecamatan);

    $("#level").on('change', function() {
        var level = $(this).find(":selected").val();
        var level_item = level_status[level];
        var i;
        var text='';
        for (i = 0; i < level_item.length; i++) {
          text += '<option value="'+level_item[i]+'" >'+level_item[i]+'</option>';
        }
        $("#level_status").html(text);
    });
    $("#kecamatan").on('change', function() {
        var level = $(this).find(":selected").val();
        var level_item = kecamatan[level];
        var i;
        var text='';
        for (i = 0; i < level_item.length; i++) {
          text += '<option value="'+level_item[i]+'" >'+level_item[i]+'</option>';
        }
        $("#kelurahan").html(text);
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDq2h9qLZ1zKRHMT5Qv2QBfGWL0sAKDzI&libraries=places&callback=initAutocomplete"
     async defer></script>
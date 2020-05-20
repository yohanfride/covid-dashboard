            <div class="card">

                        <div class="card-body b-b">
                            <h4>Form Aktivasi QR Code</h4>
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
                            <?php if($error != "Tidak ada data"){ ?>
                            <form method="post" id="form-edit">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name"  value="<?= $data->nama?>" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-form-label">Kondisi</label>
                                        <select  class="form-control" name="level" id="level" required disabled >
                                            <option value="confirm" <?= (strtoupper($data->level) == "CONFIRM")?"selected":""; ?> >Confirm</option>
                                            <option value="pdp" <?= (strtoupper($data->level) == "PDP")?"selected":""; ?> >PDP (Pasien Dalam Perawatan)</option>
                                            <option value="odp" <?= (strtoupper($data->level) == "ODP")?"selected":""; ?> >ODP (Orang Dalam Pengawasan)</option>
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
                                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone" disabled value="<?= $data->kecamatan?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Kelurahan</label>
                                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone" disabled value="<?= $data->kelurahan?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Alamat</label>
                                        <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="2" style="resize: none;" disabled name="alamat"  required><?= $data->alamat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">
                                            Lokasi 
                                            <button class="btn btn-sm btn-success" onclick="getmylocation()" style="position: absolute; right: 1px; top: 35px; z-index: 100;">Lokasi Saya</button> 
                                        </label>
                                        <div id="map" style="min-width: 400px; width: 100%; min-height: 195px; z-index: 1;"></div>
                                        <input type="hidden" class="form-control" id="location-lat"  name="loc_lat">
                                        <input type="hidden" class="form-control" id="location-lng"  name="loc_long">
                                        <input type="hidden" class="form-control" value="<?= $qrcode;?>" name="qrcode">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Riwayat Perjalanan</label>
                                        <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="riwayat_perjalanan"  required disabled><?= $data->riwayat_perjalanan ?></textarea>
                                    </div>
                                </div>
                            </div> 
                            <button id="regisbtn" type="submit" class="btn btn-primary btn-delete" name="saves" value="saves">Registrasi QR Code</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>


 <script type="text/javascript">
      $(document).ready(function() {  
        navigator.geolocation.getCurrentPosition(onSuccess, onError, {timeout:10000}); 
        $('#form-edit').on('submit', function (e) {
            e.preventDefault();
            if( confirm('Apakah anda yakin melanjutkan proses? Data yang ditambahkan tidak bisa dibatalkan!') ){
                var lat = $("#location-lat").val();
                if(lat == ''){
                    $("#btnErrorLokasi").unbind('click');
                    $("#btnErrorLokasi").click();
                } else {
                    $.ajax({
                        type: 'post',
                        url: '<?= base_url()?>monitoring/edit/<?= $data->_id; ?>',
                        data: $('#form-edit').serialize(),
                        success: function (result) {
                            if(result == "Error-2"){
                                $("#btnErrorLokasi").unbind('click');
                                $("#btnErrorLokasi").click();
                            } else if(result == "Error"){
                                $("#btnErrorSistem").unbind('click');
                                $("#btnErrorSistem").click();
                            } else if(result == "Success"){
                                $("#btnSukses").unbind('click');
                                $("#btnSukses").click();
                                setTimeout(function () {
                                   window.location.href = "<?= base_url('monitoring/success/'.$qrcode)?>"; 
                                }, 10000); 
                            } 
                        }
                    });    
                }
            }
            return false;
        });
        //$('a.somelink').click(function() { locateControl.locate(); });   
    });
 </script>   
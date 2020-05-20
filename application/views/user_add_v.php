<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-edit"></i>
                        Tambah Kasus Covid-19
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>user"><i style="padding-right: 5px;" class="icon icon-users"></i>Tampilan Tabel Kasus Covid-19</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link active" href="#"><i style="padding-right: 0px;" class="icon icon-keyboard_arrow_right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-pencil"></i>Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <form method="post" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body b-b">
                            <h4>Form Tambah Kasus Covid-19</h4>
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-form-label">Kondisi</label>
                                        <select  class="form-control" name="level" id="level" required>
                                            <option value="confirm"  >Confirm (Positif)</option>
                                            <option value="pdp"  >PDP (Pasien Dalam Pengawasan)</option>
                                            <option value="odp" >ODP (Orang Dalam Pemantauan)</option>
                                            <option value="odr" >ODR (Orang Dalam Resiko)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Status</label>
                                        <select class="form-control" name="level_status" id="level_status" required>
                                        <?php 
                                            $list = $level_status['confirm'];  
                                            foreach($list as $l){ ?>
                                            <option value="<?= $l?>"><?= $l?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Tanggal Lahir</label>
                                        <div class="input-group focused">
                                            <input type="text" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;Y-m-d&quot;}" name="tgl_lahir" placeholder="Tahun - Bulan - Tanggal (yyyy-mm-dd)">
                                            <span class="input-group-append">
                                                <span class="input-group-text add-on white">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-form-label">Jenis Kelamin</label>
                                        <select id="inputState" class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">No. Telp.</label>
                                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone"  >
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Keluhan</label>
                                        <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="keluhan"  required></textarea>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                        <select class="form-control" name="kecamatan" id="kecamatan" required>
                                        <?php foreach($kecamatan['Kecamatan'] as $l){ ?>
                                            <option value="<?= $l?>" <?= ($kec == $l)?'selected':''; ?> ><?= $l?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Kelurahan</label>
                                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                                        <?php foreach($kecamatan[$kec] as $l){ ?>
                                            <option value="<?= $l?>" ><?= $l?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Alamat</label>
                                        <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="2" style="resize: none;" name="alamat"  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-form-label">Riwayat Perjalanan</label>
                                        <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="riwayat_perjalanan"  required></textarea>
                                    </div>
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-primary" name="save" value="save">Tambah</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script>
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

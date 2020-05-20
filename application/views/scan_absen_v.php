<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url();?>assets/img/logo-lambang.ico" type="image/x-icon">
    <title> <?= $title?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <?php if( $title == 'Tambah Fasilitas Kesehatan' or $title == 'Ubah Fasilitas Kesehatan' ){ ?>
        <style>
          /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */
          #map {
            height: 100%;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
          }

          #infowindow-content .title {
            font-weight: bold;
          }

          #infowindow-content {
            display: none;
          }

          #map #infowindow-content {
            display: inline;
          }

          .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
          }

          #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
          }

          .pac-controls {
            display: inline-block;
            padding: 5px 11px;
          }

          .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
          }

          #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
            padding: .375rem .75rem;
          }

          #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
          }
          #target {
            width: 345px;
          }
        </style>
      
    <?php } ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.0-beta.2.rc.2/leaflet.css">
    
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="blue accent-4">
            <div class="p-2 pt-3 pb-3 text-white">
                <span class="s-24  text-primary">Monitoring Panel</span>
            </div>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?= base_url();?>assets/img/dummy/u1.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?= (isset($data))?$data->nama:'Tidak Ada Data'; ?> </h6>
                        <a data-toggle="collapse" href="#userSettingsCollapse"><i class="icon-circle text-primary blink"></i>User Covid-19</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <?php 
                        $role = 'gugustugas';
                    ?>
                    <div class="list-group mt-3 shadow">
                        <a href="<?= base_url() ?>monitoring/userlogout" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-exit_to_app text-red"></i>Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->
<div class="navbar-custom-menu p-t-10">
    <ul class="nav navbar-nav">
      
    </ul>
</div>
        </div>
    </div>
</div>
<div class="page has-sidebar-left height-full">

    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Halaman Utama
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="row my-3">
                    
            <?php if(!$error2){ ?>
                <div class="col-md-8">
                    <form method="post" id="form-edit">
                        <div class="card">
                            <div class="card-header  white">
                                <strong> Proses Absensi </strong>
                            </div>
                            <div class="card-body p-0">
                                <!-- Big Heading -->
                               
                                <div class="text-center bg-light b-b p-3">
                                    <div id="map" style="min-width: 400px; width: 100%; min-height: 255px; z-index: 1;"></div>
                                    <input type="hidden" class="form-control" id="location-lat"  name="loc_lat">
                                    <input type="hidden" class="form-control" id="location-lng"  name="loc_long">
                                    <input type="hidden" class="form-control" id="kelurahan"  name="kelurahan" value="<?= $data->kelurahan;?>">
                                    <input type="hidden" class="form-control" id="kecamatan"  name="kecamatan" value="<?= $data->kecamatan;?>">
                                    <input type="hidden" class="form-control" value="<?= $data->qrcode;?>" name="qrcode">   
                                </div>
                                <ul class="list-group list-group-flush no-b">
                                    <li class="list-group-item">
                                        <i class="icon-map-marker text-blue"></i> Lokasi anda
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="card-footer white">
                                <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Absen</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 my-3" id="user-card">
                    <div class="card">
                            <div class="card-body b-b">
                                <h4>Data Anda</h4>
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
                                            <label for="inputPhone" class="col-form-label">Riwayat Perjalanan</label>
                                            <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="riwayat_perjalanan"  required disabled><?= $data->riwayat_perjalanan ?></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <button id="regisbtn" type="submit" class="btn btn-primary btn-delete" name="saves" value="saves">Registrasi QR Code</button>
                                
                            </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col">
                    <div class="card text-white bg-danger mb-3 no-b">
                        <div class="card-header no-b">Terjadi Kesalahan</div>
                        <div class="card-body text-danger">
                            <h5 class="card-title">Data Tidak Ada</h5>
                            <p class="card-text">Data pasien tidak ada atau tidak terdaftar, silahkan hubungi pihak administratorm atau pastikan QRCode yang anda masukkan adalah benar</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
        </div>
    </div>
</div>


<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Sistem Sedang Memproses, Tunggu Sebentar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<button class="btn btn-primary btn-lg toast-action"
        data-title="GPS Tidak terdeteksi"
        data-message="Sistem tidak dapat mengakes sensor GPS Anda. Pastikan GPS anda aktif"
        data-type="error"
        data-position-class="toast-bottom-left"
        style="display: none;"
        id="btnError">
    Error Toast</button>
<button class="btn btn-primary btn-lg toast-action"
        data-title="Lokasi belum dipilih"
        data-message="Silahkan memilih lokasi terlebih dahulu pada peta"
        data-type="error"
        data-position-class="toast-bottom-left"
        style="display: none;"
        id="btnErrorLokasi">
    Error Lokasi</button>

<button class="btn btn-primary btn-lg toast-action"
        data-title="Lokasi belum dipilih"
        data-message="Kesalahan pada sistem, silahkan ulangi lagi beberapa saat lagi."
        data-type="error"
        data-position-class="toast-bottom-left"
        style="display: none;"
        id="btnErrorSistem">
    Error Lokasi</button>

<button class="btn btn-primary btn-lg toast-action"
        data-title="Proses Registrasi Berhasil"
        data-message="Proses registrasi berhasil, halaman akan ditutup dalam waktu 5 detik."
        data-type="success"
        data-position-class="toast-bottom-left"
        style="display: none;"
        id="btnSukses">
    Sukses</button>
<button type="button" 
        class="btn btn-primary" 
        data-toggle="modal" 
        data-target="#exampleModal"
        style="display: none;"
        id="btnProses">
      Launch demo modal
    </button>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

<!--/#app -->
<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>

<script src="<?= base_url();?>assets/js/app.js"></script>

<script type="text/javascript">
    var map,marker,geocodeService;
    
    function initMaps(center){
        console.log(center);
        map = L.map('map').setView(center, 15);
        L.tileLayer(
          'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
          }).addTo(map);
        $("#location-lat").val(center[0]);
        $("#location-lng").val(center[1]);
        marker = L.marker(center).addTo(map);
    }
    
    // get location using the Geolocation interface
    var geoLocationOptions = {
      enableHighAccuracy: true,
      timeout: 10000,
      maximumAge: 0
    }

    function onSuccess(position) {
        console.log('success');
        myLat = position.coords.latitude.toFixed(6);
        myLng = position.coords.longitude.toFixed(6);
        latLng = [myLat, myLng];
        initMaps(latLng);
    }

    function onError(err) {
        var center = [-7.1888675,113.2403184];
        console.log(`ERROR(${err.code}): ${err.message}`);
        $("#btnError").click();
        //alert("Sistem tidak dapat mengakes sensor GPS Anda");
        initMaps(center);
    }

    function getmylocation(){
        navigator.geolocation.getCurrentPosition(function(position){
            var popLocation= [position.coords.latitude.toFixed(6),position.coords.longitude.toFixed(6)]; 
            map.removeLayer(marker);
            marker = L.marker(popLocation).addTo(map); 
            $("#location-lat").val(position.coords.latitude.toFixed(6));
            $("#location-lng").val(position.coords.longitude.toFixed(6));
        }, function onError(err) {
            $("#btnError").click();
            //alert("Sistem tidak dapat mengakes sensor GPS Anda");
        }, {timeout:10000});
    }
   
    </script>
     <script type="text/javascript">
      $(document).ready(function() {  
        navigator.geolocation.getCurrentPosition(onSuccess, onError, {timeout:10000}); 
        $('#form-edit').on('submit', function (e) {
            $("#btnProses").unbind('click');
            $("#btnProses").click();
            e.preventDefault();
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
                        $("#btnProses").unbind('click');
                        $("#btnProses").click();
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
                               window.location.href = "<?= base_url('monitoring/successabsen/'.$data->qrcode)?>"; 
                            }, 5000); 
                        } 
                    }
                });    
            }
            return false;
        });
    });
 </script>  

</body>
</html>

 
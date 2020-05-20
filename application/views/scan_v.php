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
                        <h6 class="font-weight-light mt-2 mb-1"><?= $user_now->name ?></h6>
                        <a data-toggle="collapse" href="#userSettingsCollapse"><i class="icon-circle text-primary blink"></i>Gugus Tugas</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <?php 
                        $role = 'gugustugas';
                    ?>
                    <div class="list-group mt-3 shadow">
                        <a href="<?= base_url() ?>monitoring/logout/<?= $qrcode;?>" class="list-group-item list-group-item-action"><i
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
            <div class="row">
                <ul class="nav  nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                            <i class="icon icon-search3"></i>Cari Data Pasien</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"><i class="icon icon-plus-circle mb-3"></i>Form Aktivasi Barcode</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                <div class="row my-3">
                    <div class="col-md-8">
                        <div class="card">
                            <form method="post" id="form-search">
                                <div class="card-body b-b">
                                    <h4>Form Cari Pasien Covid-19</h4>
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
                                                <label for="inputPhone" class="col-form-label">Kecamatan</label>
                                                <?php if($user_now->level == 'pusat'){ ?>
                                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                    <?php foreach($kecamatan['Kecamatan'] as $l){ ?>
                                                        <option value="<?= $l?>" ><?= $l?></option>
                                                    <?php } ?>
                                                    </select>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control" id="kecamatan" value="<?= $user_now->level; ?>" name="kecamatan" required readonly>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">Kelurahan</label>
                                                <select class="form-control" name="kelurahan" id="kelurahan">
                                                <option value="" >-- Semua Kelurahan --</option>
                                                <?php foreach($kecamatan[$kec] as $l){ ?>
                                                    <option value="<?= $l?>" ><?= $l?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName" class="col-form-label">Nama <span class="text-primary s-12">(Tidak harus nama lengkap)</span> </label>
                                                <input type="text" class="form-control" id="inputName" placeholder="Tuliskan nama"  name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-form-label">No. Telp.</label>
                                                <input type="text" class="form-control" id="inputPhone" placeholder="Tuliskan nomor telp."  name="phone"  >
                                            </div> 
                                        </div>                                    
                                    </div> 
                                    <button type="submit" class="btn btn-primary" name="save" value="save">Cari</button>
                                    <?php } ?>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-12 my-3" id="search-card">
                    </div>
                </div>
            </div>
            <!--Today Tab End-->
            <!--Yesterday Tab Start-->
            <div class="tab-pane animated fadeInUpShort" id="v-pills-2">
                <div class="row my-3">
                    <div class="col-md-12 my-3" id="user-card">
                    </div>    
                </div>
                
            </div>
            <!--Yesterday Tab Start-->
            
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
        data-message="Proses registrasi berhasil, halaman akan ditutup dalam waktu 10 detik."
        data-type="success"
        data-position-class="toast-bottom-left"
        style="display: none;"
        id="btnSukses">
    Sukses</button>

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

<!--/#app -->
<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>

<script src="<?= base_url();?>assets/js/app.js"></script>

<script>
    $(function () {
        $('#form-search').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?= base_url()?>monitoring/search/',
            data: $('#form-search').serialize(),
            success: function (result) {
                $("#search-card").html(result);
            }
          });
        });
    });

    function pilih_pasien($id){
        $.ajax({
            type: 'post',
            url: '<?= base_url()?>monitoring/detail/'+$id+'/<?= $qrcode;?>',
            data: {},
            success: function (result) {
              $("#user-card").html(result);
              $("#v-pills-2-tab").click();
            }
        });
    }

    <?php if($user_now->level == 'pusat'){ ?>
        kecamatan = JSON.parse('<?php echo JSON_encode($kecamatan);?>');
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
    <?php } ?>

</script>


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
        map.on('click', function(e) {        
            var popLocation= [e.latlng.lat,e.latlng.lng]; 
            map.removeLayer(marker);
            marker = L.marker(popLocation).addTo(map); 
            $("#location-lat").val(e.latlng.lat);
            $("#location-lng").val(e.latlng.lng);
        });
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

</body>
</html>
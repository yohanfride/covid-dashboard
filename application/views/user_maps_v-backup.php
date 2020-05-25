<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-users"></i>
                        Tampilan Peta - Kasus Covid-19
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
                        <a style="padding: .5rem;" class="nav-link" href="#"><i style="padding-right: 5px;" class="icon icon-users"></i>Tampilan Peta - Kasus Covid-19</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <form method="get" id="form-search">
                            <div class="card-body b-b">
                                <h4>Form Filter Kasus Covid-19</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName" class="col-form-label">Kondisi</label>
                                            <select  class="form-control" name="lvl" id="level" >
                                                <option value="" >-- Semua --</option>
                                                <option value="confirm" <?= (strtoupper($lvl) == "CONFIRM")?"selected":""; ?> >Confirm</option>
                                                <option value="pdp" <?= (strtoupper($lvl) == "PDP")?"selected":""; ?> >PDP (Pasien Dalam Perawatan)</option>
                                                <option value="odp" <?= (strtoupper($lvl) == "ODP")?"selected":""; ?> >ODP (Orang Dalam Pengawasan)</option>
                                                <option value="odr" <?= (strtoupper($lvl) == "ODR")?"selected":""; ?> >ODR (Orang Dengan Resiko)</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPhone" class="col-form-label">Status</label>
                                            <select class="form-control" name="lvlstat" id="level_status">
                                            <option value="" >-- Semua --</option>
                                            <?php 
                                                $list = array();
                                                if((strtoupper($lvl) == "CONFIRM"))
                                                    $list = $level_status['confirm'];   
                                                if((strtoupper($lvl) == "PDP"))
                                                    $list = $level_status['pdp'];
                                                if((strtoupper($lvl) == "ODP"))
                                                    $list = $level_status['odp'];
                                                if((strtoupper($lvl) == "ODR"))
                                                    $list = $level_status['odr'];

                                                foreach($list as $l){ ?>
                                                <option value="<?= $l?>" <?= ( $lvlstat == $l )?"selected":""; ?>><?= $l?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">   
                                    <div class="col-md-6">
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
                                                <input type="text" class="form-control" value="<?= $kec;?>" name="kec"  >
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
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
                                </div> 
                                <button type="submit" class="btn btn-primary" name="save" value="save">Cari</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header white">Jumlah Kasus yang Muncul</div>
                        <div class="card-body p-0">
                            <div class="bg-primary text-white lighten-2"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <div class="pt-5 pb-2 pl-5 pr-5">
                                    <h5 class="font-weight-normal s-14">Jumlah Kasus</h5>
                                    <span class="s-48 font-weight-lighter text-primary">
                                        <?= number_format($total,0,',','.'); ?></span>
                                    <div class="float-right">
                                        <span class="icon icon-chart s-48"></span>
                                    </div>
                                </div>
                                <canvas width="350" height="86" data-chart="spark" data-chart-type="line" data-dataset="[[28,530,200,430]]" data-labels="['a','b','c','d']" data-dataset-options="[
                                                { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                                ]" class="chartjs-render-monitor js-chart-drawn" style="display: block; height: 69px; width: 280px;">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card no-b">
                        <div class="card-body">
                        <div class="card-title">
                            <h4>Data Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                        </div>
                        <br/>
                        <div id="map" style="width: 100%;height: 80vh;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script type="text/javascript" src="<?= base_url();?>assets/leaflet/dist/leaflet-src.js"></script>
<script src='<?= base_url();?>assets/leaflet/Leaflet.GoogleMutant.js'></script>
<script src='<?= base_url();?>assets/leaflet/sampang-maps.js'></script>

<script type="text/javascript">
    jQuery(function($){
      // Maps ///https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png
      ///https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png
      var maps = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png?access_token={accessToken}', { 
            attribution: 'Data © <a href="http://sampangkab.go.id">SIM PUPR Kabupaten sampang</a>',
            maxZoom: 18,
            minZoom: 10,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiYWRlc3VsYWltYW4iLCJhIjoiY2prcWFqcW85MW00YzNsbW54ZThscmpvdSJ9.ai7YM6Pj5ayquazYjHnOCA'
          }),
        satelit = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-v9/tiles/256/{z}/{x}/{y}?access_token={accessToken}', { 
            attribution: 'Data © <a href="http://sampangkab.go.id">SIM PUPR Kabupaten sampang</a>',
            maxZoom: 18,
            minZoom: 10,
            accessToken: 'pk.eyJ1IjoiYWRlc3VsYWltYW4iLCJhIjoiY2prcWFqcW85MW00YzNsbW54ZThscmpvdSJ9.ai7YM6Pj5ayquazYjHnOCA'
          });
      var bounds_group = new L.featureGroup([]);

      var map = L.map('map',  {
        editable: true,
        center: [-7.07336, 113.2487],
        zoom: 11,
        scrollWheelZoom: false,
        zoomControl: true,
        layers: [maps, bounds_group]
      });

      <?php
      $js_array = json_encode($current->kecamatan);
      echo "var dataKecamatan = ". $js_array . ";\n";
      ?>

      function pop_kecamatan(feature, layer) {
      }

      var layer_kecamatan = new L.geoJson(kecamatan, {
        onEachFeature: pop_kecamatan,
        style: function(feature) {
          var color;
          var fitur = dataKecamatan[feature.properties['kecamatan']];
          
          if( fitur.confirm > 0){
            color = '#ef5350';
          } else if( fitur.pdp > 0){
            color = '#8e24aa';
          } else if( fitur.odp > 0){
            color = '#42a5f5';
          } else if( fitur.odr > 0){
            color = '#ffa000';
          } else {
            color = '#4caf50';
          }
          return {fillOpacity: 0.3,color: "black", fillColor: color, weight:0.5};
        }
      });

      bounds_group.addLayer(layer_kecamatan);
      map.addLayer(layer_kecamatan);
      var totalhal = <?= ceil($total/$limit); ?>;

      function update_maps(hal){
        url_jsaon = "<?= base_url();?>user/get_data_user/?hal="+hal+"&kec=<?= str_replace(" ", "+", $kec); ?>&kel=<?= str_replace(" ", "+", $kel); ?>&lvl=<?= str_replace(" ", "+", $lvl); ?>&lvlstat=<?= str_replace(" ", "+", $lvlstat); ?>";
        var hasilpasien=$.getJSON(url_jsaon, function (data) {
        //var blueIcon = L.icon({ iconUrl: 'public/blue.png', iconSize:[20, 20],});
        for (var i = 0; i < data.length; i++) {
            var lat =data[i].latitude;
            var lng =data[i].longitude;
            var nama=data[i].nama;
            var umur=data[i].umur;
            var no_tel=data[i].phone;
            var alamat=data[i].alamat;
            var jk=data[i].jenis_kelamin;
            var kel_user=data[i].kelurahan;
            var kec_user=data[i].kecamatan;
            var updated=data[i].last_update;
            var level=data[i].level;
            var levelstat=data[i].levelstat;

            // var confirmIcon = L.icon({ iconUrl: '<?= base_url(); ?>assets/img/maps/confirm.png', iconSize:[30, 30],});
            // var odpIcon = L.icon({ iconUrl: '<?= base_url(); ?>assets/img/maps/odp.png', iconSize:[30, 30],});
            // var odrIcon = L.icon({ iconUrl: '<?= base_url(); ?>assets/img/maps/odr.png', iconSize:[30, 30],});
            // var pdpIcon = L.icon({ iconUrl: '<?= base_url(); ?>assets/img/maps/pdp.png', iconSize:[30, 30],});
            // var paneConfirmIcon = map.createPane('confirmIcon');
            // var confirmIcon = { pane: 'confirmIcon', "radius": 5, "fillColor": "#ef5350", "color": "#ef5350", "weight": 1, "opacity": 1 };
            // var panePdpIcon = map.createPane('pdpIcon');
            // var pdpIcon = { pane: 'pdpIcon', "radius": 5, "fillColor": "#8e24aa", "color": "#8e24aa", "weight": 1, "opacity": 1 };
            // var paneOdpIcon = map.createPane('odpIcon');
            // var odpIcon = { pane: 'odpIcon', "radius": 5, "fillColor": "#42a5f5", "color": "#42a5f5", "weight": 1, "opacity": 1 };
            // var paneOdrIcon = map.createPane('odrIcon');
            // var odrIcon = { pane: 'odrIcon', "radius": 5, "fillColor": "#ffa000", "color": "#ffa000", "weight": 1, "opacity": 1 };

            var confirmIcon = L.divIcon({ className: 'circle bg-confirm shadow', iconSize: [12, 12]});
            var pdpIcon = L.divIcon({ className: 'circle bg-pdpicon shadow', iconSize: [12, 12]});
            var odpIcon = L.divIcon({ className: 'circle bg-odpicon shadow', iconSize: [12, 12]});
            var odrIcon = L.divIcon({ className: 'circle bg-odricon shadow', iconSize: [12, 12]});


            if(level == 'confirm'){
                var stat = "Positif Covid-19";
                var greenIcon = confirmIcon;
            } else if(level == 'pdp'){
                var stat = "Pasien Dalam Perawatan (PDP)";
                var greenIcon = pdpIcon;
            } else if(level == 'odp'){
                var stat = "Orang Dalam Pengawasan (ODP)";
                var greenIcon = odpIcon;
            } else {
                var stat = "Orang Dengan Resiko (ODR)";
                var greenIcon = odrIcon;
            } 
            var customPopup =
                  "<h4>Kasus "+stat+"</h4>"
                  +"<span>Nama: <b>"+nama+"</b></span><br>"
                  +"<span>Umur: <b>"+umur+"</b></span><br>"
                  +"<span>Status Pasien: <b>"+level+" "+levelstat+"</b></span><br>"
                  +"<span>Jenis Kelamin: <b>"+jk+"</b></span><br>"
                  +"<span>Kelurahan: <b>"+kel_user+"</b></span><br>"
                  +"<span>Kecamatan: <b>"+kec_user+"</b></span><br>"
                  +"<span>Update Terakhir: <b>"+updated+"</b></span><br>"
              ;
              console.log(greenIcon);
              L.marker([lat, lng],{icon:greenIcon}).addTo(map).bindPopup(customPopup);
            }
        });

        if(totalhal>hal){
            setTimeout(function(){
                update_maps(hal+1);
            }, 1000);
        }
      }
      update_maps(1);
      // End Maps ///
    });
</script>

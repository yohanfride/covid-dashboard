<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-pencil"></i>
                        Ubah Fasilitas Kesehatan
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
                        <a style="padding: .5rem;" class="nav-link" href="<?= base_url(); ?>faskes"><i style="padding-right: 5px;" class="icon icon-hospital-o"></i>Manajemen Fasilitas Kesehatan</a>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body b-b">
                            <form method="post" >
                                <h4>Form Edit Fasilitas Kesehatan</h4>
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
                                <div class="form-group">
                                    <label for="inputName" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Type Name"  name="name" required="" value="<?= $data->nama?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">No. Telp</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone"  name="phone" required="" value="<?= $data->phone?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">Alamat</label>
                                    <textarea class="form-control r-0" id="exampleFormControlTextarea2" rows="3" style="resize: none;" name="alamat"  required><?= $data->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Tekan lokasi pada peta"  name="lokasi" required="" readonly="true" value="<?= $data->lokasi->coordinates[1].','.$data->lokasi->coordinates[0]; ?>" >
                                </div>
                                <input type="hidden" id="poslat" name="poslat" value="<?= $data->lokasi->coordinates[1]; ?>" required="">
                                <input type="hidden" id="poslng" name="poslng" value="<?= $data->lokasi->coordinates[0]; ?>" required="">

                                <button type="submit" class="btn btn-primary" name="save" value="save">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body b-b">
                            <h4>Lokasi</h4>
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div id="map" style="min-width: 400px; width: 100%; min-height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script>
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -7.1968026, lng: 113.2415155},
          zoom: 15,
          mapTypeId: 'roadmap'
        });
        var marker;
        
        <?php if($data->lokasi->coordinates[1]){ ?>
            marker = new google.maps.Marker({
                position: {lat: <?= $data->lokasi->coordinates[1]; ?>, lng: <?= $data->lokasi->coordinates[0]; ?>},
                map: map
            });
        <?php } ?>

        google.maps.event.addListener(map,'click',function(event) {
            if(marker){
                marker.setMap(null);    
            }            
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });
            document.getElementById('poslat').value = event.latLng.lat();
            document.getElementById('poslng').value =  event.latLng.lng();
            document.getElementById('lokasi').value = "("+event.latLng.lat()+","+event.latLng.lng()+")";
        });

        //var marker;

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
    }  
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDq2h9qLZ1zKRHMT5Qv2QBfGWL0sAKDzI&libraries=places&callback=initAutocomplete"
     async defer></script>
<?php include('header.php'); ?>
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-users"></i>
                        Manajemen Log - Kasusu Covid-19
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

                                    </div>
                                    <button type="submit" class="btn btn-primary" name="save" value="save">Cari</button>
                                </div>
                            </form>

                        </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Trend Grafik Total Data Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                            </div>
                            <br/>
                            <div class="row">
                                <div  id="chart-kasus" class="chart-canvas" style="width: 100%;"></div >  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="card-title">
                                <h4> Trend Grafik Orang Dalam Resiko (ODR) Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                            </div>
                            <br/>
                            <div class="row">
                                <div  id="chart-kasus-odr" class="chart-canvas" style="width: 100%;"></div >  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="card-title">
                                <h4> Trend Grafik Orang Dalam Pengawasan (ODP) Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                            </div>
                            <br/>
                            <div class="row">
                                <div  id="chart-kasus-odp" class="chart-canvas" style="width: 100%;"></div >  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="card-title">
                                <h4> Trend Grafik Pasien Dalam Pengawasan (PDP) Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                            </div>
                            <br/>
                            <div class="row">
                                <div  id="chart-kasus-pdp" class="chart-canvas" style="width: 100%;"></div >  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card no-b">
                            <div class="card-body">
                            <div class="card-title">
                                <h4> Trend Grafik Terkonfimasi Positif Covid-19 <?php if($user_now->level != 'master-admin' && $user_now->level != 'admin'){ echo '- Kecamatan '.$user_now->level; } ?></h4> 
                            </div>
                            <br/>
                            <div class="row">
                                <div  id="chart-kasus-positif" class="chart-canvas" style="width: 100%;"></div >  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?> 
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
    jQuery(function($){
        var chartColors ={
            orange:"#ffa000",
            blue:"#42a5f5",
            purple:"#8e24aa",
            red:"#ef5350",
          }
         <?php  
            $hari = array(); 
            $summary_odr = array(); $summary_odp = array(); $summary_pdp = array(); $summary_confirm = array();
            $odr_dipantau = array(); $odr_selesai_dipantau = array();
            $odp_dipantau = array(); $odp_selesai_dipantau = array(); $odp_meninggal = array();
            $pdp_dirawat = array(); $pdp_sembuh = array(); $pdp_meninggal = array();
            $confirm_dirawat = array(); $confirm_sembuh = array(); $confirm_pengawasan = array();  $confirm_meninggal = array();
            foreach($dailes as $dl){
                $hari[] = $dl->date_only;
                if(empty($kec)){
                    $summary_odr[] = $dl->odr->total;
                    $summary_odp[] = $dl->odp->total;
                    $summary_pdp[] = $dl->pdp->total;
                    $summary_confirm[] = $dl->confirm->total;
                    $odr_dipantau[] = $dl->odr->dipantau;
                    $odr_selesai_dipantau[] = $dl->odr->{"selesai-dipantau"};
                    $odp_dipantau[] = $dl->odp->dipantau;
                    $odp_selesai_dipantau[] = $dl->odp->{"selesai-dipantau"};
                    $odp_meninggal[] = $dl->odp->meninggal;
                    $pdp_dirawat[] = $dl->pdp->dirawat;
                    $pdp_sembuh[] = $dl->pdp->sembuh;
                    $pdp_meninggal[] = $dl->pdp->meninggal;
                    $confirm_dirawat[] = $dl->confirm->dirawat;
                    $confirm_sembuh[] = $dl->confirm->sembuh;
                    $confirm_meninggal[] = $dl->confirm->meninggal;
                    $confirm_pengawasan[] = $dl->confirm->pengawasan;    
                } else {
                    $dl = $dl->kecamatan->{$kec};
                    $summary_odr[] = $dl->odr;
                    $summary_odp[] = $dl->odp;
                    $summary_pdp[] = $dl->pdp;
                    $summary_confirm[] = $dl->confirm;
                    $odr_dipantau[] = $dl->{'odr-dipantau'};
                    $odr_selesai_dipantau[] = $dl->{"odr-selesai-dipantau"};
                    $odp_dipantau[] = $dl->{"odp-dipantau"};
                    $odp_selesai_dipantau[] = $dl->{"odp-selesai-dipantau"};
                    $odp_meninggal[] = $dl->{"odp-meninggal"};
                    $pdp_dirawat[] = $dl->{"pdp-dirawat"};
                    $pdp_sembuh[] = $dl->{"pdp-sembuh"};
                    $pdp_meninggal[] = $dl->{"pdp-meninggal"};
                    $confirm_dirawat[] = $dl->{"confirm-dirawat"};
                    $confirm_sembuh[] = $dl->{"confirm-sembuh"};
                    $confirm_meninggal[] = $dl->{"confirm-meninggal"};
                    $confirm_pengawasan[] = $dl->{"confirm-pengawasan"};    
                }
                
            }
            ?>

            var kasustotal = {
              series: [{
                      name: 'ODR',
                      type: 'line',
                      data: [<?= implode(',', $summary_odr); ?>]
                  }, {
                      name: 'ODP',
                      type: 'line',
                      data: [<?= implode(',', $summary_odp); ?>]
                  }, {
                      name: 'PDP',
                      type: 'line',
                      data: [<?= implode(',', $summary_pdp); ?>]
                  },
                  {
                      name: 'Postif',
                      type: 'line',
                      data: [<?= implode(',', $summary_confirm); ?> ]
                  }
              ],
              chart: {
                  height: 350,
                  type: 'line',
                  stacked: false,
              },
              colors: [chartColors.orange, chartColors.blue, chartColors.purple, chartColors.red],
              plotOptions: {
                  bar: {
                      columnWidth: '50%'
                  }
              },

              fill: {
                  colors: [chartColors.orange, chartColors.blue, chartColors.purple, chartColors.red],
                  opacity: [0.85, 0.25, 1],
                  gradient: {
                      inverseColors: false,
                      // shade: 'light',
                      type: "vertical",
                      // opacityFrom: 0.85,
                      // opacityTo: 0.55,
                      stops: [0, 100, 100, 100]
                  }
              },
              labels: ['<?= implode("','", $hari); ?>'],
              legend: {
                  show: true,
                  showForSingleSeries: false,
                  showForNullSeries: true,
                  showForZeroSeries: true,
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: false,
                  fontSize: '14px',
                  fontFamily: 'Helvetica, Arial',
                  fontWeight: 400,
                  formatter: undefined,
                  inverseOrder: false,
                  width: undefined,
                  height: undefined,
                  tooltipHoverFormatter: undefined,
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                      colors: ['#000000'],
                      useSeriesColors: false
                  },
                  markers: {
                      width: 12,
                      height: 12,
                      strokeWidth: 0,
                      //strokeColor: '#fff',
                      fillColors: [chartColors.orange, chartColors.blue, chartColors.purple, chartColors.red],
                      radius: 12,
                      customHTML: undefined,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                  },
                  itemMargin: {
                      horizontal: 5,
                      vertical: 0
                  },
                  onItemClick: {
                      toggleDataSeries: true
                  },
                  onItemHover: {
                      highlightDataSeries: true
                  },
              },
              markers: {

                  size: 5,
                  hover: {
                      size: 9
                  }
              },
              xaxis: {
                  // type: 'datetime'
              },
              yaxis: {
                  title: {
                      text: 'Orang',
                  },
                  labels: {
                      formatter: function(val) {
                          return val.toFixed(0)
                      }
                  },
                  min: 0
              },
              tooltip: {
                  shared: true,
                  intersect: false,
                  y: {
                      formatter: function(y) {
                          if (typeof y !== "undefined") {
                              return y.toFixed(0) + " Orang";
                          }
                          return y;

                      }
                  }
              }
          };

          var kasus_odr = {
              series: [{
                      name: 'Kasus ODR',
                      type: 'column',
                      data: [<?= implode(',', $summary_odr); ?>]
                  }, {
                      name: 'Selesai Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odr_selesai_dipantau); ?>]
                  }, {
                      name: 'Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odr_dipantau); ?>]
                  }
              ],
              chart: {
                  height: 350,
                  type: 'line',
                  stacked: false,
              },
              colors: [chartColors.orange, '#35FD0B', '#f2f700'],
              stroke: {
                  width: [0, 5, 5, 5],
                  colors: ['#000000', '#2Cff00', '#04A7FF'],
                  curve: 'smooth',
                  // colors:['']
              },
              plotOptions: {
                  bar: {
                      columnWidth: '50%'
                  }
              },

              fill: {
                  colors: [chartColors.orange, '#35FD0B', '#2303c2'],
                  opacity: [0.85, 0.25, 1],
                  gradient: {
                      inverseColors: false,
                      // shade: 'light',
                      type: "vertical",
                      // opacityFrom: 0.85,
                      // opacityTo: 0.55,
                      stops: [0, 100, 100, 100]
                  }
              },
              labels: ['<?= implode("','", $hari); ?>'],
              legend: {
                  show: true,
                  showForSingleSeries: false,
                  showForNullSeries: true,
                  showForZeroSeries: true,
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: false,
                  fontSize: '14px',
                  fontFamily: 'Helvetica, Arial',
                  fontWeight: 400,
                  formatter: undefined,
                  inverseOrder: false,
                  width: undefined,
                  height: undefined,
                  tooltipHoverFormatter: undefined,
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                      colors: ['#000000'],
                      useSeriesColors: false
                  },
                  markers: {
                      width: 12,
                      height: 12,
                      strokeWidth: 0,
                      strokeColor: '#fff',
                      fillColors: [chartColors.orange, '#35FD0B', '#2303c2'],
                      radius: 12,
                      customHTML: undefined,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                  },
                  itemMargin: {
                      horizontal: 5,
                      vertical: 0
                  },
                  onItemClick: {
                      toggleDataSeries: true
                  },
                  onItemHover: {
                      highlightDataSeries: true
                  },
              },
              markers: {

                  size: 5,
                  hover: {
                      size: 9
                  }
              },
              xaxis: {
                  // type: 'datetime'
              },
              yaxis: {
                  title: {
                      text: 'Orang',
                  },
                  labels: {
                      formatter: function(val) {
                          return val.toFixed(0)
                      }
                  },
                  min: 0
              },
              tooltip: {
                  shared: true,
                  intersect: false,
                  y: {
                      formatter: function(y) {
                          if (typeof y !== "undefined") {
                              return y.toFixed(0) + " Orang";
                          }
                          return y;

                      }
                  }
              }
          };

          var kasus_odp = {
              series: [{
                      name: 'Kasus ODP',
                      type: 'column',
                      data: [<?= implode(',', $summary_odp); ?>]
                  }, {
                      name: 'Selesai Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odp_selesai_dipantau); ?>]
                  }, {
                      name: 'Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odp_dipantau); ?>]
                  }, {
                      name: 'Meninggal',
                      type: 'line',
                      data: [<?= implode(',', $odp_meninggal); ?>]
                  }
              ],
              chart: {
                  height: 350,
                  type: 'line',
                  stacked: false,
              },
              colors: [chartColors.blue, '#35FD0B', '#f2f700', '#000000'],
              stroke: {
                  width: [0, 5, 5, 5],
                  colors: ['#000000', '#2Cff00', '#04A7FF'],
                  curve: 'smooth',
                  // colors:['']
              },
              plotOptions: {
                  bar: {
                      columnWidth: '50%'
                  }
              },

              fill: {
                  colors: [chartColors.blue, '#35FD0B', '#f2f700', '#000000'],
                  opacity: [0.85, 0.25, 1],
                  gradient: {
                      inverseColors: false,
                      // shade: 'light',
                      type: "vertical",
                      // opacityFrom: 0.85,
                      // opacityTo: 0.55,
                      stops: [0, 100, 100, 100]
                  }
              },
              labels: ['<?= implode("','", $hari); ?>'],
              legend: {
                  show: true,
                  showForSingleSeries: false,
                  showForNullSeries: true,
                  showForZeroSeries: true,
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: false,
                  fontSize: '14px',
                  fontFamily: 'Helvetica, Arial',
                  fontWeight: 400,
                  formatter: undefined,
                  inverseOrder: false,
                  width: undefined,
                  height: undefined,
                  tooltipHoverFormatter: undefined,
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                      colors: ['#000000'],
                      useSeriesColors: false
                  },
                  markers: {
                      width: 12,
                      height: 12,
                      strokeWidth: 0,
                      strokeColor: '#fff',
                      fillColors: [chartColors.blue, '#35FD0B', '#f2f700', '#000000'],
                      radius: 12,
                      customHTML: undefined,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                  },
                  itemMargin: {
                      horizontal: 5,
                      vertical: 0
                  },
                  onItemClick: {
                      toggleDataSeries: true
                  },
                  onItemHover: {
                      highlightDataSeries: true
                  },
              },
              markers: {

                  size: 5,
                  hover: {
                      size: 9
                  }
              },
              xaxis: {
                  // type: 'datetime'
              },
              yaxis: {
                  title: {
                      text: 'Orang',
                  },
                  labels: {
                      formatter: function(val) {
                          return val.toFixed(0)
                      }
                  },
                  min: 0
              },
              tooltip: {
                  shared: true,
                  intersect: false,
                  y: {
                      formatter: function(y) {
                          if (typeof y !== "undefined") {
                              return y.toFixed(0) + " Orang";
                          }
                          return y;

                      }
                  }
              }
          };

          var kasus_pdp = {
              series: [{
                      name: 'Kasus PDP',
                      type: 'column',
                      data: [<?= implode(',', $summary_odp); ?>]
                  }, {
                      name: 'Selesai Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odp_selesai_dipantau); ?>]
                  }, {
                      name: 'Dipantau',
                      type: 'line',
                      data: [<?= implode(',', $odp_dipantau); ?>]
                  }, {
                      name: 'Meninggal',
                      type: 'line',
                      data: [<?= implode(',', $odp_meninggal); ?>]
                  }
              ],
              chart: {
                  height: 350,
                  type: 'line',
                  stacked: false,
              },
              colors: [chartColors.purple, '#35FD0B', '#f2f700', '#000000'],
              stroke: {
                  width: [0, 5, 5, 5],
                  colors: ['#000000', '#2Cff00', '#04A7FF'],
                  curve: 'smooth',
                  // colors:['']
              },
              plotOptions: {
                  bar: {
                      columnWidth: '50%'
                  }
              },

              fill: {
                  colors: [chartColors.purple, '#35FD0B', '#f2f700', '#000000'],
                  opacity: [0.85, 0.25, 1],
                  gradient: {
                      inverseColors: false,
                      // shade: 'light',
                      type: "vertical",
                      // opacityFrom: 0.85,
                      // opacityTo: 0.55,
                      stops: [0, 100, 100, 100]
                  }
              },
              labels: ['<?= implode("','", $hari); ?>'],
              legend: {
                  show: true,
                  showForSingleSeries: false,
                  showForNullSeries: true,
                  showForZeroSeries: true,
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: false,
                  fontSize: '14px',
                  fontFamily: 'Helvetica, Arial',
                  fontWeight: 400,
                  formatter: undefined,
                  inverseOrder: false,
                  width: undefined,
                  height: undefined,
                  tooltipHoverFormatter: undefined,
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                      colors: ['#000000'],
                      useSeriesColors: false
                  },
                  markers: {
                      width: 12,
                      height: 12,
                      strokeWidth: 0,
                      strokeColor: '#fff',
                      fillColors: [chartColors.purple, '#35FD0B', '#f2f700', '#000000'],
                      radius: 12,
                      customHTML: undefined,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                  },
                  itemMargin: {
                      horizontal: 5,
                      vertical: 0
                  },
                  onItemClick: {
                      toggleDataSeries: true
                  },
                  onItemHover: {
                      highlightDataSeries: true
                  },
              },
              markers: {

                  size: 5,
                  hover: {
                      size: 9
                  }
              },
              xaxis: {
                  // type: 'datetime'
              },
              yaxis: {
                  title: {
                      text: 'Orang',
                  },
                  labels: {
                      formatter: function(val) {
                          return val.toFixed(0)
                      }
                  },
                  min: 0
              },
              tooltip: {
                  shared: true,
                  intersect: false,
                  y: {
                      formatter: function(y) {
                          if (typeof y !== "undefined") {
                              return y.toFixed(0) + " Orang";
                          }
                          return y;

                      }
                  }
              }
          };

          var kasus_confirm = {
              series: [{
                      name: 'Positif COVID-19',
                      type: 'column',
                      data: [<?= implode(',', $summary_confirm); ?>]
                  }, {
                      name: 'Sembuh',
                      type: 'line',
                      data: [<?= implode(',', $confirm_sembuh); ?>]
                  }, {
                      name: 'Pengawasan',
                      type: 'line',
                      data: [<?= implode(',', $confirm_pengawasan); ?>]
                  }, {
                      name: 'Meninggal',
                      type: 'line',
                      data: [<?= implode(',', $odp_meninggal); ?>]
                  }, {
                      name: 'Dalam Perawatan',
                      type: 'line',
                      data: [<?= implode(',', $confirm_dirawat); ?>]
                  }
              ],
              chart: {
                  height: 350,
                  type: 'line',
                  stacked: false,
              },
              colors: [chartColors.red, '#35FD0B', '#04a7ff', '#000000', '#f2f700'],
              stroke: {
                  width: [0, 5, 5, 5],
                  colors: ['#000000', '#2Cff00', '#04A7FF'],
                  curve: 'smooth',
                  // colors:['']
              },
              plotOptions: {
                  bar: {
                      columnWidth: '50%'
                  }
              },

              fill: {
                  colors: [chartColors.red, '#35FD0B', '#04a7ff', '#000000', '#f2f700'],
                  opacity: [0.85, 0.25, 1],
                  gradient: {
                      inverseColors: false,
                      // shade: 'light',
                      type: "vertical",
                      // opacityFrom: 0.85,
                      // opacityTo: 0.55,
                      stops: [0, 100, 100, 100]
                  }
              },
              labels: ['<?= implode("','", $hari); ?>'],
              legend: {
                  show: true,
                  showForSingleSeries: false,
                  showForNullSeries: true,
                  showForZeroSeries: true,
                  position: 'bottom',
                  horizontalAlign: 'center',
                  floating: false,
                  fontSize: '14px',
                  fontFamily: 'Helvetica, Arial',
                  fontWeight: 400,
                  formatter: undefined,
                  inverseOrder: false,
                  width: undefined,
                  height: undefined,
                  tooltipHoverFormatter: undefined,
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                      colors: ['#000000'],
                      useSeriesColors: false
                  },
                  markers: {
                      width: 12,
                      height: 12,
                      strokeWidth: 0,
                      strokeColor: '#fff',
                      fillColors: [chartColors.red, '#35FD0B', '#04a7ff', '#000000', '#f2f700'],
                      radius: 12,
                      customHTML: undefined,
                      onClick: undefined,
                      offsetX: 0,
                      offsetY: 0
                  },
                  itemMargin: {
                      horizontal: 5,
                      vertical: 0
                  },
                  onItemClick: {
                      toggleDataSeries: true
                  },
                  onItemHover: {
                      highlightDataSeries: true
                  },
              },
              markers: {

                  size: 5,
                  hover: {
                      size: 9
                  }
              },
              xaxis: {
                  // type: 'datetime'
              },
              yaxis: {
                  title: {
                      text: 'Orang',
                  },
                  labels: {
                      formatter: function(val) {
                          return val.toFixed(0)
                      }
                  },
                  min: 0
              },
              tooltip: {
                  shared: true,
                  intersect: false,
                  y: {
                      formatter: function(y) {
                          if (typeof y !== "undefined") {
                              return y.toFixed(0) + " Orang";
                          }
                          return y;

                      }
                  }
              }
          };


          var chart = new ApexCharts(document.querySelector("#chart-kasus"), kasustotal);
          chart.render();

          var chart2 = new ApexCharts(document.querySelector("#chart-kasus-odr"), kasus_odr);
          chart2.render();

          var chart = new ApexCharts(document.querySelector("#chart-kasus-odp"), kasus_odp);
          chart.render();

          var chart2 = new ApexCharts(document.querySelector("#chart-kasus-pdp"), kasus_pdp);
          chart2.render();

          var chart2 = new ApexCharts(document.querySelector("#chart-kasus-positif"), kasus_confirm);
          chart2.render();
            
    });
</script>
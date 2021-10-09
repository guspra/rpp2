<div class="c-layout-page">
  <!-- BEGIN: PAGE CONTENT -->

  <!-- BANNER -->
  <section id="banner">
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 banner-text">
            <h3 class="web-title">E-MANDALIKA</h3>
            <h4 class="title-content">Monitoring Dan Pengawasan</br>Akses Layanan Informasi Bantuan Hukum Cuma-Cuma</h4>
            <div>
              <img class="img-banner-logo" src="img/banner/logo-instansi.png" alt="image home banner">
            </div>
            <div class="banner-btn-group">
              <div>
                <a href="permohonan_bankum" class="btn btn-banner">Permohonan Bantuan</a>
                <a href="daftarobh" class="btn btn-banner">Daftar OBH</a>
                <a href="pengaduan" class="btn btn-banner">Buat Pengaduan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="home-content">
    <span id="realisasi_anggaran" class="anchor"></span>
    <div class="home-content-title home-content-title-1" >
      <div class="container">
        <div class="row">

          <!-- REALISASI ANGGARAN -->
          <div class="col-md-6">
            <h3 class="title-realisasi-anggaran">Realisasi Anggaran</h3>
          </div>

          <!-- PETA SEBARAN OBH NTB -->
          <div class="col-md-6">
            <h3 class="title-peta-sebaran">Peta Sebaran OBH</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="home-content home-content-1">
      <div class="container-fluid">
        <!-- REALISASI ANGGARAN -->
        <div class="col-md-6 realisasi-anggaran">
          <div class="c-content-feature-5">
            <div class="c-content-title-1 wow amimate fadeInDown" style="visibility: visible; animation-name: fadeInDown; opacity: 1;">
              <h3 class="c-left c-font-dark c-font-uppercase c-font-bold">Akses<br>Sidbankum</h3>
              <div class="c-line-left c-bg-blue-3 c-theme-bg"></div>
            </div>
            <div class="c-text wow animate fadeInLeft" style="visibility: visible; animation-name: fadeInLeft; opacity: 1;"> Realisasi Anggaran dapat dilihat dengan mengunjungi laman <a class="sidbankum-link" href="https://sidbankum.bphn.go.id/">sidbankum.bphn.go.id</a></div>
            <a class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn btn-sidbankum" href="https://sidbankum.bphn.go.id/" style="visibility: visible; animation-name: fadeIn; opacity: 1;">Kunjungi Sidbankum</a>
            <img class="c-photo img-responsive wow animate fadeInUp" width="400" alt="" src="img/jango-intro-2-n.png" style="visibility: visible; animation-name: fadeInUp; opacity: 1;"> </div>
            
        </div>

        <!-- PETA SEBARAN OBH NTB -->
        <div class="col-md-6 peta-sebaran">
          <div id='map'></div>
        </div>

      </div>
    </div>

    <div class="home-content-title home-content-title-2 c-content-box c-size-md">
      <div class="container">
        <div class="row">
          <!-- PERATURAN TERKAIT -->
          <div class="col-md-12">
          <div class="c-content-title-4">
			<h3 class="c-font-uppercase c-center c-font-bold c-line-strike line-orange"><span class="c-bg-orange-1">Peraturan Terkait</span></h3>
		</div>
            <!-- <h3 class="text-center">Peraturan Terkait</h3> -->
        <style>
                      #bg-white{color:#fff;}
                    </style>

                    <div class="table-responsive table-home">
                      <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                          <tr style="background:gray;">
                            <th id="bg-white" width="2%">N0.</th>
                            <th id="bg-white" width="78%">PERATURAN</th>
                            <th id="bg-white" width="20%" class="text-center">DETAIL</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=1;
                            foreach ($peraturan->result() as $value):
                          ?>
                            <tr>
                              <td><b><?php echo $no++; ?>.</b></td>
                              <td><?php echo $value->name_file; ?></td>
                              <td class="text-center"><a href="<?php echo $value->dir_file; ?>" class="btn btn-primary btn-sm" target="_blank" >Lihat</a></td>
                              
                              
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
          </div>
        </div>
      </div>
    </div>

   
  </section>


</div>

<script src="assets/web/plugins/leafletjs/leaflet.js"></script>
<script type="text/javascript">
// --- Leaflet untuk peta sebaran OBH ---
var locations = [
  <?php 
    foreach ($query->result() as $baris) {
      if (!empty($baris->latitude) && !empty($baris->longitude)) {
        echo '["'.$baris->nama.'", '.$baris->latitude.', '.$baris->longitude.'],';
      }
    }  
  ?>
];

var map = L.map('map', {
    scrollWheelZoom: false
}).setView([-8.615086468066592, 117.38529098263584], 8);
mapLink =
  '<a href="http://openstreetmap.org">OpenStreetMap</a>';
L.tileLayer(
  'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; ' + mapLink + ' Contributors',
    maxZoom: 18,
  }).addTo(map);
  map.on('click', function() {
  if (map.scrollWheelZoom.enabled()) {
    map.scrollWheelZoom.disable();
    }
    else {
    map.scrollWheelZoom.enable();
    }
  });
for (var i = 0; i < locations.length; i++) {
  marker = new L.marker([locations[i][1], locations[i][2]])
    .bindPopup(locations[i][0])
    .addTo(map);
}

</script>
